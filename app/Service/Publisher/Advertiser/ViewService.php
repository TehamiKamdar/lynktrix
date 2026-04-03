<?php

namespace App\Service\Publisher\Advertiser;

use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class ViewService
{
    /**
     * @param $sid
     * @return Application|Factory|View|RedirectResponse
     */
    public function init($sid): Application|Factory|View|RedirectResponse
    {
        try {
            $advertiser = Advertiser::whereSid($sid)->where('is_active',1)->first();
            abort_if(empty($advertiser), 404);
            if(isset($advertiser->advertiser_applies->status))
            {
                if($advertiser->advertiser_applies->status == AdvertiserApply::STATUS_HOLD)
                {
                    Session::put("error", "This advertiser is currently Hold. Please contact the support team of LinksCircle to better understand the issue.");
                }
                if($advertiser->advertiser_applies->status == AdvertiserApply::STATUS_REJECTED)
                {
                    Session::put("error", "This advertiser is currently Rejected. Please contact the support team of LinksCircle to better understand the issue.");
                }
            }
            $url = parse_url($advertiser->url);
            if(isset($url['scheme']) && isset($url['host']))
                $url = $url['scheme'] . "://" . $url['host'] . "/";
            else
                $url = $advertiser->url;

            $url = Str::limit($url, 60, $end='...');

            $href = route("redirect.url") . "?url=" . urlencode($url);
            $url = new HtmlString("<a href='{$href}'>{$url}</a>");

            return view("template.publisher.advertisers.detail", compact('advertiser', 'url', 'href'));
        } catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
