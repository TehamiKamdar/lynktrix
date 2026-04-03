<?php

namespace App\Http\Controllers\Publisher\Creatives;

use App\Enums\ExportType;
use App\Exports\TextLinkExport;
use App\Helper\Static\Vars;
use App\Http\Controllers\Controller;
use App\Models\AdvertiserApply;
use App\Models\Tracking;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TextLinkController extends Controller
{
    public function actionTextLink(Request $request)
    {
        $limit = Vars::DEFAULT_PUBLISHER_TEXT_LINKS_PAGINATION;

        if(session()->has('publisher_text_link_limit')) {
            $limit = session()->get('publisher_text_link_limit');
        }

        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $links = [];
        $total = 0;

        if ($websites) {

            $links = Tracking::select(["advertisers.name", "advertisers.id", "advertisers.sid", "advertisers.url", "trackings.tracking_url_short", "trackings.tracking_url_long", "trackings.sub_id"])
                            ->join("advertisers", "advertisers.id", "trackings.advertiser_id")
                            ->where("trackings.publisher_id", auth()->user()->id)
                            ->where("trackings.website_id", auth()->user()->active_website_id)
                            ->where(function($query) use($request) {
                                $query->orWhereNotNull("trackings.tracking_url_short");
                                $query->orWhereNotNull("trackings.tracking_url_long");
                            });

            if($request->search_by_name)
                $links = $links->where(function($query) use($request) {
                    $query->orWhere("advertisers.name", "LIKE", "%{$request->search_by_name}%");
                    $query->orWhere("trackings.tracking_url_short", "LIKE", "%{$request->search_by_name}%");
                    $query->orWhere("advertisers.url", "LIKE", "%{$request->search_by_name}%");
                    $query->orWhere("advertisers.sid", "LIKE", "%{$request->search_by_name}%");
                    $query->orWhere("trackings.sub_id", "LIKE", "%{$request->search_by_name}%");
                });

            $links = $links->orderBy("trackings.created_at", "DESC")->paginate($limit);

            $total = $links->total();

        }
        else
        {
            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Creative Coupons.";
            Session::put("error", $message);
        }

        if($request->ajax()) {
            $returnView = view("template.publisher.creatives.text-links.list_view", compact('links'))->render();
            return response()->json(['total' => $total, 'html' => $returnView]);
        }
        // return $links;
        return view("template.publisher.creatives.text-links.list", compact("links", "total"));
    }

    public function actionExport(ExportType $type, Request $request)
    {
        try
        {
            if(ExportType::CSV == $type)
                return Excel::download(new TextLinkExport($request), 'text-link.csv');
            elseif(ExportType::XLSX == $type)
                return Excel::download(new TextLinkExport($request), 'text-link.xlsx');
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
