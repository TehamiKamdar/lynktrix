<?php

namespace App\Service\Publisher;

use App\Models\Advertiser;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Website;
use App\Traits\Publisher\ClickGraph;
use App\Traits\Publisher\CommissionGraph;
use App\Traits\Publisher\PerformanceGraph;
use App\Traits\Publisher\SalesGraph;
use App\Traits\Publisher\TransactionGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DasboardService
{
    use CommissionGraph, TransactionGraph, PerformanceGraph, SalesGraph, ClickGraph;

    public function init(Request $request)
    {
        $user = auth()->user();

        $websites = Website::withAndWhereHas('users', function($query) use($user) {
            return $query->where("id", $user->id);
        })->where("status", Website::ACTIVE)->count();

        $url = route("publisher.profile.websites.index");

        if($websites == 0)
            Session::put("error", "Please go to <a href='{$url}'>website settings</a> and verify your site to view Account Summary.");

        if($user->status == "active" && $websites) {

            $advertiserData = $this->getNewAdvertisersWithCount($user);
            $accountSummary = $this->getAccountSummary($user, $advertiserData);
            $topSales = $this->getTopFiveSales($user);
            $topClicks = $this->getTopFiveClicks($user);
            $earningOverviews = $this->getCommissions($user);
            
            $performanceOverview = $this->getPerformanceOverview($user);

            $earningOverviewsList = $this->earningOverview($user, $earningOverviews);
 
        }

        $type = Role::PUBLISHER_ROLE;
        SEOMeta::setTitle("$type Dashboard");

        $advertisers = $advertiserData['advertisers'] ?? [];
        $earningOverview = $earningOverviewsList ?? [];
        $performanceOverview = $performanceOverview ?? [];
        $accountSummary = $accountSummary ?? [];
        $topSales = $topSales ?? [];
        $topClicks = $topClicks ?? [];

        ksort($accountSummary);

        $setting = Setting::where("key", "notification")->first();

        if(isset($setting->id) && $setting->value)
        {
            Session::put("notify-warning", $setting->value);
        }

        return view('template.publisher.dashboard.index', compact('advertisers', 'accountSummary', 'topSales', 'topClicks', 'earningOverview', 'performanceOverview'));

    }

    private function getNewAdvertisersWithCount($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;
       

            $advertisers = DB::table('advertiser_applies')
                                ->join('advertisers', 'advertisers.id', '=', 'advertiser_applies.internal_advertiser_id')
                                ->select([
                                    'advertisers.id',
                                    'advertisers.logo',
                                    'advertisers.url',
                                    'advertisers.commission',
                                    'advertisers.commission_type',
                                    'advertisers.primary_regions',
                                    'advertisers.average_payment_time',
                                    'advertisers.sid',
                                    'advertisers.name',
                                ])
                ->where("advertiser_applies.publisher_id", $userID)
                ->where("advertiser_applies.website_id", $websiteID)
                ->where("advertisers.status", 1)
                ->orderBy('advertisers.created_at', 'DESC');

            $advertisers = $advertisers->take(5)->get();

            $count = Advertiser::select('id')->where('is_active', Advertiser::AVAILABLE)->count();

            return [
                "count" => $count,
                "advertisers" => $advertisers,
            ];
       
    }

}
