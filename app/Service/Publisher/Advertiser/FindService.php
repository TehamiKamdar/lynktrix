<?php

namespace App\Service\Publisher\Advertiser;

use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\Country;
use App\Models\Mix;
use App\Models\Website;
use App\Service\Publisher\BaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class FindService extends BaseController
{
    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse|JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function init(Request $request): Application|Factory|View|RedirectResponse|JsonResponse
    {
        try
        {
            $limit = Vars::DEFAULT_PUBLISHER_ADVERTISER_PAGINATION;
            $view = Vars::PUBLISHER_ADVERTISER_LIST_VIEW;
            if(session()->has('publisher_advertiser_limit')) {
                $limit = session()->get('publisher_advertiser_limit');
            }
            if(session()->has('publisher_advertiser_view')) {
                $view = session()->get('publisher_advertiser_view');
            }

            $user = auth()->user();
            $website = Website::where('id', $user->active_website_id)->first();

            $message = $type = null;

            if($website->status != Website::ACTIVE) {
                $message = $this->websiteElseMsg($website);
                $type = "error";
                $advertisers = [];
                $total = 0;
            }

            if($type && $message)
                Session::put($type, $message);


            if($request->ajax()) {
                $countries = [];
                $categories = [];
                $methods = [];

                $section = null;
                if($request->section) {
                    $section = $request->section;
                }

                $advertisers = new Advertiser();
                if(empty($section) || in_array($section, [AdvertiserApply::STATUS_NEW, $section == AdvertiserApply::STATUS_NOT_ACTIVE]))
                {
                    $advertisers = $advertisers::where('is_active',1)->where('is_show',1)->select([
                        'advertisers.id',
                        'advertisers.advertiser_id',
                        'advertisers.sid',
                        'advertisers.logo',
                        'advertisers.fetch_logo_url',
                        'advertisers.is_fetchable_logo',
                        'advertisers.name',
                        'advertisers.url',
                        'advertisers.source',
                        'advertisers.primary_regions',
                        'advertisers.average_payment_time',
                        'advertisers.commission',
                        'advertisers.commission_type',
                    ])
                    ->with(['advertiser_applies' => function ($apply) {
                        $apply->select(['status', 'internal_advertiser_id'])->where('publisher_id', auth()->user()->id);
                    }]);
                }

                if(!empty($section)) {

                    if(!in_array($section, [AdvertiserApply::STATUS_NEW, AdvertiserApply::STATUS_NOT_ACTIVE]))
                    {
                        $advertisers = $advertisers->
                                                    select([
                                                        'advertisers.id',
                                                        'advertisers.advertiser_id',
                                                        'advertisers.sid',
                                                        'advertisers.logo',
                                                        'advertisers.is_active',
                                                        'advertisers.is_show',
                                                        'advertisers.name',
                                                        'advertisers.fetch_logo_url',
                                                        'advertisers.is_fetchable_logo',
                                                        'advertisers.url',
                                                        'advertisers.source',
                                                        'advertisers.primary_regions',
                                                        'advertisers.average_payment_time',
                                                        'advertisers.commission',
                                                        'advertisers.commission_type',
                                                        'advertiser_applies.status as advertiser_applies_status'
                                                        ])
                                                        ->join("advertiser_applies", "advertiser_applies.internal_advertiser_id", "advertisers.id");

                        $advertisers->where('advertiser_applies.publisher_id', auth()->user()->id)->where('advertiser_applies.website_id', auth()->user()->active_website_id)->where('advertisers.is_active', 1)->where('advertisers.is_show',1);
                    }
                    if($section == AdvertiserApply::STATUS_NOT_ACTIVE) {
                        $advertisers = $advertisers->doesntHave('advertiser_applies')->where('advertisers.is_active', 1)->where('advertisers.is_show', 1);
                    }
                    elseif($section == AdvertiserApply::STATUS_NEW) {
                        $advertisers = $advertisers->doesntHave('advertiser_applies')->where('advertisers.is_active', 1)->where('advertisers.is_show',1)->whereBetween("advertisers.created_at", [now()->subDays(15)->format("Y-m-d"), now()->addDay()->format("Y-m-d")]);
                    }
                    elseif ($section == AdvertiserApply::STATUS_ACTIVE) {
                        $advertisers->where('advertiser_applies.status', AdvertiserApply::STATUS_ACTIVE);
                    }
                    elseif ($section == AdvertiserApply::STATUS_PENDING) {
                        $advertisers->where('advertiser_applies.status', AdvertiserApply::STATUS_PENDING);
                    }
                    elseif ($section == AdvertiserApply::STATUS_REJECTED) {
                        $advertisers->where('advertiser_applies.status', AdvertiserApply::STATUS_REJECTED);
                    }
                    elseif ($section == AdvertiserApply::STATUS_HOLD) {
                        $advertisers->where('advertiser_applies.status', [AdvertiserApply::STATUS_HOLD, AdvertiserApply::STATUS_ADMITAD_HOLD]);
                    }

                    if(($section == AdvertiserApply::STATUS_REJECTED || $section == AdvertiserApply::STATUS_HOLD || $section == AdvertiserApply::STATUS_ADMITAD_HOLD)) {
                        $advertisers = $advertisers->where(function($query) {
                            $query->where('advertisers.is_active', true)->orWhere('advertisers.is_active', false);
                        });
                    }
                }
                else {
                    $advertisers = $advertisers->where("advertisers.is_active", true)->where('advertisers.is_show',1);
                }


                $search = $request->search_by_name;

                if($search)
                    $advertisers = $advertisers->where(function($query) use ($search) {
                        $query->orWhere('advertisers.name','LIKE',"%{$search}%")
                            ->orWhere('advertisers.url','LIKE',"%{$search}%");
                    });;

                if($request->search_by_country)
                {
                    if(strpos($request->search_by_country, ',') !== false)
                    {
                        $advertisers->where(function ($query) use ($request) {
                            $countries = explode(',', $request->search_by_country);
                            foreach ($countries as $country)
                            {
                                $query->orWhere("advertisers.primary_regions", "LIKE", "%$country%");
                            }
                        });
                    }
                    else {
                        $advertisers = $advertisers->where("advertisers.primary_regions", "LIKE", "%$request->search_by_country%");
                    }
                }

                if($request->search_by_promotional_method)
                {
                    if(strpos($request->search_by_promotional_method, ',') !== false)
                    {
                        $advertisers->where(function ($query) use ($request) {
                            $methods = explode(',', $request->search_by_promotional_method);
                            foreach ($methods as $method)
                            {
                                $query->orWhere("advertisers.promotional_methods", "LIKE", "%$method%");
                            }
                        });
                    }
                    else {
                        $advertisers = $advertisers->where("advertisers.promotional_methods", "LIKE", "%$request->search_by_promotional_method%");
                    }
                }

                if($request->search_by_category)
                {
                    if(strpos($request->search_by_category, ',') !== false)
                    {
                        $advertisers->where(function ($query) use ($request) {
                            $categories = explode(',', $request->search_by_category);
                            foreach ($categories as $category)
                            {
                                $query->orWhere("advertisers.categories", "LIKE", "%$category%");
                            }
                        });
                    }
                    else {
                        $advertisers = $advertisers->where("advertisers.categories", "LIKE", "%$request->search_by_category%");
                    }
                }

                if($request->type)
                {
                    $type = $request->type;
                    if($type == "third_party_advertiser")
                    {
//                        $sources = str_contains($request->source, ',') ? explode(',', $request->source) : [$request->source];
                        $advertisers = $advertisers->where("advertisers.type", "api");
//                            ->whereIn("source", $sources);
                    }
                    elseif($type == "managed_by_linksCircle")
                    {
                        $advertisers = $advertisers->where("advertisers.type", "manual");
                    }
                }
                $advertisers=  $advertisers->where('advertisers.is_active',1)->where('advertisers.is_show',1);
               $total = $advertisers->count();

                $advertisers = $advertisers->groupBy(['advertisers.name', 'advertisers.source'])->orderBy('advertisers.name', 'ASC')->paginate($limit);


                $returnView = null;
                if($view == Vars::PUBLISHER_ADVERTISER_LIST_VIEW) {
                    $returnView = view("template.publisher.advertisers.advertiser-list", compact('advertisers'))->render();
                } elseif ($view == Vars::PUBLISHER_ADVERTISER_BOX_VIEW) {
                    $returnView = view("template.publisher.advertisers.advertiser-grid", compact('advertisers'))->render();
                }
                return response()->json(['total' => $total, 'html' => $returnView]);
            } else {
                $countries = Country::where('iso2', '!=', '')->orderBy("name", "ASC")->get()->toArray();
                $loadMix = new Mix();
                $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
                $methods = $loadMix->select("id", "name")->where("type", Mix::PROMOTIONAL_METHOD)->groupBy('name')->orderBy("name", "ASC")->get()->toArray();
            }

//            $advertiserType = [];
//            if($request->type == "third_party_advertiser")
//            {
//                $advertiserType = new Advertiser();
//                $advertiserType = $advertiserType->selectRaw('sid, source as advertiser, count(source) as total_advertisers')->where("status", true)->where("type", "api")->groupBy("source")->get()->toArray();
//            }

            return view("template.publisher.advertisers.find", compact('view', 'countries', 'categories', 'methods'));
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
