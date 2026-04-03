<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\WebsiteUpdateRequest;
use App\Http\Resources\Publisher\Website\ListingResource;
use App\Models\FetchDailyData;
use App\Models\Mix;
use App\Models\User;
use App\Models\Website;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebsiteController extends BaseController
{

    public function actionWebsites() {

        $user = auth()->user();
        $this->loadPublishers($user);
        $this->loadWebsites($user);
        $publisher = $user->publisher;

        $websites = $user->websites;

        $type = Vars::WEBSITES;

        SEOMeta::setTitle("Websites");

        $loadMix = new Mix();
        $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->get()->toArray();
        $methods = $loadMix->select("id", "name")->where("type", Mix::PARTNER_TYPE)->orderBy("name", "ASC")->get()->toArray();

        return view("template.publisher.settings.index", compact('type', 'user', 'publisher', 'websites', 'categories', 'methods'));

    }

    public function actionGetWebsiteById(Website $website)
    {
        return new ListingResource($website);
    }

    public function actionWebsiteStore(Request $request)
    {
        try {

            $user = auth()->user();
            $this->loadWebsites($user);

            $website = Website::create([
                "url" => $request->website_url,
                "name" => $request->website_name,
                "categories" => $request->categories,
                "partner_types" => $request->partner_types,
                "monthly_traffic" => $request->monthly_traffic,
                "monthly_page_views" => $request->monthly_page_views,
                "status" => Website::PENDING,
            ]);

            $user->websites()->attach($website->id);

            return response()->json([
                "success" => true,
                "message" => "Website successfully added.",
                "data" => new ListingResource($website)
            ], 200);

        } catch (\Exception $exception) {

            return response()->json([
                "success" => false,
                "message" => $exception->getMessage(),
                "data" => []
            ], 400);

        }
    }

    public function actionWebsiteUpdate(WebsiteUpdateRequest $request)
    {
        try {
            $user = auth()->user();
            $this->loadWebsites($user);

            $website = $user->websites->where('id', $request->website_id)->first();

            $status = $website->status;
            if($website->url != $request->website_url)
                $status = Website::PENDING;

            $website->update([
                "url" => $request->website_url,
                "name" => $request->website_name,
                "categories" => $request->categories,
                "partner_types" => $request->partner_types,
                "monthly_traffic" => $request->monthly_traffic,
                "monthly_page_views" => $request->monthly_page_views,
                "status" => $status
            ]);

            if(!isset(auth()->user()->active_website_id))
            {
                $user->update([
                    'active_website_id' => $website->id
                ]);
            }

            return response()->json([
                "success" => true,
                "message" => "Website successfully updated.",
                "data" => new ListingResource($website)
            ], 200);

        } catch (\Exception $exception) {

            return response()->json([
                "success" => false,
                "message" => $exception->getMessage(),
                "data" => []
            ], 400);

        }
    }

    public function actionWebsiteVerification(Request $request)
    {
        try {

            $url = $request->url;
            $metas = get_meta_tags("{$url}");

            if(isset($metas[self::WEB_VERIFY_KEY])) {
                $uid = $metas[self::WEB_VERIFY_KEY];
                $web = Website::where("id", $uid)->first();
                $web->update([
                    'status' => Website::ACTIVE
                ]);

                User::where('id', auth()->user()->id)->update([
                    "active_website_id" => $uid
                ]);

                return response()->json([
                    "success" => true,
                    "message" => "Website verification successfully updated."
                ], 200);
            }

            return response()->json([
                "success" => false,
                "message" => "Website verification not updated."
            ], 200);

        } catch (\Exception $exception) {

            return response()->json([
                "success" => false,
                "message" => $exception->getMessage()
            ], 400);

        }
    }

}
