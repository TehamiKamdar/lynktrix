<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class GetAdvertiserByNetworkByUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(Request $request)
    {
        $manualCondition = false;
        if($request->network == Advertiser::MANUAL)
            $manualCondition = true;

        if(empty($request->network) || empty($request->publisher) || empty($request->website)) {
            $advertisers = [];
            $total = 0;
        } else {
            $advertisers = Advertiser::select(['id','name','status'])
                ->with('advertiser_applies_without_auth', function($user) use($request) {
                    return $user->where('publisher_id', $request->publisher)
                        ->where('website_id', $request->website);
                })
                ->where(function($query) {
                    $query->orWhereNotNull("name");
                    $query->orWhere("name", "!=", "");
                });

            if($manualCondition) {
                $advertisers = $advertisers->where("type", Advertiser::MANUAL);
            }
            else {
                $advertisers = $advertisers
                    ->where(function($query) {
                        $query->orWhereNotNull("click_through_url");
                        $query->orWhere("click_through_url", "!=", "");
                    })->where("source", $request->network);
            }

            if($request->country)
                $advertisers = $advertisers->where("primary_regions", "LIKE", "%{$request->country}%");

            $advertisers = $advertisers->paginate(100);

            $total = $advertisers->total();

        }

        $returnView = view("template.admin.advertisers.manual_join.listing", compact('advertisers'))->render();

        return response()->json(['total' => $total, 'html' => $returnView]);
    }
}
