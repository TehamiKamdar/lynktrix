<?php

namespace App\Service\Advertiser;

use App\Models\Country;
use App\Models\State;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CreateRegisterService
{
    public function init(Request $request, $account)
    {
        $account = $account->value;

        SEOMeta::setTitle(ucwords($account) . " Register");

        $session = $request->session();

        $stepOne = $this->stepOne($session);

        $stepTwo = $this->stepTwo($session);

        $stepThree = $this->stepThree($session);

        $isStepOne = $stepOne['is_step'];
        $isStepTwo = $stepTwo['is_step'];
        $isStepThree = $stepThree['is_step'];

        $stepOne = $stepOne['step'];
        $stepTwo = $stepTwo['step'];
        $stepThree = $stepThree['step'];

        $countries = $states = $cities = [];

        if($isStepTwo)
        {
            $countries = Country::orderBy("name", "ASC")->get()->toArray();
            if(!empty($stepTwo))
            {
                $states = Country::where('id', $stepTwo['country'] ?? 0)->first()->states;
                $cities = State::where('id', $stepTwo['state'] ?? 0)->where('country_id', $stepTwo['country'] ?? 0)->first()->cities;
            }
        }

        return view('auth.advertiser_register', compact('stepOne','stepTwo', 'stepThree', 'isStepOne', 'isStepTwo', 'isStepThree', 'account', 'countries', 'states', 'cities'));

    }

    private function stepOne($session)
    {
        $isStep = $session->get("is_step_one_complete_advertiser") ?? false;

        $step = [];
        if($isStep && $session->get("stepOneAdvertiser"))
            $step = decrypt($session->get("stepOneAdvertiser"));

        return [
            'is_step' => $isStep,
            'step' => $step
        ];
    }

    private function stepTwo($session)
    {
        $isStep = $session->get("is_step_two_complete_advertiser") ?? false;

        $step = [];
        if($isStep && $session->get("stepTwoAdvertiser"))
            $step = decrypt($session->get("stepTwoAdvertiser"));

        return [
            'is_step' => $isStep,
            'step' => $step
        ];
    }

    private function stepThree($session)
    {
        $isStep = $session->get("is_step_three_complete_advertiser") ?? false;

        $step = [];
        if($isStep && $session->get("stepThreeAdvertiser"))
        {
            $user = decrypt($session->get("stepThreeAdvertiser"));
            $step = is_array($user) ? $this->array_clone($user) : clone $user;
            $session->forget("stepThreeAdvertiser");
            $session->forget("is_step_three_complete_advertiser");
        }

        return [
            'is_step' => $isStep,
            'step' => $step
        ];
    }

    private function array_clone($array) {
        return array_slice($array, 0, null, true);
    }
}
