<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\CompanyInfoUpdateRequest;
use App\Models\Country;
use App\Models\State;
use Artesaos\SEOTools\Facades\SEOMeta;

class CompanyInfoController extends BaseController
{

    public function actionCompanyInfo() {

        $user = auth()->user();
        $this->loadPublishers($user);
        $this->loadCompanies($user);
        $publisher = $user->publisher;
        $company = $user->companies->last();

        $countries = Country::orderBy("name", "ASC")->get()->toArray();
        $states = Country::where('id', $company->country ?? 0)->first();
        $cities = State::where('id', $company->state ?? 0)->where('country_id', $company->country ?? 0)->first();

        $type = Vars::COMPANY_INFO;

        $states = $states ? $states->states : [];
        $cities = $cities ? $cities->cities : [];

        SEOMeta::setTitle("Company");

        return view("template.publisher.settings.index", compact('type', 'user', 'publisher', 'company', 'countries', 'states', 'cities'));

    }

    public function actionCompanyInfoUpdate(CompanyInfoUpdateRequest $request)
    {
        $user = auth()->user();
        $this->loadCompanies($user);

        $company = $user->companies->last();

        $company->update([
            "company_name" => $request->company_name,
            "contact_name" => $request->legal_entity_type,
            "legal_entity_type" => $request->legal_entity_type,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
            "zip_code" => $request->zip_code,
            "address" => $request->address,
            "address_2" => $request->address_2,
        ]);

        return redirect()->route('publisher.profile.company.index')->with("success", "Company Info Successfully Updated.");
    }
}
