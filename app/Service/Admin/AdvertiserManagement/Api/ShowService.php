<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Models\Advertiser;
use Artesaos\SEOTools\Facades\SEOMeta;

class ShowService
{
    public function init(Advertiser $api_advertiser)
    {
        SEOMeta::setTitle(trans('global.show') . " " . trans('advertiser.api-advertiser.title_singular'));

        $this->loadCommission($api_advertiser);

        return view('template.admin.advertisers.api.show', compact('api_advertiser'));

    }

    private function loadCommission(Advertiser $advertiser)
    {
        return $advertiser->load('commissions');
    }
}
