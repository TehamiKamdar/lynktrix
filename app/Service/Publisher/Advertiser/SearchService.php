<?php

namespace App\Service\Publisher\Advertiser;

use App\Helper\Static\Vars;
use App\Models\Advertiser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SearchService
{
    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function init(Request $request): Application|Factory|View|RedirectResponse
    {
        try
        {
            $limit = Vars::DEFAULT_PUBLISHER_ADVERTISER_PAGINATION;
            $view = Vars::PUBLISHER_ADVERTISER_BOX_VIEW;
            if(session()->has('publisher_advertiser_limit')) {
                $limit = session()->get('publisher_advertiser_limit');
            }
            if(session()->has('publisher_advertiser_view')) {
                $view = session()->get('publisher_advertiser_view');
            }

            $advertisers = Advertiser::where("status", true);

            if($request->search_by_name)
                $advertisers = $advertisers->where("name", "LIKE", "%$request->search_by_name%");

            $advertisers = $advertisers->groupBy('advertiser_id')->paginate($limit);

            if($view == Vars::PUBLISHER_ADVERTISER_LIST_VIEW) {
                return view("template.publisher.advertisers.advertiser-list", compact('advertisers'));
            } elseif ($view == Vars::PUBLISHER_ADVERTISER_BOX_VIEW) {
                return view("template.publisher.advertisers.advertiser-grid", compact('advertisers'));
            }

            abort(404);
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
