<?php

namespace App\Console\Commands\Global;

use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\DeeplinkTracking;
use Illuminate\Console\Command;

class CheckDeeplinkLandingURL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-deeplink-landing-url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Deeplink Landing URL....';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deepLinks = DeeplinkTracking::where('is_checked', 0)->take(Vars::LIMIT_10)->get();
        foreach ($deepLinks as $deepLink)
        {
            $advertiserApply = AdvertiserApply::with('advertiser')->where('internal_advertiser_id', $deepLink->advertiser_id)->first();
            $advertiser = $advertiserApply->advertiser ?? null;

            if(empty($advertiser))
            {
                $advertiserApply = AdvertiserApply::with('advertiser')->where('id', $deepLink->advertiser_id)->first();
                $advertiser = $advertiserApply->advertiser ?? null;

                if(empty($advertiser))
                {
                    $advertiser = Advertiser::where('id', $deepLink->advertiser_id)->first();

                    if(empty($advertiser))
                    {
                        $advertiser = Advertiser::where('api_advertiser_id', $deepLink->advertiser_id)->first();
                    }
                }
            }

            $this->checkLink($deepLink, $advertiser);
        }
    }

    protected function checkLink($deepLink, $advertiser)
    {
        $deepLinkValue = $link = null;
        if(isset($advertiser->source))
        {
            $url = $deepLink->click_through_url;
            $queryParams = [];
            parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);

            if($advertiser->source == Vars::ADMITAD)
            {
                $deepLinkValue = isset($queryParams['ulp']) ? $queryParams['ulp'] : null;
            }
            elseif($advertiser->source == Vars::AWIN)
            {
                $deepLinkValue = isset($queryParams['ued']) ? $queryParams['ued'] : null;
            }
            elseif($advertiser->source == Vars::CITY_ADS)
            {
                $deepLinkValue = isset($queryParams['url']) ? $queryParams['url'] : null;
            }
            elseif($advertiser->source == Vars::FLEX_OFFERS)
            {
                $deepLinkValue = isset($queryParams['URL']) ? $queryParams['URL'] : (isset($queryParams['url']) ? $queryParams['url'] : null);
            }
            elseif($advertiser->source == Vars::IMPACT_RADIUS)
            {
                $deepLinkValue = isset($queryParams['DeepLink']) ? $queryParams['DeepLink'] : null;
            }
            elseif($advertiser->source == Vars::LINKCONNECTOR)
            {
                $deepLinkValue = isset($queryParams['url']) ? $queryParams['url'] : null;
            }
            elseif($advertiser->source == Vars::MOONROVER)
            {
                $deepLinkValue = isset($queryParams['path']) ? $queryParams['path'] : null;
            }
            elseif($advertiser->source == Vars::PARTNERMATIC)
            {
                $deepLinkValue = isset($queryParams['url']) ? $queryParams['url'] : null;
            }
            elseif($advertiser->source == Vars::PARTNERIZE)
            {
                $path = parse_url($url, PHP_URL_PATH);
                $parts = explode("/destination:", $path);
                $deepLinkValue = isset($parts[1]) ? $parts[1] : null;
            }
            elseif($advertiser->source == Vars::PEPPERJAM)
            {
                $deepLinkValue = isset($queryParams['url']) ? $queryParams['url'] : null;
            }
            elseif($advertiser->source == Vars::RAKUTEN)
            {
                $deepLinkValue = isset($queryParams['murl']) ? $queryParams['murl'] : null;
            }
            elseif($advertiser->source == Vars::TAKEADS)
            {
                $deepLinkValue = isset($queryParams['url']) ? $queryParams['url'] : null;
            }
            elseif($advertiser->source == Vars::TRADEDOUBLER)
            {
                $deepLinkValue = isset($queryParams['url']) ? $queryParams['url'] : null;
            }

        }

        $data = [
            'is_checked' => 1
        ];

        if(empty($deepLinkValue))
        {
            $data['click_through_url'] = null;
        }

        $deepLink->update($data);

    }
}
