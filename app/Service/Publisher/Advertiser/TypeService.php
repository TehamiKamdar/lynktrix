<?php

namespace App\Service\Publisher\Advertiser;

use App\Models\Advertiser;
use Illuminate\Http\Request;

class TypeService
{
    public function init(Request $request)
    {
        $type = $request->type;

        $heading = null;
        $advertisers = [];
        $source = null;
        if($type == "third_party_advertiser")
        {
            $heading = "Third Party Advertiser";
            $advertisers = new Advertiser();
            $advertisers = $advertisers->selectRaw('sid, source as advertiser, count(source) as total_advertisers')->where("type", "api")->where("status", true)->where("type", "api")->groupBy("source")->get()->toArray();
            $source = array_column($advertisers, 'advertiser');
            $source = implode(',', $source);
        }
        elseif($type == "managed_by_linksCircle")
        {
            $heading = "Managed By LinkCircle";
        }

        $returnView = view("template.publisher.advertisers.advertiser_checkbox", compact("heading","advertisers"))->render();

        return response()->json(['source' => $source, 'html' => $returnView]);

    }
}
