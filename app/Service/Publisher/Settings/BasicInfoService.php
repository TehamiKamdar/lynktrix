<?php

namespace App\Service\Publisher\Settings;

use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\BasicInfoUpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Mediakit;
use App\Models\Publisher;
use App\Models\State;
use Artesaos\SEOTools\Facades\SEOMeta;

class BasicInfoService extends BaseService
{
    public function init()
    {
        $user = auth()->user();
        $this->loadPublishers($user);
        $publisher = $user->publisher;

        $countries = Country::orderBy("name", "ASC")->get()->toArray();

        $states = $cities = [];
        if(isset($publisher->location_country) && $publisher->location_country)
        {
            $states = State::select('id','name')->where("country_id", $publisher->location_country)->get()->toArray();
        }
        if(isset($publisher->location_state) && $publisher->location_state)
        {
            $cities = City::select('id','name')->where("state_id", $publisher->location_state)->get()->toArray();
        }

        $languages = Publisher::getLanguages();

        $years = collect(range(now()->subYears(49)->format("Y"), now()->format("Y")))->reverse();

        $months = [
            "january",
            "february",
            "march",
            "april",
            "may",
            "june",
            "july",
            "august",
            "september",
            "october",
            "november",
            "december",
        ];

        $mediakits = $user->mediakits;

        $type = Vars::BASIC_INFO;

        SEOMeta::setTitle("Basic Information");

        return view("template.publisher.settings.index", compact('type', 'user', 'publisher', 'mediakits',  'countries', 'states', 'cities', 'languages', 'years', 'months'));
    }

    public function update(BasicInfoUpdateRequest $request)
    {
        $auth = auth()->user();
        $publisher = $auth->publisher;

        $auth->first_name = $request->first_name;
        $auth->last_name = $request->last_name;
        $auth->update();
        
        $publisher->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "language" => $request->language,
            "customer_reach" => $request->customer_reach,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "location_country" => $request->location_country,
            "location_state" => $request->location_state,
            "location_city" => $request->location_city,
            "location_address_1" => $request->location_address_1,
            "location_address_2" => $request->location_address_2,
            "zip_code" => $request->zip_code,
            "intro" => $request->intro,
        ]);

        if($request->mediakit_image) {

            $size = $request->mediakit_image->getSize();

            $filename = uniqid($publisher->sid . '_') . ".". $request->mediakit_image->getClientOriginalName();

            $request->mediakit_image->move(public_path('media_kits'), $filename);

            $kit = 'media_kits/' . $filename;

            $mediaKit = Mediakit::create([
                'name' => $filename,
                'size' => number_format($size / 1048576,2),
                'image' => $kit
            ]);

            $auth->mediakits()->attach($mediaKit->id);
        }

        $sectionName = "basic-information";
        $section = $auth->profile_complete_section ? $auth->profile_complete_section : [];
        if(!in_array($sectionName, $section))
        {
            array_push($section, $sectionName);
            $auth->update([
                'profile_complete_per' => $auth->profile_complete_per + 20,
                'profile_complete_section' => $section
            ]);
        }

        return redirect()->route('publisher.profile.basic-information.index')->with("success", "Basic Info Successfully Updated.");
    }

    public function deleteMediaKit(Mediakit $mediakit)
    {
        unlink($mediakit->image);
        $mediakit->delete();
        return redirect()->route('publisher.profile.basic-information.index')->with("success", "Media Kit Successfully Deleted.");
    }
}
