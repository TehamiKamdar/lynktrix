<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MiscService
{

    public function getDuplicateAdvertisers()
    {
        $duplicatesURL = Advertiser::select('url', DB::raw('COUNT(*) as `count`'))
            ->where(function($query) {
                $query->orWhereNotNull("name");
                $query->orWhere("name", "!=", "");
            })
            ->where(function($query) {
                $query->orWhereNotNull("click_through_url");
                $query->orWhere("click_through_url", "!=", "");
            })
            ->groupBy('url')
            ->havingRaw('COUNT(*) > 1')
            ->get()->pluck('url');
        $advertisers = Advertiser::select('id','name','status','source')->whereIn('url', $duplicatesURL)->orderBy('url', 'ASC')->get();
        return view('template.admin.advertisers.api.duplicate_record', compact('advertisers'));
    }

    public function advertiserDuplicateRecordsStore(Request $request) {

        try {

            $duplicatesURL = Advertiser::select('url', DB::raw('COUNT(*) as `count`'))
                ->where(function($query) {
                    $query->orWhereNotNull("name");
                    $query->orWhere("name", "!=", "");
                })
                ->where(function($query) {
                    $query->orWhereNotNull("click_through_url");
                    $query->orWhere("click_through_url", "!=", "");
                })
                ->groupBy('url')
                ->havingRaw('COUNT(*) > 1')
                ->get()->pluck('url');

            Advertiser::select('id','name','status','source')->whereIn('url', $duplicatesURL)->update([
                "status" => null
            ]);

            if($request->status) {

                Advertiser::whereIn("id", $request->status)->update([
                    "status" => true
                ]);

            }

            $response = [
                "type" => "success",
                "message" => "Advertiser API Data Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.advertiser-management.api-advertisers.duplicate_record')->with($response['type'], $response['message']);

    }

    public function updateStatus(Advertiser $api_advertiser)
    {
        $status = $api_advertiser->status ? null : true;
        $api_advertiser->update([
            'status' => $status,
        ]);
        return response()->json("Status Successfully Updated", 200);
    }
}
