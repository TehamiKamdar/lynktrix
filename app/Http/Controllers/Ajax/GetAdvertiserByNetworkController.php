<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class GetAdvertiserByNetworkController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $networkCondition = true;
        if($request->network == Advertiser::MANUAL)
            $networkCondition = false;

        $advertisers = Advertiser::select(['id','name','status'])
                                ->where(function($query) {
                                    $query->orWhereNotNull("name");
                                    $query->orWhere("name", "!=", "");
                                })
                                ->where(function($query) {
                                    $query->orWhereNotNull("click_through_url");
                                    $query->orWhere("click_through_url", "!=", "");
                                });

        if($networkCondition)
            $advertisers = $advertisers->where("source", $request->network);

        else
            $advertisers = $advertisers->where("type", Advertiser::MANUAL);

        if($request->country)
            $advertisers = $advertisers->where("primary_regions", "LIKE", "%{$request->country}%");

        return $advertisers->get();
    }
}
