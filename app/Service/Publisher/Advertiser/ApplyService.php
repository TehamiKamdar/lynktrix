<?php

namespace App\Service\Publisher\Advertiser;

use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\ApplyAdvertiserRequest;
use App\Jobs\Admitad\StatusCheckJob;
use App\Jobs\Sync\LinkJob;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\FetchDailyData;
use App\Models\Tracking;
use App\Models\Website;
use App\Traits\Notification\Advertiser\Apply;
use Illuminate\Http\Request;

class ApplyService
{
    use Apply;

    /**
     * @param Request $request
     * @return array|string[]
     */
    public function init(ApplyAdvertiserRequest $request): array
    {
        try {

            $user = auth()->user();
            $advertiser = Advertiser::whereSid($request->a_id)->where('status',1)->first();
         
            if($advertiser && isset($user->active_website_id)) {

                $this->applyAdvertiserReq($request, $advertiser, $user);

                return [
                    "type" => "success",
                    "message" => "Successfully applied for affiliation. Please wait for approval."
                ];

            }
            elseif (empty($activeWebsite))
            {

                return [
                    "type" => "error",
                    "message" => "Website not active."
                ];

            }
            else {

                return [
                    "type" => "error",
                    "message" => "Advertiser ID not Exist."
                ];

            }

        } catch (\Exception $exception) {

            return [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }
    }

    private function applyAdvertiserReq($request, $advertiser, $publisher)
    {
        $activeWebsite = $publisher->active_website_id;

        $advertiserCheck = AdvertiserApply::
                            where("publisher_id", $publisher->id)
                            ->where("internal_advertiser_id", $advertiser->id)
                            ->where("website_id", $activeWebsite)->count();
                          
        if($advertiserCheck == 0) {

            $data = [
                "publisher_name" => $publisher->first_name . " " . $publisher->last_name,
                "advertiser_name" => $advertiser->name,
                "status" => AdvertiserApply::STATUS_PENDING,
                "type" => $advertiser->type,
                "source" => $advertiser->source ?? null,
                "message" => $request->message,
                'is_tracking_generate' => AdvertiserApply::GENERATE_LINK_EMPTY,
            ];

            $website = Website::select('wid')->where('id', $activeWebsite)->first();

            $apply = AdvertiserApply::updateOrCreate([
                "publisher_id" => $publisher->id,
                "website_id" => $activeWebsite,
                "advertiser_sid" => $advertiser->sid,
                "website_wid" => $website->wid,
                "internal_advertiser_id" => $advertiser->id,
            ], $data);

            $tracking = Tracking::updateOrCreate(
                [
                    'advertiser_id' => $advertiser->id,
                    'website_id' => $activeWebsite,
                    'publisher_id' => $publisher->id,
                    "sub_id" => $request->sub_id
                ],
                [
                ]
            );

//            if($tracking->wasRecentlyCreated){
//                FetchDailyData::updateOrCreate([
//                    "path" => "SyncLinkJob",
//                    "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
//                    "key" => $tracking->id,
//                    "queue" => Vars::ADMIN_WORK,
//                    "source" => Vars::GLOBAL,
//                    "type" => Vars::ADVERTISER
//                ], [
//                    "name" => "Link Syncing",
//                    "payload" => json_encode([
//                        'type' => 'tracking',
//                        'id' => $tracking->id
//                    ]),
//                    "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
//                ]);
//            }

            $this->applyNotification($advertiser, $publisher->id);

            if(empty($apply))
            {
                $apply = AdvertiserApply::where([
                    "publisher_id" => $publisher->id,
                    "website_id" => $activeWebsite,
                    "advertiser_sid" => $advertiser->sid,
                    "internal_advertiser_id" => $advertiser->id,
                ])->first();
            }

            if($advertiser->source == Vars::ADMITAD) {

//                FetchDailyData::updateOrCreate([
//                    "path" => "AdmitadStatusCheckJob",
//                    "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
//                    "queue" => Vars::ADMITAD_ON_QUEUE,
//                    "source" => Vars::ADMITAD
//                ], [
//                    "name" => "Admitad Status Check Job",
//                    "payload" => json_encode(['apply_id' => $apply->id, 'website_id' => $apply->website_id, 'advertiser_id' => $advertiser->advertiser_id]),
//                    "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
//                ]);

//                StatusCheckJob::dispatch($apply->id, $apply->website_id, $advertiser->advertiser_id)->onQueue(Vars::ADMITAD_ON_QUEUE);

            }
        }
    }
}
