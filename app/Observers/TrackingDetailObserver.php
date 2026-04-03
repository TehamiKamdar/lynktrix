<?php

namespace App\Observers;

use App\Models\TrackingClick;
use Carbon\Carbon;

class TrackingDetailObserver
{
    public function creating($model)
    {
        $trackingClick = TrackingClick::firstOrNew([
            'publisher_id' => $model->publisher_id,
            'advertiser_id' => $model->advertiser_id,
            'website_id' => $model->website_id,
            'date' => Carbon::now()->toDateString(),
            'link_type' => 'tracking'
        ]);

        $trackingClick->link_id = $model->id;
        $trackingClick->created_year = Carbon::now()->format('Y');
        $trackingClick->total_clicks = ($trackingClick->total_clicks ?? 0) + $model->total_clicks + 1;
        $trackingClick->save();
    }
}
