<?php

namespace App\Service\Publisher;

use App\Models\Country;
use App\Models\Mix;
use App\Models\State;
use Illuminate\Http\Request;

class CreateRegisterService
{
    public function init(Request $request, $account)
    {
        $session = $request->session();

        $stepOne = $this->stepOne($session);

        $stepTwo = $this->stepTwo($session);

        $stepThree = $this->stepThree($session);

        $stepFour = $this->stepFour($session);

        $isStepOne = $stepOne['is_step'];
        $isStepTwo = $stepTwo['is_step'];
        $isStepThree = $stepThree['is_step'];
        $isStepFour = $stepFour['is_step'];

        $stepOne = $stepOne['step'];
        $stepTwo = $stepTwo['step'];
        $stepThree = $stepThree['step'];
        $stepFour = $stepFour['step'];

        $countries = $states = $cities = $categories = $partners = [];

        if($isStepTwo)
        {
            $countries = Country::orderBy("name", "ASC")->get()->toArray();
            if(!empty($stepTwo))
            {
                $states = Country::where('id', $stepTwo['country'] ?? 0)->first()->states;
                $cities = State::where('id', $stepTwo['state'] ?? 0)->where('country_id', $stepTwo['country'] ?? 0)->first()->cities;
            }
        }

        if($isStepThree)
        {
            $countries = Country::orderBy("name", "ASC")->get()->toArray();
            $loadMix = new Mix();
            $categories = $loadMix->select("id", "name")->where("type", Mix::CATEGORY)->orderBy("name", "ASC")->groupBy('name')->get()->toArray();
            $partners = $loadMix->select("id", "name")->where("type", Mix::PARTNER_TYPE)->orderBy("name", "ASC")->get()->toArray();
        }

        return view('auth.publisher_register', compact('stepOne','stepTwo', 'stepThree', 'stepFour', 'isStepOne', 'isStepTwo', 'isStepThree', 'isStepFour', 'account', 'countries', 'states', 'cities', 'categories', 'partners'));

    }

    private function stepOne($session)
    {
        $isStep = $session->get("is_step_one_complete_publisher") ?? false;

        $step = [];
        if($isStep && $session->get("stepOnePublisher"))
            $step = decrypt($session->get("stepOnePublisher"));

        return [
            'is_step' => $isStep,
            'step' => $step
        ];
    }

    private function stepTwo($session)
    {
        $isStep = $session->get("is_step_two_complete_publisher") ?? false;

        $step = [];
        if($isStep && $session->get("stepTwoPublisher"))
            $step = decrypt($session->get("stepTwoPublisher"));

        return [
            'is_step' => $isStep,
            'step' => $step
        ];
    }

    private function stepThree($session)
    {
        $isStep = $session->get("is_step_three_complete_publisher") ?? false;

        $step = [];
        if($isStep && $session->get("stepThreePublisher"))
        {
            $user = decrypt($session->get("stepThreePublisher"));
            $step = is_array($user) ? $this->array_clone($user) : clone $user;
        }

        return [
            'is_step' => $isStep,
            'step' => $step
        ];
    }

    private function stepFour($session)
    {
        $isStep = $session->get("is_step_four_complete_publisher") ?? false;

        $step = [];
        if($isStep && $session->get("stepFourPublisher"))
        {
            $user = decrypt($session->get("stepFourPublisher"));
            $step = is_array($user) ? $this->array_clone($user) : clone $user;
            $session->forget("stepFourPublisher");
            $session->forget("is_step_four_complete_publisher");
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
