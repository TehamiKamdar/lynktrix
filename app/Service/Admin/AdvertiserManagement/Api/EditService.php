<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Models\Advertiser;
use App\Models\Country;
use App\Models\Mix;
use Artesaos\SEOTools\Facades\SEOMeta;

class EditService
{
    public function init(Advertiser $api_advertiser)
    {
        SEOMeta::setTitle(trans('global.edit') . " " . trans('advertiser.api-advertiser.title_singular'));

        $this->loadCommission($api_advertiser);

        $countries = $this->loadCountries();

        $loadMix = new Mix();
        $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
        $methods = $loadMix->select("id", "name")->where("type", Mix::PROMOTIONAL_METHOD)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();

        return view('template.admin.advertisers.api.edit', compact('api_advertiser', 'countries', 'categories', 'methods'));
    }

    private function loadCommission(Advertiser $advertiser)
    {
        return $advertiser->load('commissions');
    }

    public function loadCountries()
    {
        return Country::orderBy("name", "ASC")->get()->toArray();
    }
}
