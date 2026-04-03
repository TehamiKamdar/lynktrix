<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PerformanceOverviewService extends Controller
{
    protected $user;
    protected $dateFormat = 'Y-m-d';
    protected $queryDateFormat = '%Y-%m-%d';

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getPerformanceOverview($startDateParam = null, $endDateParam = null)
    {
        // Determine the date ranges for the current and previous periods
        if ($startDateParam && $endDateParam) {
            $currentPeriodStart = Carbon::parse($startDateParam);
            $currentPeriodEnd = Carbon::parse($endDateParam);

            // Calculate the previous period based on the number of days in the current period
            $previousPeriodStart = $currentPeriodStart->copy()->subMonth();
            $previousPeriodEnd = $currentPeriodEnd->copy()->subMonth();
        } else {
            $currentDate = Carbon::now();
            $currentPeriodStart = $currentDate->copy()->firstOfMonth();
            $currentPeriodEnd = $currentDate->copy()->lastOfMonth();
            $previousPeriodStart = $currentDate->copy()->subMonth()->firstOfMonth();
            $previousPeriodEnd = $currentDate->copy()->subMonth()->lastOfMonth();
        }

        $advertiser = $this->getAdvertiserData($currentPeriodStart, $currentPeriodEnd, $this->user);

        // Get data for the current and previous periods
        $currentPeriodData = $this->getData($currentPeriodStart, $currentPeriodEnd);
        $previousPeriodData = $this->getData($previousPeriodStart, $previousPeriodEnd);

        // Fill in missing dates for current and previous periods
        $currentPeriodData = $this->fillMissingDates($currentPeriodData, $currentPeriodStart, $currentPeriodEnd);
        $previousPeriodData = $this->fillMissingDates($previousPeriodData, $previousPeriodStart, $previousPeriodEnd);

        // Prepare data for rendering
        $currentPeriodLabels = array_keys($currentPeriodData);
        $currentPeriodValues = array_values($currentPeriodData);
        $previousPeriodLabels = array_keys($previousPeriodData);
        $previousPeriodValues = array_values($previousPeriodData);

        // Calculate min and max clicks
        $currentMinClick = $currentPeriodValues ? min($currentPeriodValues) : 1;
        $currentMaxClick = $currentPeriodValues ? floatval(max($currentPeriodValues)) + 20 : 20;
        $previousMinClick = $previousPeriodValues ? min($previousPeriodValues) : 1;
        $previousMaxClick = $previousPeriodValues ? floatval(max($previousPeriodValues)) + 20 : 20;

        // Calculate total clicks for current and previous periods
        $currentPeriodTotal = array_sum($currentPeriodValues);
        $previousPeriodTotal = array_sum($previousPeriodValues);

        // Calculate growth percentage
        $growthPercentage = $previousPeriodTotal > 0 ? (($currentPeriodTotal - $previousPeriodTotal) / $previousPeriodTotal) * 100 : 0;

        // Prepare performance overview data
        $performanceOverview = [
            "currentPeriod" => [
                "count" => $currentPeriodTotal,
                "click" => $currentPeriodValues,
                "min_value" => $currentMinClick,
                "max_value" => $currentMaxClick,
                "labels" => $currentPeriodLabels
            ],
            "previousPeriod" => [
                "count" => $previousPeriodTotal,
                "click" => $previousPeriodValues,
                "min_value" => $previousMinClick,
                "max_value" => $previousMaxClick,
                "labels" => $previousPeriodLabels
            ],
            "growth" => [
                "percentage" => $growthPercentage,
                "position" => $growthPercentage > 0 ? "up" : "down"
            ]
        ];

        return $performanceOverview;
    }

    protected function getData($startDate, $endDate)
    {
        $trackingDetails = DB::table('tracking_details')
            ->select(
                DB::raw("COUNT(tracking_id) as daily_hits"),
                DB::raw("DATE_FORMAT(created_at, '{$this->queryDateFormat}') as trans_date")
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('publisher_id', $this->user->id)
            ->where('website_id', $this->user->active_website_id);

        $deeplinkTrackingDetails = DB::table('deeplink_tracking_details')
            ->select(
                DB::raw("COUNT(tracking_id) as daily_hits"),
                DB::raw("DATE_FORMAT(created_at, '{$this->queryDateFormat}') as trans_date")
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('publisher_id', $this->user->id)
            ->where('website_id', $this->user->active_website_id);

        $couponTrackingDetails = DB::table('coupon_tracking_details')
            ->select(
                DB::raw("COUNT(tracking_id) as daily_hits"),
                DB::raw("DATE_FORMAT(created_at, '{$this->queryDateFormat}') as trans_date")
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('publisher_id', $this->user->id)
            ->where('website_id', $this->user->active_website_id);

        $dataQuery = $trackingDetails->unionAll($deeplinkTrackingDetails)->unionAll($couponTrackingDetails)
            ->groupBy('trans_date')
            ->orderBy('trans_date')
            ->get()
            ->groupBy('trans_date')
            ->map(function ($group) {
                return $group->sum('daily_hits');
            })
            ->toArray();

        return $dataQuery;
    }

    protected function fillMissingDates($data, $startDate, $endDate)
    {
        $begin = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($begin, $interval, $end->modify('+1 day'));

        foreach ($period as $dt) {
            $formattedDate = $dt->format($this->dateFormat);
            if (!isset($data[$formattedDate])) {
                $data[$formattedDate] = 0;
            }
        }

        ksort($data);
        return $data;
    }


    protected function getAdvertiserData($startDate, $endDate, $user)
    {
        $trackingDetails = DB::table('tracking_details')
            ->join('advertisers', 'tracking_details.advertiser_id', '=', 'advertisers.id')
            ->select(
                'advertisers.name as advertiser_name',
                DB::raw("COUNT(tracking_details.tracking_id) as total_clicks")
            )
            ->whereBetween('tracking_details.created_at', [$startDate, $endDate])
            ->where('tracking_details.publisher_id', $user->id)
            ->where('tracking_details.website_id', $user->active_website_id)
            ->groupBy('advertisers.name');

        $deeplinkTrackingDetails = DB::table('deeplink_tracking_details')
            ->join('advertisers', 'deeplink_tracking_details.advertiser_id', '=', 'advertisers.id')
            ->select(
                'advertisers.name as advertiser_name',
                DB::raw("COUNT(deeplink_tracking_details.tracking_id) as total_clicks")
            )
            ->whereBetween('deeplink_tracking_details.created_at', [$startDate, $endDate])
            ->where('deeplink_tracking_details.publisher_id', $user->id)
            ->where('deeplink_tracking_details.website_id', $user->active_website_id)
            ->groupBy('advertisers.name');

        $couponTrackingDetails = DB::table('coupon_tracking_details')
            ->join('advertisers', 'coupon_tracking_details.advertiser_id', '=', 'advertisers.id')
            ->select(
                'advertisers.name as advertiser_name',
                DB::raw("COUNT(coupon_tracking_details.tracking_id) as total_clicks")
            )
            ->whereBetween('coupon_tracking_details.created_at', [$startDate, $endDate])
            ->where('coupon_tracking_details.publisher_id', $user->id)
            ->where('coupon_tracking_details.website_id', $user->active_website_id)
            ->groupBy('advertisers.name');

        return $trackingDetails->unionAll($deeplinkTrackingDetails)->unionAll($couponTrackingDetails)
            ->get()
            ->groupBy('advertiser_name')
            ->map(function ($group) {
                return $group->sum('total_clicks');
            })
            ->toArray();

    }
}
