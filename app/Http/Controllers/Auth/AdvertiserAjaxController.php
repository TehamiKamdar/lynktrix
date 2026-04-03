<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\AdvertiserStepOneRequest;
use App\Http\Requests\Auth\Register\AdvertiserStepTwoRequest;
use App\Models\Advertiser;
use App\Models\Country;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdvertiserAjaxController extends Controller
{
    public function actionStepOne(AdvertiserStepOneRequest $request)
    {

        try {

            Session::put('stepOneAdvertiser', encrypt($request->validated()));
            Session::put('is_step_one_complete_advertiser', true);

            return response()->json(true, 200);

        } catch (\Exception $exception) {

            return response()->json(false, $exception->getCode());

        }
    }

    public function actionStepTwo(AdvertiserStepTwoRequest $request)
    {

        try {

            $data = $request->validated();

            $stepOneData = decrypt(Session::get("stepOneAdvertiser"));

            $user = User::create([
                "first_name" => $stepOneData["first_name"],
                "last_name" => $stepOneData["last_name"],
                "user_name" => $stepOneData["user_name"],
                "email" => $stepOneData["email"],
                "password" => $stepOneData["password"],
                "status" => User::PENDING,
                "type" => User::ADVERTISER,
                "api_token" => Str::random(30)
            ]);

            $role = Role::where('title', Role::ADVERTISER_ROLE)->first();
            $user->roles()->sync($role->id);

            Advertiser::create([
                "user_id" => $user->id,
                "name" => $data["brand_name"],
                "company_name" => $data["company_name"],
                "url" => $data["website_url"],
                "phone_number" => $data["phone_number"],
                "address" => $data["address"] ?? null,
                "city" => $data["city"] ?? null,
                "state" => $data["state"] ?? null,
                "country" => $data["country"] ?? null,
                "type" => Advertiser::MANUAL
            ]);

            event(new Registered($user));

            Auth::login($user);

            Session::forget('stepOneAdvertiser');
            Session::put('is_step_three_complete_advertiser', true);
            Session::put('stepThreeAdvertiser', encrypt($user));

            return response()->json([
                "success" => true,
                "message" => "Advertiser Successfully Created..."
            ], 200);

        } catch (\Exception $exception) {

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

            Session::put('is_step_one_complete_advertiser', false);
            Session::put('is_step_two_complete_advertiser', false);
            Session::put('is_step_three_complete_advertiser', false);

            $session = $request->session();

            if($page == "1")
            {
                Session::put('is_step_one_complete_advertiser', true);
                $stepOne = $session->get("stepOneAdvertiser") ? decrypt($session->get("stepOneAdvertiser")) : [];
                $isStepOne = true;
                $isStepTwo = $isStepThree = false;
                return view("auth.advertiser_register.step_one", compact('stepOne', 'isStepOne', 'isStepTwo', 'isStepThree', 'account'));
            }

            elseif($page == "2")
            {
                Session::put('is_step_two_complete_advertiser', true);
                $stepTwo = $session->get("stepTwoAdvertiser") ? decrypt($session->get("stepTwoAdvertiser")) : [];
                $isStepTwo = true;
                $isStepOne = $isStepThree = false;

                $countries = Country::orderBy("name", "ASC")->get()->toArray();

                $states = $cities = [];
                if(!empty($stepTwo))
                {
                    $states = Country::where('id', $stepTwo['country'] ?? 0)->first()->states;
                    $cities = State::where('id', $stepTwo['state'] ?? 0)->where('country_id', $stepTwo['country'] ?? 0)->first()->cities;
                }

                return view("auth.advertiser_register.step_two", compact('stepTwo', 'isStepOne', 'isStepTwo', 'isStepThree', 'account', 'countries', 'states', 'cities'));
            }

            elseif($page == "3")
            {
                Session::put('is_step_three_complete_advertiser', true);
                $isStepThree = true;
                $isStepOne = $isStepTwo = false;

                $user = $session->get("stepThreeAdvertiser") ? decrypt($session->get("stepThreeAdvertiser")) : [];
                $stepThree = $this->array_clone($user->toArray());
                $session->forget("stepThreeAdvertiser");
                $session->forget("is_step_three_complete_advertiser");

                return view("auth.advertiser_register.step_three", compact('stepThree',  'isStepOne', 'isStepTwo', 'isStepThree', 'account'));
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
                ? array_clone($element)
                : ((is_object($element))
                    ? clone $element
                    : $element
                )
            );
        }, $array);
    }
}
