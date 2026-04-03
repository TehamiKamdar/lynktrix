<?php
namespace App\Helper;

use App\Helper\Static\Vars;
use App\Models\Website;
use App\Traits\RequestTrait;

class CouponLinkGenerate
{
    use RequestTrait;

    public function generate($source, $publisherID, $websiteID, $link = null)
    {
        $query = null;

        if ($source == Vars::ADMITAD) {
            // $configs = $this->getAdmitadConfigData();
            // $wID = $configs["ad_space_id"];
            // $data = $this->sendAdmitadCouponLinkRequest($link->id, $wID);
            // $query = $data['goto_link'] ?? null;
            $query = null;
        } elseif ($source == Vars::AWIN) {
            $query = "clickref={$publisherID}&clickref2={$websiteID}&clickref3=&clickref4=&clickref5=&clickref6=&platform=pl";
        } elseif ($source == Vars::IMPACT_RADIUS) {
            $query = "subId1={$publisherID}&subId2={$websiteID}";
        } elseif ($source == Vars::RAKUTEN) {
            if (str_contains($link, "subid")) {
                $query = str_replace("subid=0", "subid={$websiteID}&u1={$websiteID}", $link);
            } else {
                $query = "subid={$websiteID}&u1={$websiteID}";
            }
        }

        if ($query && !($source == Vars::ADMITAD)) {
            if (str_contains($link, "?")) {
                $link = "{$link}&{$query}";
            } else {
                $link = "{$link}?{$query}";
            }
        }

        return $link;
    }
}
