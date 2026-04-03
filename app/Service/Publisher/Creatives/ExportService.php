<?php

namespace App\Service\Publisher\Creatives;

use App\Enums\ExportType;
use App\Exports\CouponExport;
use App\Models\AdvertiserApply;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    public function init(Request $request, ExportType $type)
    {
        try
        {
            if(ExportType::CSV == $type)
                return $this->download($request, ExportType::CSV->value);
            elseif(ExportType::XLSX == $type)
                return $this->download($request, ExportType::XLSX->value);
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }

    }

    public function download(Request $request, $type)
    {
        // set header
        $columns = [
            'Advertiser ID',
            'Advertiser Name',
            'Offer ID',
            'Offer Name',
            'Code',
            'Start Date',
            'End Dates',
            'Click Through URL'
        ];

        // create csv
        return response()->streamDownload(function() use($columns, $request, $type) {
            $file = fopen('php://output', 'w+');
            fputcsv($file, $columns);

            $user = auth()->user();
            $coupons = new Coupon();

            $coupons = $coupons->select(
                'advertiser_applies.internal_advertiser_id',
                'advertiser_applies.website_id',
                'coupons.id',
                'coupons.sid',
                'coupons.advertiser_name',
                'coupons.promotion_id',
                'coupons.title',
                'coupons.code',
                'coupons.start_date',
                'coupons.end_date',
                'coupons.url_tracking',
            );

            if($request->search_by_name)
                $coupons = $coupons->where(function($query) use ($request) {
                    $query->orWhere('coupons.title', 'LIKE', "%$request->search_by_name%")
                        ->orWhere('coupons.advertiser_name', 'LIKE', "%$request->search_by_name%");
                });

            $coupons = $coupons->join("advertiser_applies", "advertiser_applies.internal_advertiser_id", "coupons.internal_advertiser_id")
                            ->where('advertiser_applies.status', AdvertiserApply::STATUS_ACTIVE)
                            ->where('advertiser_applies.publisher_id', $user->id)
                            ->where('advertiser_applies.website_id', $user->active_website_id);

            $data = $coupons->orderBy('coupons.advertiser_name', 'asc');

            $data->cursor()
                ->each(function ($coupon) use ($file) {
                    $data['advertiser_id'] = $coupon->sid;
                    $data['advertiser_name'] = $coupon->advertiser_name;
                    $data['offer_id'] = $coupon->promotion_id ?? "-";
                    $data['offer_name'] = $coupon->title ?? "-";;
                    $data['code'] = $coupon->code ? $coupon->code : "No code required";
                    $data['start_date'] = $coupon->start_date ? Carbon::parse($coupon->start_date)->format("Y-m-d") : "-";
                    $data['end_dates'] = $coupon->end_date ? Carbon::parse($coupon->end_date)->format("Y-m-d") : "-";
                    $data['click_through_url'] = isset($coupon->website_id) ? route("track.coupon", ['advertiser' => $coupon->internal_advertiser_id, 'website' => $coupon->website_id, 'coupon' => $coupon->id]) : route("track.simple", ['advertiser' => $coupon->internal_advertiser_id, 'website' => $coupon->website_id]);
                    fputcsv($file, $data);
                });

            fclose($file);
        }, "coupons.{$type}");
    }
}
