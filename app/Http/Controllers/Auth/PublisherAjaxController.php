<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\PublisherStepOneRequest;
use App\Http\Requests\Auth\Register\PublisherStepThreeRequest;
use App\Http\Requests\Auth\Register\PublisherStepTwoRequest;
use App\Jobs\Mail\User\RegisteredJob;
use App\Jobs\Sync\UserJob;
use App\Models\Company;
use App\Models\Country;
use App\Models\EmailJob;
use App\Models\FetchDailyData;
use App\Models\Mix;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use App\Models\Website;
use App\Traits\JobTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PublisherAjaxController extends Controller
{
    use JobTrait;

    public function actionStepOne(PublisherStepOneRequest $request)
    {

        try {

            Session::put('stepOnePublisher', encrypt($request->validated()));
            Session::put('is_step_one_complete_publisher', true);

            return response()->json(true, 200);

        } catch (\Exception $exception) {

            return response()->json(false, $exception->getCode());

        }
    }
    public function actionStepTwo(PublisherStepTwoRequest $request)
    {

        try {

            Session::put('stepTwoPublisher', encrypt($request->validated()));
            Session::put('is_step_two_complete_publisher', true);

            return response()->json(true, 200);

        } catch (\Exception $exception) {

            return response()->json(false, $exception->getCode());

        }
    }

    public function actionStepThree(PublisherStepThreeRequest $request)
    {

        try {

            $data = $request->validated();

            $stepOneData = decrypt(Session::get("stepOnePublisher"));
            $stepTwoData = decrypt(Session::get("stepTwoPublisher"));

            $user = User::create([
                "first_name" => $stepOneData["first_name"],
                "last_name" => $stepOneData["last_name"],
                "user_name" => $stepOneData["user_name"],
                "email" => $stepOneData["email"],
                "password" => $stepOneData["password"],
                "status" => User::PENDING,
                "type" => User::PUBLISHER,
                "api_token" => Str::random(30)
            ]);

            $role = Role::where('title', Role::PUBLISHER_ROLE)->first();
            $user->roles()->sync($role->id);

            $company = Company::create([
                "company_name" => $stepTwoData['company_name'] ?? null,
                "contact_name" => $stepTwoData['contact_name'] ?? null,
                "legal_entity_type" => $stepTwoData['entity_type'] ?? null,
                "phone_number" => "+" . $stepTwoData['phone_number'] . " " . $stepTwoData['phone_number'],
                "address" => $stepTwoData['address'],
                "city" => $stepTwoData['city'] ?? null,
                "state" => $stepTwoData['state'] ?? null,
                "country" => $stepTwoData['country'] ?? null,
                "zip_code" => $stepTwoData['postal_code'] ?? null,
            ]);

            $user->companies()->sync($company->id);

            $website = Website::create([
                "name" => $this->getDomainName($data['website_url']),
                "categories" => $data['categories'],
                "partner_types" => $data['partner_types'],
                "url" => $data['website_url'],
                "status" => Website::PENDING,
                "country" => $data['website_country'],
                "monthly_traffic" => $data['monthly_traffic'],
                "monthly_page_views" => $data['monthly_page_views']
            ]);

            $user->websites()->sync($website->id);

            Publisher::create([
                "user_id" => $user->id,
                "intro" => $data['brief_introduction'],
            ]);

            Auth::login($user);

            $user = auth()->user();
            $user->update([
                'profile_complete_per' => 20,
                'profile_complete_section' => ['company']
            ]);

            Session::forget('stepOnePublisher');
            Session::forget('stepTwoPublisher');
            Session::forget('stepThreePublisher');
            Session::put('is_step_four_complete_publisher', true);
            Session::put('stepFourPublisher', encrypt($user->toArray()));

            return response()->json([
                "success" => true,
                "message" => "Publisher Successfully Created..."
            ], 200);

        } catch (\Exception $exception) {

            Session::forget('stepOnePublisher');
            Session::forget('stepTwoPublisher');
            Session::forget('stepThreePublisher');

            return response()->json([
                "success" => false,
                "message" => $exception->getMessage()
            ], 400);

        }
    }

    public function actionStepForm(Request $request)
    {
        try {

            $page = $request->page;
            $account = $request->account;

            Session::put('is_step_one_complete_publisher', false);
            Session::put('is_step_two_complete_publisher', false);
            Session::put('is_step_three_complete_publisher', false);
            Session::put('is_step_four_complete_publisher', false);

            $session = $request->session();

            $isStepOne = $isStepTwo = $isStepThree = $isStepFour = false;

            if($page == "1")
            {
                Session::put('is_step_one_complete_publisher', true);
                $stepOne = $session->get("stepOnePublisher") ? decrypt($session->get("stepOnePublisher")) : [];
                $isStepOne = true;

                return view("auth.publisher_register.step_one", compact('stepOne', 'isStepOne', 'isStepTwo', 'isStepThree', 'isStepFour', 'account'));
            }

            elseif($page == "2")
            {
                Session::put('is_step_two_complete_publisher', true);
                $stepTwo = $session->get("stepTwoPublisher") ? decrypt($session->get("stepTwoPublisher")) : [];
                $isStepTwo = true;

                $countries = Country::orderBy("name", "ASC")->get()->toArray();

                $states = $cities = [];
                if(!empty($stepTwo))
                {
                    $states = Country::where('id', $stepTwo['country'] ?? 0)->first()->states;
                    $cities = State::where('id', $stepTwo['state'] ?? 0)->where('country_id', $stepTwo['country'] ?? 0)->first()->cities;
                }
                return view("auth.publisher_register.step_two", compact('stepTwo', 'isStepOne', 'isStepTwo', 'isStepThree', 'isStepFour', 'account', 'countries', 'states', 'cities'));
            }

            elseif($page == "3")
            {
                Session::put('is_step_three_complete_publisher', true);

                $isStepThree = true;

                $user = $session->get("stepThreePublisher") ? decrypt($session->get("stepThreePublisher")) : [];
                $stepThree = $this->array_clone($user);

                $countries = Country::orderBy("name", "ASC")->get()->toArray();

                $loadMix = new Mix();
                $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
                $partners = $loadMix->select("id", "name")->where("type", Mix::PARTNER_TYPE)->orderBy("name", "ASC")->get()->toArray();

                return view("auth.publisher_register.step_three", compact('stepThree',  'isStepOne', 'isStepTwo', 'isStepThree', 'isStepFour', 'account', 'countries', 'categories', 'partners'));
            }

            elseif($page == "4")
            {
                Session::put('is_step_four_complete_publisher', true);
                $isStepFour = true;

                $user = $session->get("stepFourPublisher") ? decrypt($session->get("stepFourPublisher")) : [];
                $stepFour = $this->array_clone($user);
                $session->forget("stepFourPublisher");
                $session->forget("is_step_four_complete_publisher");

                return view("auth.publisher_register.step_four", compact('stepFour',  'isStepOne', 'isStepTwo', 'isStepThree', 'isStepFour', 'account'));
            }

        } catch (\Exception $exception) {

            return response()->json([
                "success" => false,
                "message" => $exception->getMessage()
            ], 400);

        }
    }

    private function array_clone($array) {
        return array_map(function($element) {
            return ((is_array($element))
                ? $this->array_clone($element)
                : ((is_object($element))
                    ? clone $element
                    : $element
                )
            );
        }, $array);
    }

    private function getDomainName($url) {
        $remove = array("http://","https://", "www.");
        return str_replace($remove,"",$url);
    }
}
