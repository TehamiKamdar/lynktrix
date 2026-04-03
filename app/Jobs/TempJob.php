<?php

namespace App\Jobs;

use App\Helper\Static\Vars;
use App\Models\AdvertiserApply;
use App\Models\DeeplinkTracking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TempJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $advertisers = AdvertiserApply::where("on_demand_status", Vars::ADVERTISER_STATUS_PENDING);

        $advertisers->update([
            'status' => AdvertiserApply::STATUS_HOLD
        ]);
        foreach ($advertisers->get() as $advertiser)
        {
            DeeplinkTracking::where([
                "advertiser_id" => $advertiser->internal_advertiser_id,
                "publisher_id" => $advertiser->publisher_id,
                "website_id" => $advertiser->website_id
            ])->delete();
        }
    }
}
