<?php

namespace App\Console\Commands\Global;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\DeeplinkTracking;
use App\Models\GenerateLink as GenerateLinkModel;
use Illuminate\Console\Command;

class FixDeepLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-deep-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If the deep link is not set, the click-through URL will not find the publisher and website ID.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deeplinks = DeeplinkTracking::whereNull('click_through_url')
                                    ->orWhere('click_through_url', '')
                                    ->limit(Vars::LIMIT_5000)
                                    ->get();
        foreach ($deeplinks as $deeplink)
        {

            if(empty($deeplink->publisher_id))
            {
                Methods::customError("Regenerate Deep Link URL inside Deep Link Tracking Publisher ID not exist.", $deeplink);
            }

            elseif(empty($deeplink->website_id))
            {
                Methods::customError("Regenerate Deep Link URL inside Deep Link Tracking Website ID not exist.", $deeplink);
            }

            elseif(!isset($deeplink->id))
            {
                Methods::customError("Regenerate Deep Link URL inside Deep Link Tracking ID not exist.", $deeplink);
            }

            elseif (empty($deeplink->advertiser->click_through_url))
            {
                Methods::customError("DELETE DEEPLINK.", print_r($deeplink, true));
                $deeplink->delete();
            }

            else {

                $queue = Vars::LINK_GENERATE;

                GenerateLinkModel::updateOrCreate([
                    'advertiser_id' => $deeplink->advertiser_id,
                    'publisher_id' => $deeplink->publisher_id,
                    'website_id' => $deeplink->website_id,
                    'landing_url' => $deeplink->landing_url,
                    'sub_id' => $deeplink->sub_id,
                    'date' => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                ],[
                    'name' => 'Deep Link Job',
                    'path' => 'DeeplinkGenerateJob',
                    'payload' => collect($deeplink->toArray()),
                    'queue' => $queue
                ]);

//                DeeplinkGenerateJob::dispatch($deeplink->toArray())
//                    ->onQueue(Vars::ADMIN_WORK);

            }
        }
    }
}
