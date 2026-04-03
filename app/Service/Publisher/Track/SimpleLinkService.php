<?php

namespace App\Service\Publisher\Track;

use App\Classes\RandomStringGenerator;
use App\Helper\LinkGenerate;
use App\Helper\Static\Vars;
use App\Jobs\MakeHistory;
use App\Jobs\Sync\LinkJob;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\DeeplinkTracking;
use App\Models\DelTracking;
use App\Models\FetchDailyData;
use App\Models\History;
use App\Models\Tracking;
use App\Models\TrackingDetail;
use App\Models\User;
use App\Traits\GenerateLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class SimpleLinkService
{
    use GenerateLink;

    public function storeSimple(Request $request, $advertiser, $website)
    {
        $url = route("track.simple", ['advertiser' => $advertiser, 'website' => $website]);

        $cacheKey = 'tracking_simple_tracking_' . md5($url);
        $activeAdvertiser = Cache::get($cacheKey);

        if (!$activeAdvertiser) {
            $activeAdvertiser = AdvertiserApply::where("tracking_url", $url)->first();

            if ($activeAdvertiser && $activeAdvertiser->click_through_url) {
                Cache::forever($cacheKey, $activeAdvertiser);
            }
        }

        if($activeAdvertiser) {

            $activeAdvertiserLive = AdvertiserApply::select('status')->where('id', $activeAdvertiser->id)->first();
            $publisher = User::select('status')->where('id', $activeAdvertiser->publisher_id)->first();

            if($activeAdvertiserLive->status == AdvertiserApply::STATUS_ACTIVE && $publisher->status == User::ACTIVE)
            {
                $ad = Advertiser::find($activeAdvertiser->internal_advertiser_id);
                if($ad){
                    $activeAdvertiser->click_through_url = $ad->click_through_url;
                }
                
                if($activeAdvertiser->click_through_url)
                {
                    
                    $this->storeTrackingData($request, $activeAdvertiser);
                    return [
                        "success" => true,
                        "url" => $activeAdvertiser->click_through_url
                    ];
                } else
                {
                    return [
                        "success" => false,
                        "view" => view("template.publisher.advertisers.link-in-process", compact('advertiser'))
                    ];
                }
            }

        }

        $advertiser = $activeAdvertiser->advertiser ?? [];

        return [
            "success" => false,
            "view" => view("template.publisher.advertisers.link-dead", compact('advertiser'))
        ];

    }
    public function storeCode(Request $request, string $code)
    {
        $url = route("track.short", $code);

        $cacheKey = 'tracking_simple_tracking_' . md5($url);
        $activeAdvertiser =null;

        if (!$activeAdvertiser) {
            $activeAdvertiser = AdvertiserApply::with(['advertiser'])->select(['id', 'publisher_id','website_id', 'internal_advertiser_id', 'status', 'click_through_url'])->where("tracking_url_short", $url)->first();
            
            if($activeAdvertiser){
$ad = Advertiser::find($activeAdvertiser->internal_advertiser_id);
            $activeAdvertiser->click_through_url = $ad->click_through_url;
            if ($activeAdvertiser && $activeAdvertiser->click_through_url) {
               Cache::put($cacheKey, $activeAdvertiser, now()->addMinutes(30));
            }
            }
            
        }

        $advertiser = $activeAdvertiser->advertiser ?? [];

        if($activeAdvertiser) {
            $activeAdvertiserLive = AdvertiserApply::select('status')->where('id', $activeAdvertiser->id)->first();
            $publisher = User::select('status')->where('id', $activeAdvertiser->publisher_id)->first();
            if($activeAdvertiserLive->status == AdvertiserApply::STATUS_ACTIVE && $publisher->status == User::ACTIVE)
            {
                $ad = Advertiser::find($activeAdvertiser->internal_advertiser_id);
                $activeAdvertiser->click_through_url = $ad->click_through_url;
                if($activeAdvertiser->click_through_url)
                {
                    if($request->subid){
                        $subid = $request->subid;
                    }else{
                        $subid = null;
                    }
                    $link = new LinkGenerate();
                    $clickLink = $link->generate($activeAdvertiser->advertiser, $activeAdvertiser->publisher_id, $activeAdvertiser->website_id, $subid);
                    $activeAdvertiser->click_through_url = $clickLink;
                    
                     $tracking = Tracking::updateOrCreate(
                [
                    "advertiser_id" => $activeAdvertiser->internal_advertiser_id,
                    "website_id" => $activeAdvertiser->website_id,
                    "publisher_id" => $activeAdvertiser->publisher_id,
                    "tracking_url_short" => $url,
                    "sub_id" => $request->subid,
                ],
                [
                    "click_through_url" => $clickLink,
                ]
            );
                    $this->storeTrackingData($request, $activeAdvertiser);
                    return [
                        "success" => true,
                        "url" => $clickLink
                    ];
                } else
                {
                    return [
                        "success" => false,
                        "view" => view("template.publisher.advertisers.link-in-process", compact('advertiser'))
                    ];
                }
            }
        }

        return [
            "success" => false,
            "view" => view("template.publisher.advertisers.link-dead", compact('advertiser'))
        ];
    }

    public function storeURLTrackingWithSubId(Request $request, Tracking $tracking)
    {
        $activeAdvertiser = $this->getAdvertiserApply($tracking);

        $advertiser = $activeAdvertiser->advertiser ?? [];

        if($activeAdvertiser) {
            if($activeAdvertiser->status == AdvertiserApply::STATUS_ACTIVE && $activeAdvertiser->publisher->status == User::ACTIVE)
            {
                if($tracking->click_through_url)
                {
                    $this->makeHistory($request, $activeAdvertiser, $tracking);
                    return [
                        "success" => true,
                        "url" => $tracking->click_through_url
                    ];
                } else
                {
                    return [
                        "success" => false,
                        "view" => view("template.publisher.advertisers.link-in-process", compact('advertiser'))
                    ];
                }
            }
        }

        return [
            "success" => false,
            "view" => view("template.publisher.advertisers.link-dead", compact('advertiser'))
        ];
    }

    public function storeCodeTrackingWithSubId(Request $request, $code)
    {
        $url = route("track.simple.short", $code);

        $cacheKey = 'tracking_simple_short_with_sub_id_tracking_' . md5($url);
        $tracking = Cache::get($cacheKey);

        if (!$tracking) {
            $tracking = Tracking::select([
                            'advertiser_id',
                            'publisher_id',
                            'website_id',
                            'click_through_url',
                            'hits',
                            'id',
                            'unique_visitor',
                        ])->where("tracking_url_short", $url)->first();

            if(empty($tracking))
            {
                $tracking = DelTracking::select([
                    'advertiser_id',
                    'publisher_id',
                    'website_id',
                    'click_through_url',
                    'hits',
                    'id',
                    'unique_visitor',
                ])->where("tracking_url_short", $url)->first();
            }

            if ($tracking && $tracking->click_through_url) {
                Cache::forever($cacheKey, $tracking);
            }
        }

        $activeAdvertiser = $this->getAdvertiserApply($tracking);

        $advertiser = $activeAdvertiser->advertiser ?? [];

        if($activeAdvertiser) {
            if($activeAdvertiser->status == AdvertiserApply::STATUS_ACTIVE && $activeAdvertiser->publisher->status == User::ACTIVE)
            {

                if($tracking->click_through_url)
                {
                    $this->makeHistory($request, $activeAdvertiser, $tracking);
                    return [
                        "success" => true,
                        "url" => $tracking->click_through_url
                    ];
                } else
                {
                    return [
                        "success" => false,
                        "view" => view("template.publisher.advertisers.link-in-process", compact('advertiser'))
                    ];
                }
            }
        }

        return [
            "success" => false,
            "view" => view("template.publisher.advertisers.link-dead", compact('advertiser'))
        ];
    }


    public function storeSimpleTracking(Request $request)
    {
        $url = route("track.simple.long", ["linkmid" => $request->linkmid, "linkaffid" => $request->linkaffid, "subid" => $request->subid]);

        $cacheKey = 'tracking_simple_long_tracking_' . md5($url);
        $tracking = Cache::get($cacheKey);
        
        if (!$tracking) {

            $tracking = Tracking::select([
                'id',
                'advertiser_id',
                'publisher_id',
                'website_id',
                'click_through_url',
                'hits',
                'unique_visitor',
            ])->where("tracking_url_long", $url)->first();

            if($tracking && empty($tracking->click_through_url))
            {
                $activeAdvertiser = AdvertiserApply::where('advertiser_sid', $request->linkmid)
                                                    ->where('website_wid', $request->linkaffid)
                                                    ->first();

                $link = new LinkGenerate();
                $clickLink = $link->generate($activeAdvertiser->advertiser, $activeAdvertiser->publisher_id, $activeAdvertiser->website_id, $request->subid);

                if(!empty($clickLink))
                    $tracking->update([
                        'click_through_url' => $clickLink
                    ]);
            }

            if(empty($tracking))
            {
                $tracking = DelTracking::select([
                    'id',
                    'advertiser_id',
                    'publisher_id',
                    'website_id',
                    'click_through_url',
                    'hits',
                    'unique_visitor',
                ])->where("tracking_url_long", $url)->first();
            }

            if ($tracking && $tracking->click_through_url) {
                Cache::forever($cacheKey, $tracking);
            }
        }

        if($tracking) {
            $activeAdvertiser = $this->getAdvertiserApply($tracking);
             
            $link = new LinkGenerate();
            $clickLink = $link->generate($activeAdvertiser->advertiser, $activeAdvertiser->publisher_id, $activeAdvertiser->website_id, $request->subid);

            $tracking = Tracking::updateOrCreate(
                [
                    "advertiser_id" => $activeAdvertiser->internal_advertiser_id,
                    "website_id" => $activeAdvertiser->website_id,
                    "publisher_id" => $activeAdvertiser->publisher_id,
                    "tracking_url_long" => $url,
                    "sub_id" => $request->subid,
                ],
                [
                    "click_through_url" => $clickLink,
                ]
            );
        }
        else
        {
            $activeAdvertiser = AdvertiserApply::where("advertiser_sid", $request->linkmid)->where("website_wid", $request->linkaffid)->where("status", AdvertiserApply::STATUS_ACTIVE)->first();
            if(empty($activeAdvertiser))
            {
                return [
                    "success" => false,
                    "view" => view("template.publisher.advertisers.link-dead", compact('activeAdvertiser'))
                ];
            }

            $link = new LinkGenerate();
            $clickLink = $link->generate($activeAdvertiser->advertiser, $activeAdvertiser->publisher_id, $activeAdvertiser->website_id, $request->subid);

            $tracking = Tracking::updateOrCreate(
                [
                    "advertiser_id" => $activeAdvertiser->internal_advertiser_id,
                    "website_id" => $activeAdvertiser->website_id,
                    "publisher_id" => $activeAdvertiser->publisher_id,
                    "tracking_url_long" => $url,
                    "sub_id" => $request->subid,
                ],
                [
                    "click_through_url" => $clickLink,
                ]
            );

        }

        $advertiser = $activeAdvertiser->advertiser ?? [];

        if(isset($activeAdvertiser)) {
            if($activeAdvertiser->status == AdvertiserApply::STATUS_ACTIVE && $activeAdvertiser->publisher->status == User::ACTIVE)
            {
                if($tracking->click_through_url)
                {
                    $this->makeHistory($request, $activeAdvertiser, $tracking);
                    return [
                        "success" => true,
                        "url" => $tracking->click_through_url
                    ];
                } else
                {
                    return [
                        "success" => false,
                        "view" => view("template.publisher.advertisers.link-in-process", compact('advertiser'))
                    ];
                }
            }
        }

        return [
            "success" => false,
            "view" => view("template.publisher.advertisers.link-dead", compact('advertiser'))
        ];
    }

  private function storeTrackingData(Request $request, AdvertiserApply $activeAdvertiser)
{
    $cacheKey = sprintf(
        'tracking_store_date_tracking_%s_%s_%s_%s',
        $activeAdvertiser->internal_advertiser_id,
        $activeAdvertiser->website_id,
        $activeAdvertiser->publisher_id,
        $activeAdvertiser->sub_id
    );

    $tracking = Cache::get($cacheKey);

    if (!$tracking) {
        $conditions = [
            'advertiser_id' => $activeAdvertiser->internal_advertiser_id,
            'website_id'    => $activeAdvertiser->website_id,
            'publisher_id'  => $activeAdvertiser->publisher_id,
            'sub_id'        => $activeAdvertiser->sub_id,
        ];

        $selectFields = [
            'hits',
            'unique_visitor',
            'id',
            'advertiser_id',
            'publisher_id',
            'website_id',
        ];

        $tracking = Tracking::select($selectFields)
            ->where($conditions)
            ->first();

        if (!$tracking) {
            $tracking = DelTracking::select($selectFields)
                ->where($conditions)
                ->first();
        }

        // Optionally cache it for faster future access
        if ($tracking) {
            Cache::put($cacheKey, $tracking, now()->addMinutes(30));
        }
    }

    if ($tracking) {
        $this->makeHistory($request, $activeAdvertiser, $tracking);
    }
}

    private function makeHistory(Request $request, AdvertiserApply $activeAdvertiser, $tracking)
    {
        $jobClassTracking = "App\Models\Tracking";
        $jobClassTrackingDetail = "App\Models\TrackingDetail";

        History::updateOrCreate([
            "path" => "MakeHistoryTrackingJob",
            "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
            "date" => Vars::CUSTOM_DATE_FORMAT_2,
            "advertiser_id" => $activeAdvertiser->id,
            'website_id' => $tracking->website_id,
            'publisher_id' => $tracking->publisher_id,
            'sub_id' => $tracking->sub_id,
            "queue" => Vars::MAKE_HISTORY,
            "source" => Vars::GLOBAL
        ], [
            "name" => "Make the History.",
            "payload" => json_encode([
                "ip" => $request->ip(),
                "tracking_id" => $tracking->id,
                "active_advertiser_apply_id" => $activeAdvertiser->id,
                "model_tracking" => $jobClassTracking,
                "model_tracking_detail" => $jobClassTrackingDetail
            ]),
            "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
        ]);

    }

    protected function getAdvertiserApply($tracking)
    {
        return AdvertiserApply::with('publisher:id,status')
                ->where("internal_advertiser_id", $tracking->advertiser_id ?? null)
                ->where("publisher_id", $tracking->publisher_id ?? null)
                ->where("website_id", $tracking->website_id ?? null)
                ->first();
    }
}
