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
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class OwnService extends BaseController
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
            $section = $request->section;

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

            if($website->status == Website::ACTIVE) {

                $advertisers = Advertiser::
                                select([
                                    'advertisers.id',
                                    'advertisers.sid',
                                    'advertisers.logo',
                                    'advertisers.name',
                                    'advertisers.url',
                                    'advertisers.primary_regions',
                                    'advertisers.average_payment_time',
                                    'advertisers.commission',
                                    'advertisers.commission_type',
                                    'advertiser_applies.status as advertiser_applies_status'
                                ])
                                ->join("advertiser_applies", "advertiser_applies.internal_advertiser_id", "advertisers.id");

                if($section == AdvertiserApply::STATUS_ACTIVE)
                    $advertisers->where('advertiser_applies.status', AdvertiserApply::STATUS_ACTIVE)->where('advertiser_applies.publisher_id', $user->id)->where("advertisers.status", 1);
                elseif($section == AdvertiserApply::STATUS_REJECTED)
                    $advertisers->where('advertiser_applies.status', AdvertiserApply::STATUS_REJECTED)->where('advertiser_applies.publisher_id', $user->id);
                elseif($section == AdvertiserApply::STATUS_HOLD)
                    $advertisers->whereIn('advertiser_applies.status', [AdvertiserApply::STATUS_HOLD, AdvertiserApply::STATUS_ADMITAD_HOLD])->where('advertiser_applies.publisher_id', $user->id);
                else
                    $advertisers->where('advertiser_applies.status', AdvertiserApply::STATUS_ACTIVE)->where('advertiser_applies.publisher_id', $user->id)->where('advertiser_applies.website_id', $user->active_website_id)->where("advertisers.status", 1);

                if($request->search_by_name)
                    $advertisers = $advertisers->where("advertisers.name", "LIKE", "%$request->search_by_name%");

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

                $advertisers = $advertisers->groupBy('advertisers.name')->orderBy('advertisers.name', 'ASC')->paginate($limit);

                $total = $advertisers->total();

            } else {

                $message = $this->websiteElseMsg($website);
                $type = "error";
                $advertisers = [];
                $total = 0;

            }

            if($request->ajax()) {
                $countries = [];
                $categories = [];
                $methods = [];
            } else {
                $countries = Country::where('iso2', '!=', '')->orderBy("name", "ASC")->get()->toArray();
                $loadMix = new Mix();
                $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
                $methods = $loadMix->select("id", "name")->where("type", Mix::PROMOTIONAL_METHOD)->groupBy('name')->orderBy("name", "ASC")->get()->toArray();
            }

            if($request->ajax()) {
                $returnView = null;
                if($view == Vars::PUBLISHER_ADVERTISER_LIST_VIEW) {
                    $returnView = view("template.publisher.advertisers.advertiser-list", compact('advertisers'))->render();
                } elseif ($view == Vars::PUBLISHER_ADVERTISER_BOX_VIEW) {
                    $returnView = view("template.publisher.advertisers.advertiser-grid", compact('advertisers'))->render();
                }
                return response()->json(['total' => $total, 'html' => $returnView]);
            }

            if($type && $message)
                Session::put($type, $message);

//            $advertiserType = [];
//            if($request->type == "third_party_advertiser")
//            {
//                $advertiserType = new Advertiser();
//                $advertiserType = $advertiserType->selectRaw('sid, source as advertiser, count(source) as total_advertisers')->where("status", true)->where("type", "api")->groupBy("source")->get()->toArray();
//            }

            return view("template.publisher.advertisers.find", compact('advertisers', 'view', 'countries', 'categories', 'methods', 'total'));

        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
