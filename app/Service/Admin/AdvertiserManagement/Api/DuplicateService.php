<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Helper\Static\Vars;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DuplicateService
{
    public function getDuplicateAdvertiserView(Request $request)
    {
        abort_if(Gate::denies('admin_api_advertisers_duplicate_records_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networkMapping = [
            Vars::AWIN => Vars::AWIN,
            Vars::IMPACT_RADIUS => Vars::IMPACT_RADIUS,
            Vars::RAKUTEN => Vars::RAKUTEN,
            Vars::TRADEDOUBLER => Vars::TRADEDOUBLER,
            Vars::ADMITAD => Vars::ADMITAD,
            Vars::PARTNERIZE => Vars::PARTNERIZE,
            Vars::PEPPERJAM => Vars::PEPPERJAM,
            Vars::LINKCONNECTOR => Vars::LINKCONNECTOR,
            Vars::FLEX_OFFERS => Vars::FLEX_OFFERS,
            Vars::MOONROVER => Vars::MOONROVER,
            Vars::PAID_ON_RESULT => Vars::PAID_ON_RESULT,
            Vars::CITY_ADS => Vars::CITY_ADS,
             Vars::FATCOUPON => Vars::FATCOUPON,
        ];

        $networkPriority = [
            Vars::AWIN, Vars::IMPACT_RADIUS, Vars::RAKUTEN, Vars::TRADEDOUBLER, Vars::ADMITAD,
            Vars::PARTNERIZE, Vars::PEPPERJAM, Vars::LINKCONNECTOR, Vars::FLEX_OFFERS,
            Vars::MOONROVER, Vars::PAID_ON_RESULT, Vars::CITY_ADS, Vars::FATCOUPON
        ];

        $duplicateUrls = Advertiser::select('url')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('click_through_url')
            ->whereNotNull('url')
            ->groupBy('url')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('url');

// Fetch duplicate advertisers with optional status filtering
        $duplicatesQuery = Advertiser::whereIn('url', $duplicateUrls);

        if ($request->filled('filter')) {
            $filter = $request->filter === 'Yes' ? 1 : 0;
            $duplicatesQuery->where('is_show', $filter);
        }

        $duplicates = $duplicatesQuery->get();

// Group advertisers by URL
        $advertisers = $duplicates->groupBy('url')->map(function ($group) use ($networkMapping, $networkPriority) {
            $firstAdvertiser = $group->first();

            // Map and organize network names
            $networkNames = $group->mapWithKeys(function ($advertiser) use ($networkMapping) {
                $sourceKey = $advertiser->source;
                $networkName = $networkMapping[$sourceKey] ?? $sourceKey; // Map source to network name
                return [
                    $networkName => [
                        'id' => $advertiser->id,
                        'name' => $networkName,
                        'commission' => $advertiser->commission,
                        'type' => $advertiser->commission_type,
                        'status' => $advertiser->status,
                        'is_show'=>$advertiser->is_show
                    ],
                ];
            })->toArray();

            // Sort network names by priority
            uksort($networkNames, function ($a, $b) use ($networkPriority) {
                $priorityA = array_search($a, $networkPriority);
                $priorityB = array_search($b, $networkPriority);

                return ($priorityA !== false ? $priorityA : PHP_INT_MAX) <=> ($priorityB !== false ? $priorityB : PHP_INT_MAX);
            });

            return [
                'name' => $firstAdvertiser->name,
                'url' => $firstAdvertiser->url,
                'network_names' => $networkNames,
            ];
        })->filter(function ($advertiser) {
            return count($advertiser['network_names']) > 1;
        })->values();

        return view('template.admin.advertisers.duplicate.advertiser', compact('advertisers'));
    }

    public function storeDuplicateAdvertiserData(Request $request) {

        try {

            $data = [];

            if($request->id) {

                Advertiser::where("id", $request->id)->update([
                    "status" => $request->status,
                    "is_show" =>  $request->status,
                ]);

                $duplicates = Advertiser::select(['status', 'source'])->where("url", $request->url)->get();
                $source = [];
                foreach ($duplicates as $duplicate) {
                    if ($duplicate['status']) {
                        $source[] = $duplicate['source'];
                    }
                }
                $source = implode(', ', $source);
                $data = [
                    'source' => $source ? $source : "Not Assigned"
                ];
            }
            elseif ($request->url) {

                Advertiser::where("url", $request->url)->update([
                    "status" => Vars::ADVERTISER_NOT_AVAILABLE,
                    "is_show" =>  Vars::ADVERTISER_NOT_AVAILABLE,
                ]);

                $data = [
                    'source' => 'Not Assigned'
                ];

            }

            $response = [
                "type" => "success",
                "message" => "Advertiser API Data Successfully Updated.",
                "data" => $data
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage(),
                "data" => []
            ];

        }

        return response()->json($response);

    }
}
