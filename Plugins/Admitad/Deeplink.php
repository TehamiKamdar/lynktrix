<?php

namespace Plugins\Admitad;

use App\Models\Advertiser;

class Deeplink extends Base
{
    public function make(Advertiser $advertiser, $landingURL)
    {
        $trackingURL = explode('?', $advertiser->click_through_url);
        $trackingURL = $trackingURL[0];

        return $trackingURL . "?ulp=" . urlencode($landingURL);
    }
}
