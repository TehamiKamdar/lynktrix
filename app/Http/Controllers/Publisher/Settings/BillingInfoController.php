<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\Settings\Payment\BillingInfoRequest;
use App\Models\Billing;
use App\Models\Country;
use App\Models\State;
use Artesaos\SEOTools\Facades\SEOMeta;

class BillingInfoController extends BaseController
{
    public function actionBillingInfo()
    {
        $user = auth()->user();
        $this->loadPublishers($user);
        $this->loadBilling($user);
        $publisher = $user->publisher;
        $billing = $user->billing;

        $type = Vars::BILLING_INFO;

        SEOMeta::setTitle("Billing Information");

        $countries = Country::orderBy("name", "ASC")->get()->toArray();
        $states = Country::where('id', $billing->country ?? 0)->first();
        $cities = State::where('id', $billing->state ?? 0)->where('country_id', $billing->country ?? 0)->first();

        $states = $states ? $states->states : [];
        $cities = $cities ? $cities->cities : [];

        return view("template.publisher.settings.index", compact("user", "publisher", "type", "countries", "states", "cities", "billing"));
    }

    public function actionBillingInfoUpdate(BillingInfoRequest $request)
    {
        $user = auth()->user();
        Billing::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'company_registration_no' => $request->company_registration_no,
                'tax_vat_no' => $request->tax_vat_no,
            ]
        );

        $sectionName = "billing-information";
        $section = $user->profile_complete_section ? $user->profile_complete_section : [];
        if(!in_array($sectionName, $section))
        {
            array_push($section, $sectionName);
            $user->update([
                'profile_complete_per' => $user->profile_complete_per + 20,
                'profile_complete_section' => $section
            ]);
        }

        return redirect()->route('publisher.payments.billing-information.index')->with("success", "Payment Settings Successfully Updated.");

    }
}
