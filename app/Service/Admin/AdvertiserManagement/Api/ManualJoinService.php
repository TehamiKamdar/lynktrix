<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\GenerateLink as GenerateLinkModel;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ManualJoinService
{
    public function getManualJoinView()
    {

        abort_if(Gate::denies('admin_manual_join_publishers_advertisers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $networks = Vars::OPTION_LIST;
        $publishers = User::whereType(User::PUBLISHER)->whereStatus(User::ACTIVE)->get();
        return view('template.admin.advertisers.manual_join.advertiser', compact('networks', 'publishers'));
    }

    public function storeManualJoinData(Request $request) {

        try {

            $advertisers = Advertiser::where('status', Vars::ADVERTISER_STATUS_ACTIVE)->where("type", "!=", "manual")->whereNotNull('click_through_url')->where('status', 1)->whereIn("id", $request->status)->get();
            $publisher = User::where("id", $request->publisher)->first();

            foreach ($advertisers as $advertiser)
            {

                if($request->website)
                {
                    $website = Website::select('wid')->where('id', $request->website)->first();

                    AdvertiserApply::updateOrCreate([
                        'publisher_id'   => $publisher->id,
                        "website_id"     => $request->website,
                        "advertiser_sid" => $request->advertiser_sid
                    ],[
                        "website_id" => $request->website,
                        "internal_advertiser_id" => $advertiser->id,
                        "advertiser_sid" => $advertiser->sid,
                        "website_wid" => $website->wid,
                        "approver_id" => auth()->user()->id,
                        "publisher_name" => $publisher->first_name . " " . $publisher->last_name,
                        "advertiser_name" => $advertiser->name,
                        "status" => AdvertiserApply::STATUS_ACTIVE,
                        "type" => $advertiser->type,
                        "source" => $advertiser->source ?? null,
                    ]);

                    $advertiserCollection = $advertiser;

                    if(isset($advertiserCollection->id))
                    {
                        $queue = Vars::LINK_GENERATE;
                        GenerateLinkModel::updateOrCreate([
                            'advertiser_id' => $advertiser->id,
                            'publisher_id' => $publisher->id,
                            'website_id' => $request->website,
                            'sub_id' => null
                        ],[
                            'name' => 'Tracking Link Job',
                            'path' => 'GenerateTrackingLinkJob',
                            'payload' => collect([
                                'advertiser' => $advertiserCollection,
                                'publisher_id' => $publisher->id,
                                'website_id' => $request->website
                            ]),
                            'date' => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                            'queue' => $queue
                        ]);
                    }

//                    GenerateTrackingLinkJob::dispatch($advertiser, $publisher->id, $request->website)->onQueue($queue);
                }
            }

            $response = [
                "type" => "success",
                "message" => "Manual Joined Data Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.advertiser-management.manual_join_publisher')->with($response['type'], $response['message']);
    }
}
