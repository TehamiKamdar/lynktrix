<?php

namespace App\Console\Commands\Global;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\GenerateLink as GenerateLinkModel;
use App\Models\Tracking;
use App\Models\User;
use App\Models\Website;
use App\Traits\GenerateLink;
use App\Traits\Notification\Advertiser\Approval;
use App\Traits\Notification\Advertiser\JoinedAdvertiserHold;
use App\Traits\Notification\Advertiser\JoinedAdvertiserReject;
use App\Traits\Notification\Advertiser\Reject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Console\Command;
use Illuminate\Queue\SerializesModels;
class TrackingShortEmpty extends Command
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GenerateLink, Approval, Reject, JoinedAdvertiserHold, JoinedAdvertiserReject;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:emptytackingurl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $advertisers = AdvertiserApply::where('publisher_id', '1fbe6e81-24d9-47fd-ac6c-558d289a4ee4')->where('status','joined')->where('tracking_url_short',null)->orderBy('created_at')->get();
       $this->info($advertisers->count());
            foreach ($advertisers as $advertiser)
            {
                $trackURL = $shortURL = $longURL = null;
                $linkGenerate = AdvertiserApply::GENERATE_LINK_EMPTY;
                if($advertiser->status == AdvertiserApply::STATUS_ACTIVE)
                {
                    $generate = $this->adminGenerateLink($advertiser);
                    $trackURL = $generate['track_url'];
                    $longURL = $generate['long_url'];
                    $shortURL = $generate['short_url'];
                    $linkGenerate = $generate['link_generate'];
                }
               

                $advertiser->update([
                    'tracking_url' => $trackURL,
                    'tracking_url_short' => $shortURL,
                    'tracking_url_long' => $longURL,
                    'is_tracking_generate' => $linkGenerate
                ]);

                $this->info($advertiser);

            }
    
    }

     private function adminGenerateLink($advertiser)
    {
        $website = Website::select('wid')->where("id", $advertiser->website_id)->first();

        if($advertiser->tracking_url)
            $trackURL = $advertiser->tracking_url;
        else
            $trackURL = $this->generateLink($advertiser->internal_advertiser_id, $advertiser->website_id);

        if($advertiser->tracking_url_short)
            $shortURL = $advertiser->tracking_url_short;
        else
            $shortURL = $this->generateShortLink();

        if($advertiser->tracking_url_long)
            $longURL = $advertiser->tracking_url_long;
        else
            $longURL = $this->generateLongLink($advertiser->advertiser_sid, $website->wid, null);

        $linkGenerate = AdvertiserApply::GENERATE_LINK_IN_PROCESS;

        $advertiserCollection = $advertiser->advertiser;

        if(isset($advertiserCollection->id))
        {
            $queue = Vars::LINK_GENERATE;
            GenerateLinkModel::updateOrCreate([
                'advertiser_id' => $advertiser->advertiser->id,
                'publisher_id' => $advertiser->publisher_id,
                'website_id' => $advertiser->website_id,
                'sub_id' => null
            ],[
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

//        GenerateTrackingLinkJob::dispatch($genericAdv, $advertiser->publisher_id, $advertiser->website_id)->onQueue($queue);

        return [
            "track_url" => $trackURL,
            "short_url" => $shortURL,
            "long_url" => $longURL,
            "link_generate" => $linkGenerate
        ];
    }
}
