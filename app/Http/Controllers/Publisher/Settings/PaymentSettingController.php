<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Helper\Static\Vars;
use App\Mail\VerifyIdentity;
use App\Models\Billing;
use App\Models\Country;
use App\Models\EmailJob;
use App\Models\PaymentHistory;
use App\Models\PaymentMethodHistory;
use App\Models\PaymentSetting;
use App\Models\VerifyIdentity as VerifyIdentityModel;
use App\Mail\VerifyIdentity as VerifyIdentityMail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class PaymentSettingController extends BaseController
{

    public function actionPaymentSettings(Request $request)
    {
        $user = auth()->user();
        $this->loadPublishers($user);
        $this->loadPaymentSetting($user);

        $publisher = $user->publisher;
        $payment = $user->payment_setting;

        if($payment)
            $payment = $payment->where('website_id', $user->active_website_id)->first();

        $type = Vars::PAYMENT_SETTINGS;

        SEOMeta::setTitle("Payment Settings");

        $countries = Country::orderBy("name", "ASC")->get()->toArray();

        $billing = Billing::where("user_id", $user->id)->count();
        Session::put("is_payment_viewed", true);
        if(!session()->has("is_payment_viewed"))
        {
            $route = route("publisher.payments.payment-settings.verify-identity");
            Session::put("error", "To change / update your payment method, please click to <a href='{$route}'>verify your identity</a>. We’ll send a link to your associated email address—simply open the email and complete the verification.");
        }

        if($request->ajax())
            return view("template.publisher.settings.payment.payment_settings.form.options", compact('payment', 'countries'));

        return view("template.publisher.settings.index", compact("user", "publisher", "type", "payment", "countries", 'billing'));
    }

    public function actionPaymentSettingsUpdate(Request $request)
    {
        $user = auth()->user();
        if(isset($user->active_website_id))
        {
            $websiteId = $user->active_website_id;
        }
        else
        {
            $website = $user->websites()->latest()->first();
            $websiteId = $website->id ?? null;
        }
        PaymentSetting::updateOrCreate(
            [
                'user_id' => $user->id,
                'website_id' => $websiteId,
            ],
            [
                'payment_frequency' => $request->payment_frequency ?? null,
                'payment_threshold' => $request->payment_threshold ?? null,
                'payment_method' => $request->payment_method ?? null,
                'bank_location' => $request->bank_location ?? null,
                'account_holder_name' => $request->account_holder_name ?? null,
                'bank_account_number' => $request->bank_account_number ?? null,
                'bank_code' => $request->bank_code ?? null,
                'account_type' => $request->account_type ?? null,
                'paypal_country' => $request->paypal_country ?? null,
                'paypal_holder_name' => $request->paypal_holder_name ?? null,
                'paypal_email' => $request->paypal_email ?? null,
                'payoneer_holder_name' => $request->payoneer_holder_name ?? null,
                'payoneer_email' => $request->payoneer_email ?? null,
            ]
        );

        $paymentHistory = PaymentHistory::select('id')->where('publisher_id', $user->id)->where('website_id', $user->active_website_id)->where('status', PaymentMethodHistory::PENDING)->first();
        if($paymentHistory)
        {
            $history = PaymentMethodHistory::where('payment_history_id', $paymentHistory->id)->first();

            if($history)
            {
                $history->update([
                    'payment_frequency' => $request->payment_frequency ?? null,
                    'payment_threshold' => $request->payment_threshold ?? null,
                    'payment_method' => $request->payment_method ?? null,
                    'bank_location' => $request->bank_location ?? null,
                    'account_holder_name' => $request->account_holder_name ?? null,
                    'bank_account_number' => $request->bank_account_number ?? null,
                    'bank_code' => $request->bank_code ?? null,
                    'account_type' => $request->account_type ?? null,
                    'paypal_country' => $request->paypal_country ?? null,
                    'paypal_holder_name' => $request->paypal_holder_name ?? null,
                    'paypal_email' => $request->paypal_email ?? null,
                    'payoneer_holder_name' => $request->payoneer_holder_name ?? null,
                    'payoneer_email' => $request->payoneer_email ?? null,
                ]);
            }
        }

        $sectionName = "payment-settings";
        $section = $user->profile_complete_section ? $user->profile_complete_section : [];
        if(!in_array($sectionName, $section))
        {
            array_push($section, $sectionName);
            $user->update([
                'profile_complete_per' => $user->profile_complete_per + 20,
                'profile_complete_section' => $section
            ]);
        }

        return redirect()->route('publisher.payments.payment-settings.index')->with("success", "Billing Information Successfully Updated.");
    }

    public function actionVerifyIdentity(Request $request)
    {
        $ip = $request->ip();
        $ip = ($ip == "::1" || $ip == "127.0.0.1") ? "110.93.196.117" : $ip;
        $location = Location::get($ip);
        $location = [
            isset($location->countryName) && is_string($location->countryName) ? $location->countryName : '',
            isset($location->countryCode) && is_string($location->countryCode) ? $location->countryCode : '',
            isset($location->regionName) && is_string($location->regionName) ? $location->regionName : '',
            isset($location->cityName) && is_string($location->cityName) ? $location->cityName : '',
            isset($location->zipCode) ? $location->zipCode : ''
        ];

        // Join all non-empty elements with a space
        $location = trim(implode(' ', array_filter($location)));

        $data = VerifyIdentityModel::create([
            "ip_address" => $ip,
            "location" => $location,
            "user_id" => auth()->id(),
            "user_email" => auth()->user()->email
        ]);

        EmailJob::create([
            'name' => 'Verify Identity Job',
            'path' => 'VerifyIdentityJob',
            'payload' => json_encode($data),
            'date' => now()->format(Vars::CUSTOM_DATE_FORMAT)
        ]);

        return redirect()->route('publisher.payments.payment-settings.index')->with("success", "Verify Identity Email Successfully Send.");

    }

    public function actionVerifyIdentityCode(VerifyIdentityModel $identity)
    {
        Session::put("is_payment_viewed", true);
        return redirect()->route('publisher.payments.payment-settings.index');
    }
}
