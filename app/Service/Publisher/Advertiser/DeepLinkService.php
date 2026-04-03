<?php

namespace App\Service\Publisher\Advertiser;

use App\Classes\RandomStringGenerator;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\DeeplinkRequest;
use App\Jobs\DeeplinkGenerateJob;
use App\Jobs\Sync\LinkJob;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\DeeplinkTracking;
use App\Models\FetchDailyData;
use App\Models\GenerateLink as GenerateLinkModel;
use App\Models\Tracking;
use App\Models\Website;
use App\Traits\DeepLink;
use Illuminate\Http\Request;

class DeepLinkService
{

    use DeepLink;

    public function checkAvailability(DeeplinkRequest $request, $user, $websiteId)
    {
        $advertiser = Advertiser::select('id', 'sid', 'name', 'deeplink_enabled', 'advertiser_id', 'source', 'click_through_url', 'url')->where("sid", $request->widgetAdvertiser)->first();
        $apply = AdvertiserApply::select('id')->where("advertiser_sid", $request->widgetAdvertiser)->where("publisher_id", $user->id)->where("website_id", $websiteId)->first();

        $deepLinkEnable = $advertiser->deeplink_enabled ?? false;

        if($advertiser && isset($apply->id) && $deepLinkEnable && $request->landing_url) {

            return $this->createNGetDeeplink($request, $advertiser, $websiteId, $user);

        } else {

            if($deepLinkEnable == 0)
            {
                return response()->json([
                    "success" => false,
                    "message" => "This advertiser is not allowed to create deeplinks."
                ]);
            }

            return response()->json([
                "success" => false,
                "message" => "Landing URL is not valid...."
            ]);

        }

    }

    private function createNGetDeeplink(Request $request, Advertiser $advertiser, $websiteId, $user)
    {
        $subID = $request->sub_id ?? null;

        $landing_url = $request->landing_url;
        $deeplink = DeeplinkTracking::select([
            'click_through_url',
            'tracking_url',
            'tracking_url_long',
            'id',
            'advertiser_id',
            'publisher_id',
            'website_id',
            'landing_url',
            'sub_id',
        ])->where([
            "advertiser_id" => $advertiser->id,
            "website_id" => $websiteId,
            "publisher_id" => $user->id,
            "landing_url" => $landing_url,
            "sub_id" => $subID
        ])->first();

        if($deeplink && isset($deeplink->click_through_url)) {
            $shortLink = $deeplink->tracking_url;
            $longLink = $deeplink->tracking_url_long;
        } else {
            $website = Website::select('wid')->where("id", $websiteId)->first();
            $shortLink = $this->generateShortLink();
            $longLink = $this->generateLongLink($advertiser->sid, $website->wid, $subID, $landing_url);

            $deeplink = DeeplinkTracking::select([
                "click_through_url",
                "tracking_url",
                "tracking_url_long",
                "advertiser_id",
                "publisher_id",
                "website_id",
                "landing_url",
                "sub_id",
                "id"
            ])->where([
                "advertiser_id" => $advertiser->id,
                "website_id" => $websiteId,
                "publisher_id" => $user->id,
                "tracking_url" => $shortLink,
                "tracking_url_long" => $longLink,
                "sub_id" => $subID,
                "landing_url" => $landing_url,
            ])->first();

            if(!isset($deeplink->id))
            {
                $deeplink = DeeplinkTracking::create([
                    "advertiser_id" => $advertiser->id,
                    "website_id" => $websiteId,
                    "publisher_id" => $user->id,
                    "tracking_url" => $shortLink,
                    "tracking_url_long" => $longLink,
                    "sub_id" => $subID,
                    "landing_url" => $landing_url,
                    "click_through_url" => ''
                ]);
            }

            $queue = Vars::LINK_GENERATE;

            GenerateLinkModel::updateOrCreate([
                'advertiser_id' => $deeplink->advertiser_id,
                'publisher_id' => $deeplink->publisher_id,
                'website_id' => $deeplink->website_id,
                'landing_url' => $deeplink->landing_url,
                'sub_id' => $deeplink->sub_id
            ], [
                'name' => 'Deep Link Job',
                'path' => 'DeeplinkGenerateJob',
                'payload' => collect($deeplink->toArray()),
                'date' => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                'queue' => $queue
            ]);
        }

        return response()->json([
            "success" => true,
            "name" => $advertiser->name ?? null,
            "deeplink_enabled" => true,
            "deeplink_link_short_url" => $shortLink,
            "deeplink_link_url" => $longLink
        ]);

    }

    private function getTrackingLink(Request $request, Advertiser $advertiser, AdvertiserApply $apply, $user)
    {
        if($request->sub_id)
        {
            $tracking = Tracking::select('tracking_url_short')->where([
                "sub_id" => $request->sub_id,
                'advertiser_id' => $advertiser->id,
                'publisher_id' => $apply->publisher_id,
                'website_id' => $apply->website_id
            ])
                ->first();

            if($tracking)
            {

                $track = $tracking->tracking_url_short ?? null;

            }
            else{
                $queue = Vars::LINK_GENERATE;
                GenerateLinkModel::updateOrCreate([
                    'advertiser_id' => $advertiser->id,
                    'publisher_id' => $apply->publisher_id,
                    'website_id' => $apply->website_id,
                    'landing_url' => $request->landing_url,
                    'sub_id' => $request->sub_id
                ],[
                    'name' => 'Tracking Link Job With Sub ID',
                    'path' => 'GenerateTrackingLinkWithSubIDJob',
                    'payload' => collect([
                        'advertiser' => $advertiser,
                        'publisher_id' => $advertiser->publisher_id,
                        'website_id' => $advertiser->website_id
                    ]),
                    'date' => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                    'queue' => $queue
                ]);

                $website = Website::select('wid')->where("id", $apply->website_id)->first();

                $shortLink = $this->generateTrackingShortLink();
                $longLink = $this->generateTrackingLongLink($advertiser->sid, $website->wid, $request->sub_id);

                $link = Tracking::updateOrCreate(
                    [
                        "sub_id" => $request->sub_id,
                        'advertiser_id' => $advertiser->id,
                        'publisher_id' => $user->id,
                        'website_id' => $apply->website_id
                    ],
                    [
                        "click_through_url" => '',
                        "tracking_url_short" => $shortLink,
                        "tracking_url_long" => $longLink,
                        "is_tracking_generate" => AdvertiserApply::GENERATE_LINK_IN_PROCESS
                    ]
                );

//                if($link->wasRecentlyCreated){
//                    FetchDailyData::updateOrCreate([
//                        "path" => "SyncLinkJob",
//                        "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
//                        "queue" => Vars::ADMIN_WORK,
//                        "source" => Vars::GLOBAL,
//                        "key" => $link->id,
//                        "type" => Vars::ADVERTISER
//                    ], [
//                        "name" => "Link Syncing",
//                        "payload" => json_encode([
//                            'type' => 'tracking',
//                            'id' => $link->id
//                        ]),
//                        "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
//                    ]);
//                }

                $track = $link->tracking_url_short ?? null;
            }
        }
        else
        {
            if(isset($apply->tracking_url_short) && isset($apply->is_tracking_generate) && $apply->is_tracking_generate == AdvertiserApply::GENERATE_LINK_COMPLETE)
                $track = $apply->tracking_url_short;

            elseif(isset($apply->is_tracking_generate) && $apply->is_tracking_generate == AdvertiserApply::GENERATE_LINK_IN_PROCESS)
                $track = "Generating tracking links.....";
        }

        return response()->json([
            "success" => true,
            "name" => $advertiser->name ?? null,
            "tracking_url" => $track ?? null
        ]);

    }

    public function generateTrackingShortLink()
    {
        $generator = new RandomStringGenerator();
        $tokenLength = 8;
        $code = $generator->generate($tokenLength);
        $trackCode = Tracking::select('id')->where("tracking_url_short", route("track.simple.short", ['code' => $code]))->count();
        if($trackCode > 0)
        {
            return $this->generateTrackingShortLink();
        }
        return route("track.simple.short", ['code' => $code]);
    }
    public function generateTrackingLongLink($linkmid, $linkaffid, $subID, $ued)
    {
        return route("track.simple.long", ["linkmid" => $linkmid, "linkaffid" => $linkaffid, "subid" => $subID]);
    }
}
