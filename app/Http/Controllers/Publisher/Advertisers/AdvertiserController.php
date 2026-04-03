<?php

namespace App\Http\Controllers\Publisher\Advertisers;

use App\Enums\ExportType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\ApplyAdvertiserRequest;
use App\Http\Requests\Publisher\SendMessageToAdvertiserRequest;
use App\Service\Publisher\Advertiser\ApplyService;
use App\Service\Publisher\Advertiser\ExportService;
use App\Service\Publisher\Advertiser\FindService;
use App\Service\Publisher\Advertiser\OwnService;
use App\Service\Publisher\Advertiser\SearchService;
use App\Service\Publisher\Advertiser\SendMsgService;
use App\Service\Publisher\Advertiser\TypeService;
use App\Service\Publisher\Advertiser\ViewService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use App\Models\Mix;
use App\Models\Advertiser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdvertiserController extends Controller
{
    /**
     * @param Request $request
     * @param FindService $service
     * @return Application|Factory|View|RedirectResponse|JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function actionFindAdvertiser(Request $request, FindService $service): View|Factory|RedirectResponse|Application|JsonResponse
    {
        return $service->init($request);
    }

    /**
     * @param Request $request
     * @param TypeService $service
     * @return Application|Factory|View|RedirectResponse|JsonResponse
     */
    public function actionAdvertiserTypes(Request $request, TypeService $service): View|Factory|RedirectResponse|Application|JsonResponse
    {
        return $service->init($request);
    }

    /**
     * @param Request $request
     * @param OwnService $service
     * @return View|Factory|RedirectResponse|Application|JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function actionOwnAdvertiser(Request $request, OwnService $service): View|Factory|RedirectResponse|Application|JsonResponse
    {
        return $service->init($request);
    }

    /**
     * @param ViewService $service
     * @param $sid
     * @return View|Factory|RedirectResponse|Application
     */
    public function actionViewAdvertiser(ViewService $service, $sid): View|Factory|RedirectResponse|Application
    {
        // dd($service->init($sid));
        return $service->init($sid);
    }

    /**
     * @param Request $request
     * @param SearchService $service
     * @return Application|Factory|View|RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function actionSearchAdvertiserFilter(Request $request, SearchService $service): View|Factory|RedirectResponse|Application
    {
        return $service->init($request);
    }

    /**
     * @param ApplyAdvertiserRequest $request
     * @param ApplyService $service
     * @return RedirectResponse
     */
    public function actionApplyNetwork(ApplyAdvertiserRequest $request, ApplyService $service): RedirectResponse
    {
        $data = $service->init($request);
        return redirect()->back()->with($data['type'], $data['message']);

    }

    /**
     * @param ExportType $type
     * @param ExportService $service
     * @return BinaryFileResponse|RedirectResponse
     */
    public function actionExportAdvertisers(ExportType $type, ExportService $service, Request $request): BinaryFileResponse|RedirectResponse
    {
        return $service->init($request, $type);
    }

    /**
     * @param SendMessageToAdvertiserRequest $request
     * @param SendMsgService $service
     * @return RedirectResponse
     */
    public function actionSendMsgToAdvertiser(SendMessageToAdvertiserRequest $request, SendMsgService $service): RedirectResponse
    {
        $data = $service->init($request);
        return redirect()->back()->with($data['type'], $data['message']);
    }

       public function maunalAdvertisers(){
        $countries = Country::orderBy("name", "ASC")->get()->toArray();
         $loadMix = new Mix();
        $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
        $methods = $loadMix->select("id", "name")->where("type", Mix::PROMOTIONAL_METHOD)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
        return view('template.admin.advertisers.store-advertisers',compact('countries', 'categories', 'methods'));
    }

    public function storemaunalAdvertisers(Request $request){
        try {
            $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'advertiser_id'     => 'required|string|max:255|unique:advertisers,advertiser_id',
            'source'            => 'required|string|max:255',
            'url'               => 'required|url',
            'click_through_url' => 'required|url',
            'logo'              => 'required',
            'commission'        => 'required|numeric',
            'commission_type'   => 'required|string|max:50',
        ]);
            $advertiserData = [];

            if (isset($request->name)) {
                $advertiserData["name"] = $request->name;
            }
            if (isset($request->advertiser_id)) {
                $advertiserData["advertiser_id"] = $request->advertiser_id;
            }
            if (isset($request->source)) {
                $advertiserData["source"] = $request->source;
            }
             if (isset($request->commission)) {
                $advertiserData["commission"] = $request->commission;
            }
             if (isset($request->commission_type)) {
                $advertiserData["commission_type"] = $request->commission_type;
            }
            if (isset($request->url)) {
                $advertiserData["url"] = $request->url;
            }
            if (isset($request->primary_region)) {
                $advertiserData["primary_regions"] = [$request->primary_region];
            }
            if (isset($request->currency_code)) {
                $advertiserData["currency_code"] = $request->currency_code;
            }
            if (isset($request->average_payment_time)) {
                $advertiserData["average_payment_time"] = $request->average_payment_time;
            }
            if (isset($request->epc)) {
                $advertiserData["epc"] = $request->epc;
            }
            if (isset($request->click_through_url)) {
                $advertiserData["click_through_url"] = $request->click_through_url;
            }
            if (isset($request->deeplink_enabled)) {
                $advertiserData["deeplink_enabled"] = $request->deeplink_enabled;
            }
            if (isset($request->categories)) {
                $advertiserData["categories"] = $request->categories;
            }
            if (isset($request->tags)) {
                $advertiserData["tags"] = $request->tags;
            }
            if (isset($request->offer_type)) {
                $advertiserData["offer_type"] = $request->offer_type;
            }
            if (isset($request->supported_regions)) {
                $advertiserData["supported_regions"] = $request->supported_regions;
            }
            if (isset($request->program_restrictions)) {
                $advertiserData["program_restrictions"] = $request->program_restrictions;
            }
            if (isset($request->promotional_methods)) {
                $advertiserData["promotional_methods"] = $request->promotional_methods;
            }
            if (isset($request->is_available)) {
                $advertiserData["is_available"] = $request->is_available;
                $advertiserData["status"] = $request->is_available;
                $advertiserData["is_active"] = $request->is_available;
            }else{
                $advertiserData["is_available"] = 1;
                $advertiserData["status"] = 1;
                $advertiserData["is_active"] = 1;
            }
            if (isset($request->description)) {
                $advertiserData["description"] = $request->description;
            }
            if (isset($request->short_description)) {
                $advertiserData["short_description"] = $request->short_description;
            }
            if (isset($request->program_policies)) {
                $advertiserData["program_policies"] = $request->program_policies;
            }
           if (isset($request->logo)) {
                if(!empty($request->logo)){
                    if($request->hasFile('logo')){
                          $filename = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
    $storagePath = $request->file('logo')->storeAs('logos', $filename, 'public');

    // Store the path in the database
    $advertiserData["logo"] = 'storage/logos/' . $filename;
                    }else{
                        $advertiserData["logo"] = $request->logo;
                    }
                }else{
                     $advertiserData["logo"] = null;
                }
            }
            if (isset($request->custom_domain)) {
                $advertiserData["custom_domain"] = $request->custom_domain ?? null;
            }
 $advertiserData["type"] = 'api';
            Advertiser::create($advertiserData);

            

            $response = [
                "type" => "success",
                "message" => "Advertiser API Data Successfully Added."
            ];
            return redirect()
            ->route("admin.advertiser-management.api-advertisers.index")
            ->with($response["type"], $response["message"]);
        } catch (\Exception $exception) {
             return redirect()
            ->back()
            ->withInput() // ✅ Keep old input
            ->withErrors(['error' => $exception->getMessage()]); // ✅ Show error
        }

        
    }
}
