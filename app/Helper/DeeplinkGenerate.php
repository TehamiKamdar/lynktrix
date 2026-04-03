<?php

namespace App\Helper;

use App\Helper\Static\Vars;
use App\Traits\RequestTrait;
use App\Models\Advertiser;
use Illuminate\Support\Facades\Log;

class DeeplinkGenerate
{
    use RequestTrait;

    public function generate($advertiser, $publisherID, $websiteID, $subID, $landingURL)
    {
        $link = null;
        
        if(isset($advertiser->source))
        {

            if($advertiser->source == Vars::ADMITAD)
            {
                $landingURL = urlencode($landingURL);
                $url = strtok($advertiser->click_through_url, '?');
                $link = "{$url}?ulp={$landingURL}&subid={$publisherID}&subid1={$publisherID}&subid2={$websiteID}";
                if($subID)
                    $link = "{$link}&subid3={$subID}";
            }
            elseif($advertiser->source == Vars::AWIN)
            {
                $campaign = urlencode($advertiser->name);
                $landingURL = urlencode($landingURL);
                $subID = empty($subID) ? '' : $subID;
                $link = "{$advertiser->click_through_url}&campaign={$campaign}&clickref={$publisherID}&clickref2={$websiteID}&clickref3={$subID}&clickref4=&clickref5=&clickref6=&ued={$landingURL}&platform=pl";
            }
            elseif($advertiser->source == Vars::CITY_ADS)
            {
                $link = "{$advertiser->click_through_url}&sa={$publisherID}&sa2={$websiteID}&sa3={$subID}&url={$landingURL}";
            }
            elseif($advertiser->source == Vars::FLEX_OFFERS)
            {
                $landingURL = urlencode($landingURL);
                $link = "{$advertiser->click_through_url}&URL={$landingURL}&fobs={$publisherID}&fobs2={$websiteID}&fobs3={$subID}";
            }
            elseif($advertiser->source == Vars::IMPACT_RADIUS)
            {
                $landingURL = urlencode($landingURL);
                $subID = empty($subID) ? '' : $subID;
                $link = "{$advertiser->click_through_url}?DeepLink={$landingURL}&subId1={$publisherID}&subId2={$websiteID}&subId3={$subID}";
            }
            elseif($advertiser->source == Vars::LINKCONNECTOR)
            {
                $s = $subID;
                if(empty($s))
                {
                    $s = $websiteID;
                }
                $landingURL = urlencode($landingURL);
                $link = "{$advertiser->click_through_url}&url={$landingURL}&atid={$s}";
            }
            elseif($advertiser->source == Vars::MOONROVER)
            {
                $link = "{$advertiser->click_through_url}&sub1={$publisherID}&sub2={$websiteID}";
                if($subID)
                    $link .= "&sub3={$subID}";
                $link .= "&path={$landingURL}";
            }
            elseif($advertiser->source == Vars::PAID_ON_RESULT)
            {
                $sid = $subID;
                if(empty($sid))
                {
                    $sid = $websiteID;
                }
                $updatedUrl = rtrim($advertiser->click_through_url, '0/');
                $parsedUrl = parse_url($landingURL, PHP_URL_PATH);

                $link = "{$updatedUrl}/{$sid}/{$parsedUrl}";
            }
            elseif($advertiser->source == Vars::PARTNERMATIC)
            {
                $landingURL = urlencode($landingURL);

                $link = "{$advertiser->click_through_url}&url={$landingURL}&uid={$publisherID}&uid2={$websiteID}";
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

                $link = "{$link}/destination:{$landingURL}";
            }
            elseif($advertiser->source == Vars::PEPPERJAM)
            {
                $sid = $subID;
                if(empty($sid))
                {
                    $sid = $websiteID;
                }
                $landingURL = urlencode($landingURL);
                $link = "{$advertiser->click_through_url}?sid={$sid}&url={$landingURL}";

            }
            elseif($advertiser->source == Vars::RAKUTEN)
            {
                $u1 = $subID;
                if(empty($u1))
                {
                    $u1 = $websiteID;
                }
                $url = $advertiser->click_through_url;
                $parseURL = parse_url($url, PHP_URL_QUERY);
                $queryParams = [];
                parse_str($parseURL, $queryParams);

                if(isset($queryParams['id']))
                {
                    $id = $queryParams['id'];
                    $mid = $advertiser->advertiser_id;
                    $link = "https://click.linksynergy.com/deeplink?id={$id}&mid={$mid}&murl={$landingURL}&u1={$u1}";
                }
                else
                {
                    Log::error("RAKUTEN URL ID NOT FOUND {$url}");
                    Log::error(print_r($queryParams, true));
                }
            }
            elseif($advertiser->source == Vars::TAKEADS)
            {
                $s = $subID;
                if(empty($s))
                {
                    $s = $websiteID;
                }
                $landingURL = urlencode($landingURL);
                $link = "{$advertiser->click_through_url}?url={$landingURL}&s={$s}";
            }
            elseif($advertiser->source == Vars::TRADEDOUBLER)
            {
                $epi = $subID;
                if(empty($epi))
                {
                    $epi = $publisherID;
                }
                $landingURL = urlencode($landingURL);
                $link = "{$advertiser->click_through_url}&epi={$epi}&epi2={$websiteID}&url={$landingURL}";
            }
             elseif($advertiser->source == Vars::WEBGAINS)
            {
               
                    $epi = $publisherID;
                
                $link = "{$advertiser->click_through_url}&clickref={$epi}&param1={$websiteID}&wgtarget={$landingURL}";
            }
            elseif($advertiser->source == Vars::FATCOUPON)
            {
               
                  
    $epi = $publisherID;
    $baseUrl = $advertiser->click_through_url;
    $landing = $landingURL;

    // Parse URL
    $parsed = parse_url($baseUrl);
    parse_str($parsed['query'] ?? '', $query);

    // Update or add parameters
    $query['url'] = $landing;
    $query['subId1'] = $epi;
    $query['subId2'] = $websiteID;
    $query['subId3'] = $subID;

    // Rebuild query string
    $newQuery = http_build_query($query);

    // Rebuild full URL
    $link =
        (isset($parsed['scheme']) ? "{$parsed['scheme']}://" : '') .
        ($parsed['host'] ?? '') .
        ($parsed['path'] ?? '') .
        '?' . $newQuery;
            }
        }
        return $link;
    }

    public function oldGenerate($advertiser, $publisherID, $websiteID, $subID, $landingURL)
    {
        $link = null;
        if($advertiser->source == Vars::ADMITAD)
        {
            $configs = $this->getAdmitadConfigData();
            $wID = $configs["ad_space_id"];
            $data = $this->sendAdmitadDeepLinkRequest($advertiser->advertiser_id, $wID, $landingURL, $publisherID, $websiteID, $subID);
            $link = $data[0] ?? null;
        }
        elseif($advertiser->source == Vars::AWIN)
        {
            $data = $this->sendAwinLinkRequest($advertiser->advertiser_id, $landingURL, $advertiser->name, $publisherID, $websiteID, $subID);
            $link = $data['url'] ?? null;

            if(empty($link))
            {
                $campaign = urlencode($advertiser->name);
                $landingURL = urlencode($landingURL);
                $subID = empty($subID) ? '' : $subID;
                $link = "{$advertiser->click_through_url}&campaign={$campaign}&clickref={$publisherID}&clickref2={$websiteID}&clickref3={$subID}&clickref4=&clickref5=&clickref6=&ued={$landingURL}&platform=pl";
            }
        }
        elseif($advertiser->source == Vars::CITY_ADS)
        {
            $link = "{$advertiser->click_through_url}&sa={$publisherID}&sa2={$websiteID}&sa3={$subID}&url={$landingURL}";
        }
        elseif($advertiser->source == Vars::IMPACT_RADIUS)
        {
            $landingURL = urlencode($landingURL);
            $data = $this->sendImpactRadiusLinkRequest($advertiser->advertiser_id, $publisherID, $websiteID, $subID, $landingURL);
            $link = $data['TrackingURL'] ?? null;
            $subID = empty($subID) ? '' : $subID;
            if(empty($link))
            {
                $link = "{$advertiser->click_through_url}?DeepLink=$link&subId1={$publisherID}&subId2={$websiteID}&subId3={$subID}";
            }
        }
        elseif($advertiser->source == Vars::RAKUTEN)
        {
            $u1 = $subID;
            if(empty($u1))
            {
                $u1 = $websiteID;
            }
            $body = [
                "url" => $landingURL,
                "advertiser_id" => $advertiser->advertiser_id,
                "u1" => $u1
            ];
            $data = $this->sendRakutenGetDeepLinkByAdvertiserIDRequest($body);
            $link = $data['advertiser']['deep_link']['deep_link_url'] ?? null;
            if(empty($link))
            {
                $url = $advertiser->click_through_url;
                $parseURL = parse_url($url, PHP_URL_QUERY);
                $queryParams = [];
                parse_str($parseURL, $queryParams);

                $id = $queryParams['id'];
                $mid = $advertiser->advertiser_id;
                $link = "https://click.linksynergy.com/deeplink?id={$id}&mid={$mid}&murl={$landingURL}&u1={$u1}";
            }
        }
        elseif($advertiser->source == Vars::TRADEDOUBLER)
        {
            $epi = $subID;
            if(empty($epi))
            {
                $epi = $publisherID;
            }
            $landingURL = urlencode($landingURL);
            $link = "{$advertiser->click_through_url}&epi={$epi}&epi2={$websiteID}&url={$landingURL}";
        }

        return $link;
    }
}
