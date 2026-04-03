<?php

namespace App\Console\Commands\Global;

use App\Helper\Static\Vars;
use App\Models\AdvertiserApply;
use App\Models\GenerateLink as GenerateLinkModel;
use Illuminate\Console\Command;

class FixTrackingLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-tracking-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If the tracking link is not set, the click-through URL will not find the publisher and website ID.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $advertisers = AdvertiserApply::where('status', AdvertiserApply::STATUS_ACTIVE)->where(function($query) {
            $query->orWhereNull('click_through_url')->orWhere('click_through_url', '');
        })->where('is_checked', 0)->take(100)->get();
        foreach ($advertisers as $advertiser) {

            $data = [
                "is_checked" => 1
            ];

            if (!(str_contains($advertiser->click_through_url, $advertiser->website_id) || str_contains($advertiser->click_through_url, $advertiser->publisher_id))) {
                $data['click_through_url'] = null;
            }

            $advertiser->update($data);

            if($advertiser->click_through_url == null)
            {
                $advertiserCollection = $advertiser->advertiser;

                $queue = Vars::LINK_GENERATE;

                GenerateLinkModel::updateOrCreate([
                    'advertiser_id' => $advertiser->advertiser->id,
                    'publisher_id' => $advertiser->publisher_id,
                    'website_id' => $advertiser->website_id,
                    'sub_id' => null
                ], [
                    'name' => 'Tracking Link Job',
                    'path' => 'GenerateTrackingLinkJob',
                    'payload' => collect([
                        'advertiser' => $advertiserCollection,
                        'publisher_id' => $advertiser->publisher_id,
                        'website_id' => $advertiser->website_id
                    ]),
                    'date' => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                    'queue' => $queue
                ]);

            }

        }
    }
}
