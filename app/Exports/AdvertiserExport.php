<?php

namespace App\Exports;

use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\Website;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdvertiserExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $websitesCount = Website::withAndWhereHas('users', function ($user) {
            return $user->where('id', auth()->user()->id);
        })->where('status', Website::ACTIVE)->count();

        if ($websitesCount) {
            return $this->fetchAdvertisers();
        }

        return collect([]);
    }

    public function headings(): array
    {
        return [
            'Advertiser ID', 'Name', 'URL', 'Email', 'Currency Code', 'Average Payment Time', 'EPC',
            'Commission', 'Tracking URL Short', 'Tracking URL', 'Deeplink Enabled', 'Status',
            'Primary Regions', 'Supported Regions', 'Valid Domains'
        ];
    }

    private function fetchAdvertisers()
    {
        $request = $this->request;
        $section = $request->section ?? null;
$currentUrl = url()->full();
        $advertisersQuery = Advertiser::where('is_active', true)
            ->select($this->getFields())
            ->with([
                'user',
                'advertiser_applies' => function ($apply) {
                    $apply->select(['internal_advertiser_id', 'status'])
                          ->where('publisher_id', auth()->user()->id);
                }
            ]);

        $this->applySectionFilters($advertisersQuery, $section);
        $this->applyRequestFilters($advertisersQuery, $request);

        $advertisers = $advertisersQuery->where('is_active',1)
            ->groupBy('advertiser_id')
            ->orderBy('name', 'ASC')
            ->get();

        return $this->formatAdvertisersData($advertisers);
    }

    private function applySectionFilters($advertisersQuery, $section)
    {
        if ($section == AdvertiserApply::STATUS_NOT_ACTIVE) {
            $advertisersQuery->withAndWhereDoesntHave('advertiser_applies', function ($apply) {
                $apply->whereIn('status', [
                    AdvertiserApply::STATUS_ACTIVE,
                    AdvertiserApply::STATUS_PENDING,
                    AdvertiserApply::STATUS_REJECTED,
                    AdvertiserApply::STATUS_HOLD,
                    AdvertiserApply::STATUS_ADMITAD_HOLD
                ])->where('publisher_id', auth()->user()->id);
            });
        } elseif ($section == 'new') {
            $advertisersQuery->doesntHave('advertiser_applies')->where('status', '1')->whereBetween("created_at", [now()->subDays(15)->format("Y-m-d"), now()->addDay()->format("Y-m-d")]);
            
        } else {
            $advertisersQuery->with(['advertiser_applies' => function ($apply) {
                $apply->where('publisher_id', auth()->user()->id);
            }]);
        }
    }

    private function applyRequestFilters($advertisersQuery, $request)
    {
        if ($request->search_by_name) {
            $advertisersQuery->where('name', 'LIKE', "%{$request->search_by_name}%");
        }

        $this->applyFilter($advertisersQuery, 'primary_regions', $request->search_by_country);
        $this->applyFilter($advertisersQuery, 'promotional_methods', $request->search_by_promotional_method);
        $this->applyFilter($advertisersQuery, 'categories', $request->search_by_category);

        if ($request->type) {
            if ($request->type == 'third_party_advertiser') {
                $advertisersQuery->where('type', 'api');
            } elseif ($request->type == 'managed_by_linksCircle') {
                $advertisersQuery->where('type', 'manual');
            }
        }
    }

    private function applyFilter($query, $field, $value)
    {
        if ($value) {
            if (strpos($value, ',') !== false) {
                $values = explode(',', $value);
                $query->where(function ($q) use ($values, $field) {
                    foreach ($values as $val) {
                        $q->orWhere($field, 'LIKE', "%{$val}%");
                    }
                });
            } else {
                $query->where($field, 'LIKE', "%{$value}%");
            }
        }
    }

    private function formatAdvertisersData($advertisers)
    {
        return $advertisers->map(function ($advertiser) {
            return [
                'advertiser_id' => $advertiser->advertiser_id,
                'name' => $advertiser->name,
                'url' => $advertiser->url ?? '-',
                'email' => $advertiser->user->email ?? '-',
                'currency_code' => $advertiser->currency_code ?? '-',
                'average_payment_time' => $advertiser->average_payment_time ?? '-',
                'epc' => $advertiser->epc ?? '-',
                'commission' => isset($advertiser->commission) && isset($advertiser->commission_type)
                    ? "{$advertiser->commission}{$advertiser->commission_type}" : '-',
                'tracking_url_short' => $advertiser->advertiser_applies->tracking_url_short ?? '-',
                'tracking_url' => $advertiser->advertiser_applies->tracking_url ?? '-',
                'deeplink_enabled' => $advertiser->deeplink_enabled ? 'true' : 'false',
                'status' => $advertiser->advertiser_applies->status ?? AdvertiserApply::STATUS_NOT_ACTIVE,
                'primary_regions' => isset($advertiser->primary_regions)
                    ? implode(' | ', $advertiser->primary_regions) : '-',
                'supported_regions' => isset($advertiser->supported_regions)
                    ? implode(' | ', $advertiser->supported_regions) : '-',
                'valid_domains' => $advertiser->valid_domains
                    ? implode(' | ', $advertiser->valid_domains) : '-',
            ];
        });
    }

    private function getFields()
    {
        return [
            'id', 'advertiser_id', 'name', 'url', 'user_id', 'currency_code',
            'average_payment_time', 'epc', 'deeplink_enabled',
            'primary_regions', 'supported_regions', 'valid_domains',
            'commission', 'commission_type'
        ];
    }
}