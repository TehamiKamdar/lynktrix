<?php

namespace App\Helper;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Traits\RequestTrait;

class LinkGenerate
{
    use RequestTrait;

    public function generate($advertiser, $publisherID, $websiteID, $subID = null)
    {
        $link = null;
      
        if($advertiser->source == Vars::ADMITAD)
        {
            $link = $advertiser->click_through_url;

            if(str_contains($link, "?"))
                $link = "{$link}&";
            else
                $link = "{$link}?";

            $link = "{$link}subid={$publisherID}&subid1={$publisherID}&subid2={$websiteID}";

            if($link && $subID)
            {
                $link = "{$link}&subid3={$subID}";
            }
        }
        elseif($advertiser->source == Vars::AWIN)
        {
            if(isset($advertiser->name)){
                $campaign = urlencode($advertiser->name);
            }else{
                 $campaign = null;
            }
           
            $subID = empty($subID) ? '' : $subID;
            $link = "{$advertiser->click_through_url}&campaign={$campaign}&clickref={$publisherID}&clickref2={$websiteID}&clickref3={$subID}&clickref4=&clickref5=&clickref6=&platform=pl";
        }
        elseif($advertiser->source == Vars::CITY_ADS)
        {
            $link = "{$advertiser->click_through_url}&sa={$publisherID}&sa2={$websiteID}&sa3={$subID}";
        }
        elseif($advertiser->source == Vars::FLEX_OFFERS)
        {
            $link = "{$advertiser->click_through_url}&fobs={$publisherID}&fobs2={$websiteID}&fobs3={$subID}";
        }
        elseif($advertiser->source == Vars::IMPACT_RADIUS)
        {
            $subID = empty($subID) ? '' : $subID;
            $link = "{$advertiser->click_through_url}?subId1={$publisherID}&subId2={$websiteID}&subId3={$subID}";
        }
        elseif($advertiser->source == Vars::LINKCONNECTOR)
        {
            $s = $subID;
            if(empty($s))
            {
                $s = $websiteID;
            }
            $link = "{$advertiser->click_through_url}&atid={$s}";
        }
        elseif($advertiser->source == Vars::MOONROVER)
        {
            $link = "{$advertiser->click_through_url}&sub1={$publisherID}&sub2={$websiteID}";
            if($subID)
                $link .= "&sub3={$subID}";
        }
        elseif($advertiser->source == Vars::PAID_ON_RESULT)
        {

            $sid = $subID;
            if(empty($sid))
            {
                $sid = $websiteID;
            }
            $updatedUrl = rtrim($advertiser->click_through_url, '0/');
            $link = "{$updatedUrl}/{$sid}";

        }
        elseif($advertiser->source == Vars::PARTNERMATIC)
        {
            $link = "{$advertiser->click_through_url}&uid={$publisherID}&uid2={$websiteID}";
            if($subID)
                $link .= "&uid3={$subID}";
        }
        elseif($advertiser->source == Vars::PARTNERIZE)
        {
            $link = "{$advertiser->click_through_url}/subid1:{$publisherID}/subid2:{$websiteID}";

            if(!empty($subID))
            {
                $link = "{$link}/subid3:{$subID}";
            }
        }
        elseif($advertiser->source == Vars::PEPPERJAM)
        {
            $sid = $subID;
            if(empty($sid))
            {
                $sid = $websiteID;
            }

            $link = "{$advertiser->click_through_url}?sid={$sid}";

        }
        elseif($advertiser->source == Vars::BLUEAFF)
        {
            $sid = $subID;
            if(empty($sid))
            {
                $sid = $websiteID;
            }

            $link = "{$advertiser->click_through_url}?sub1={$publisherID}&sub2={$websiteID}";

        }
        elseif($advertiser->source == Vars::LINKBUX)
        {
            $sid = $subID;
            if(empty($sid))
            {
                $sid = $websiteID;
            }

            $link = "{$advertiser->click_through_url}&uid={$publisherID}&uid2={$websiteID}";

        }
        elseif($advertiser->source == Vars::UPPROMOTE)
        {
            $sid = $subID;
            if(empty($sid))
            {
                $sid = $websiteID;
            }

            $link = "{$advertiser->click_through_url}?sub_id1={$publisherID}&sub_id2={$websiteID}";

        }
        elseif($advertiser->source == Vars::RAKUTEN)
        {
            $url = $advertiser->click_through_url;
            $u1 = $subID;
            if(empty($u1))
            {
                $u1 = $websiteID;
            }
            if(str_contains($url, "subid")) {
                $link = str_replace("subid=0", "subid={$u1}&u1={$u1}", $url);
            }
            else {
                $link = "{$url}&subid={$u1}&u1={$u1}";
            }
        }
        elseif($advertiser->source == Vars::TAKEADS)
        {
            $s = $subID;
            if(empty($s))
            {
                $s = $websiteID;
            }
            $link = "{$advertiser->click_through_url}?s={$s}";
        }
        elseif($advertiser->source == Vars::TRADEDOUBLER)
        {
            $epi = $subID;
            if(empty($epi))
            {
                $epi = $publisherID;
            }
            $link = "{$advertiser->click_through_url}&epi={$epi}&epi2={$websiteID}";
        }
        elseif($advertiser->source == Vars::WEBGAINS)
            {
               
                    $epi = $publisherID;
                
                $link = "{$advertiser->click_through_url}&clickref={$epi}&param1={$websiteID}";
            }
            elseif($advertiser->source == Vars::FATCOUPON)
            {
               
                    $epi = $publisherID;
                
                $link = "{$advertiser->click_through_url}&subId1={$epi}&subId2={$websiteID}";
            }
        return $link;
    }

    public function oldGenerate($advertiser, $publisherID, $websiteID, $subID = null)
    {
        $link = null;
        if($advertiser->source == Vars::ADMITAD)
        {
            $link = $advertiser->click_through_url;

            if(str_contains($link, "?"))
                $link = "{$link}&";
            else
                $link = "{$link}?";

            $link = "{$link}subid={$publisherID}&subid1={$publisherID}&subid2={$websiteID}";

            if($link && $subID)
            {
                $link = "{$link}&subid3={$subID}";
            }
        }
        elseif($advertiser->source == Vars::AWIN)
        {
            $destinationURL = $advertiser->url;
            $data = $this->sendAwinLinkRequest($advertiser->advertiser_id, $destinationURL, $advertiser->name, $publisherID, $websiteID, $subID);
            $link = $data['url'] ?? null;

            if(empty($link))
            {
                $campaign = urlencode($advertiser->name);
                $destinationURL = urlencode($destinationURL);
                $subID = empty($subID) ? '' : $subID;
                $link = "{$advertiser->click_through_url}&campaign={$campaign}&clickref={$publisherID}&clickref2={$websiteID}&clickref3={$subID}&clickref4=&clickref5=&clickref6=&ued={$destinationURL}&platform=pl";
                Methods::customLinkGenerate("AWIN MANUAL GENERATE LINK", "LINK: {$link}");
            }
            else
            {
                Methods::customLinkGenerate("AWIN AUTOMATE GENERATE LINK", "LINK: {$link}");
            }

        }
        elseif($advertiser->source == Vars::IMPACT_RADIUS)
        {
            $data = $this->sendImpactRadiusLinkRequest($advertiser->advertiser_id, $publisherID, $websiteID, $subID);
            $link = $data['TrackingURL'] ?? null;

            if(empty($link))
            {
                $subID = empty($subID) ? '' : $subID;
                $link = "{$advertiser->click_through_url}?subId1={$publisherID}&subId2={$websiteID}&subId3={$subID}";
                Methods::customLinkGenerate("IMPACT RADIUS MANUAL GENERATE LINK", "LINK: {$link}");
            }
            else
            {
                Methods::customLinkGenerate("IMPACT RADIUS AUTOMATE GENERATE LINK", "LINK: {$link}");
            }
        }
        elseif($advertiser->source == Vars::RAKUTEN)
        {
            $url = $advertiser->click_through_url;
            $u1 = $subID;
            if(empty($u1))
            {
                $u1 = $websiteID;
            }
            if(str_contains($url, "subid")) {
                $link = str_replace("subid=0", "subid={$u1}&u1={$u1}", $url);
            }
            else {
                $link = "{$url}&subid={$u1}&u1={$u1}";
            }
            Methods::customLinkGenerate("RAKUTEN MANUAL GENERATE LINK", "LINK: {$link}");
        }
        elseif($advertiser->source == Vars::TRADEDOUBLER)
        {
            $epi = $subID;
            if(empty($epi))
            {
                $epi = $publisherID;
            }
            $link = "{$advertiser->click_through_url}&epi={$epi}&epi2={$websiteID}";
            Methods::customLinkGenerate("TRADEDOUBLER MANUAL GENERATE LINK", "LINK: {$link}");
        }

        if(empty($link)) {
            $link = $advertiser->click_through_url;
            Methods::customLinkGenerate("MANUAL GENERATE LINK", "LINK: {$link}");
        }

        return $link;
    }
}
