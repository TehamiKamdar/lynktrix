<?php

namespace App\Service\Admin;

use App\Models\Advertiser;
use App\Models\Role;
use App\Models\Website;
use App\Traits\Publisher\ClickGraph;
use App\Traits\Publisher\CommissionGraph;
use App\Traits\Publisher\PerformanceGraph;
use App\Traits\Publisher\SalesGraph;
use App\Traits\Publisher\TransactionGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class DasboardService
{
    use CommissionGraph, TransactionGraph, PerformanceGraph, SalesGraph, ClickGraph;

    public function init(Request $request)
    {
        $user = auth()->user();

        $advertiserData = $this->getNewAdvertisersWithCount($user);
        $accountSummary = $this->getAccountSummary($user, $advertiserData);
//        $topSales = $this->getTopFiveSales($user);
//        $topClicks = $this->getTopFiveClicks($user);
        $earningOverviews = $this->getCommissions($user);
        $performanceOverview = $this->getPerformanceOverview($user);

        $earningOverviewsList = $this->earningOverview($user, $earningOverviews);

        $type = Role::ADMIN_ROLE;
        SEOMeta::setTitle("$type Dashboard");

        $advertisers = $advertiserData['advertisers'] ?? [];
        $earningOverview = $earningOverviewsList ?? [];
        $performanceOverview = $performanceOverview ?? [];
        $accountSummary = $accountSummary ?? [];
        $topSales = [];
        $topClicks = [];

        $url = route("publisher.tools.api-info.index");

        return view('template.admin.dashboard', compact('advertisers', 'accountSummary', 'topSales', 'topClicks', 'earningOverview', 'performanceOverview'));

    }

    private function getNewAdvertisersWithCount($user)
    {
        return Cache::remember("getNewAdvertisersWithCount{$user->id}", 60 * 60, function () use($user) {
            $advertisers = Advertiser::with('advertiser_applies')->select([
                'id',
                'logo',
                'url',
                'commission',
                'commission_type',
                'primary_regions',
                'average_payment_time',
                'sid',
                'name',
            ])->where("status", 1)->orderBy('created_at', 'DESC');
            $count = $advertisers->count();
            $advertisers = $advertisers->take(5)->get();

            return [
                "count" => $count,
                "advertisers" => $advertisers,
            ];
        });
    }

}
