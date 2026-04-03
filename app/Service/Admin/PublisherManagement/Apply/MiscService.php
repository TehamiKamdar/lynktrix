<?php

namespace App\Service\Admin\PublisherManagement\Apply;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Jobs\Sync\LinkJob;
use App\Models\AdvertiserApply;
use App\Models\Advertiser;
use App\Models\FetchDailyData;
use App\Models\GenerateLink as GenerateLinkModel;
use App\Models\Tracking;
use App\Models\Website;
use App\Traits\GenerateLink;
use App\Traits\Notification\Advertiser\Approval;
use App\Traits\Notification\Advertiser\JoinedAdvertiserHold;
use App\Traits\Notification\Advertiser\JoinedAdvertiserReject;
use App\Traits\Notification\Advertiser\Reject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MiscService
{
    protected $message = null;

    use GenerateLink, Approval, Reject, JoinedAdvertiserHold, JoinedAdvertiserReject;


    public function updateAdvertiserStatus(Request $request)
    {
        $isAjax = $request->ajax();
        $status = false;
      
        try {
            foreach($request->a_id as $rid){
                
                
                $advertiser = DB::table('advertiser_applies as aa')
                ->select(
                    '*',
                    'advertiser_sid as sid',
                )
                ->where('id', $rid)
                ->first();
                $advertiserCollection = Advertiser::find($advertiser->internal_advertiser_id);

                $advertiser->advertiser = $advertiserCollection;

                $trackURL = $longURL = $shortURL = null;
                $linkGenerate = AdvertiserApply::GENERATE_LINK_EMPTY;

                if($advertiser->on_demand_status == Vars::ADVERTISER_STATUS_PENDING)
                {
                    $this->message = "Advertiser Name: {$advertiser->advertiser_name} and Network Name: {$advertiser->source}.  Please verify that the advertiser is not active on the network portal for that publisher website.";
                }
                elseif($request['status'] == AdvertiserApply::STATUS_ACTIVE)
                {
                    $this->advertiserApprove($advertiser);

                    $generateURL = $this->generateLinkNShortLink($advertiser);
                    $trackURL = $generateURL['track_url'];
                    $longURL = $generateURL['long_url'];
                    $shortURL = $generateURL['short_url'];

                    $linkGenerate = AdvertiserApply::GENERATE_LINK_IN_PROCESS;

                }
                elseif ($request['status'] == AdvertiserApply::STATUS_HOLD && $advertiser->status == AdvertiserApply::STATUS_ACTIVE)
                {
                    $this->joinedAdvertiserHoldNotification($advertiser);
                }
                elseif ($request['status'] == AdvertiserApply::STATUS_REJECTED && $advertiser->status == AdvertiserApply::STATUS_ACTIVE)
                {
                    $this->joinedAdvertiserRejectNotification($advertiser);
                }
                elseif ($request['status'] == AdvertiserApply::STATUS_REJECTED)
                {
                    $this->rejectNotification($advertiser);
                }

                if(empty($this->message))
                {

                    AdvertiserApply::where('id',$advertiser->id)->update([
                        'approver_id' => auth()->user()->id,
                        'reject_approve_reason' => $request->message ?? null,
                        'status' => $request->status,
                        'tracking_url' => $trackURL,
                        'tracking_url_long' => $longURL,
                        'tracking_url_short' => $shortURL,
                        'is_tracking_generate' => $linkGenerate
                    ]);

                    $link = Tracking::updateOrCreate([
                        'advertiser_id' => $advertiser->internal_advertiser_id,
                        'website_id' => $advertiser->website_id,
                        'publisher_id' => $advertiser->publisher_id,
                        'sub_id' => null
                    ], [
                        'tracking_url' => $trackURL,
                        'tracking_url_short' => $shortURL,
                        'tracking_url_long' => $longURL,
                    ]);

//                        if($link->wasRecentlyCreated){
//                            FetchDailyData::updateOrCreate([
//                                "path" => "SyncLinkJob",
//                                "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
//                                "queue" => Vars::ADMIN_WORK,
//                                "source" => Vars::GLOBAL,
//                                "key" => $link->id,
//                                "type" => Vars::ADVERTISER
//                            ], [
//                                "name" => "Link Syncing",
//                                "payload" => json_encode([
//                                    'type' => 'tracking',
//                                    'id' => $link->id
//                                ]),
//                                "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
//                            ]);
//                        }
                }
            }
           
               

            if(empty($this->message))
            {
                $this->message = "Apply Advertiser request successfully sent. Please wait, as it may take a few minutes to reflect the status change.";
                $status = true;
            }

        } catch (\Exception $exception)
        {
            $this->message = $exception->getMessage();
        }

        $type = $status ? 'success' : 'error';

        if($isAjax)
        {
            $request->session()->flash($type, $this->message);
            return $status;
        }

        return redirect()->route("admin.approval.index", ['status' => $request['current_status']])->with($type, $this->message);

    }

    public function advertiserApprove($advertiser)
    {
        $advertiserCollection = Advertiser::find($advertiser->internal_advertiser_id);
      
        if(isset($advertiserCollection->id))
        {
          
            $queue = Vars::LINK_GENERATE;
            GenerateLinkModel::updateOrCreate([
                'advertiser_id' => $advertiser->advertiser->id,
                'publisher_id' => $advertiser->publisher_id,
                'website_id' => $advertiser->website_id,
                'sub_id' => null
            ], [
                'name' => 'MoveDataJob Link Job',
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
       

//        $genericAdv = Advertiser::where("id", $advertiser->internal_advertiser_id)->first();
//        GenerateTrackingLinkJob::dispatch($genericAdv, $advertiser->publisher_id, $advertiser->website_id)->onQueue($queue);
        $this->approvalNotification($advertiser);

    }

    public function generateLinkNShortLink($advertiser)
    {
        $website = Website::select('wid')->where("id", $advertiser->website_id)->first();

        if($advertiser->tracking_url)
            $trackURL = $advertiser->tracking_url;
        else
            $trackURL = $this->generateLink($advertiser->internal_advertiser_id, $advertiser->website_id);

        if($advertiser->tracking_url)
            $shortURL = $advertiser->tracking_url_short;
        else
            $shortURL = $this->generateShortLink();

        if($advertiser->tracking_url_long)
            $longURL = $advertiser->tracking_url_long;
        else
            $longURL = $this->generateLongLink($advertiser->advertiser_sid, $website->wid, null);

        return [
            'track_url' => $trackURL,
            'long_url' => $longURL,
            'short_url' => $shortURL
        ];
    }

}
