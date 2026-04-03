<?php

namespace App\Service\Publisher\Payments;

use App\Helper\Static\Vars;
use App\Models\PaymentHistory;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexService
{
    public function list(Request $request)
    {
        $limit = Vars::DEFAULT_PUBLISHER_PAYMENT_PAGINATION;
        if(session()->has('publisher_payment_limit')) {
            $limit = session()->get('publisher_payment_limit');
        }

        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $message = $type = null;

        if ($websites) {

            $payments = PaymentHistory::with('payment_method')->where("publisher_id", auth()->user()->id);
            $payments = $payments->orderBy("created_at", "DESC")->paginate($limit);

        } else {

            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Report Transactions.";
            $type = "error";
            $payments = [];

        }

        if ($request->ajax()) {
            $view = view("template.publisher.payments.list_view", compact('payments'))->render();
            return response()->json(['html' => $view]);
        }

        if ($type && $message)
            Session::put($type, $message);

        return view("template.publisher.payments.list", compact('payments'));

    }

    public function invoice(PaymentHistory $paymentHistory)
    {
        $paymentHistory->load(['payment_method', 'user']);
        $company = $paymentHistory->user->companies->last();
        return view("template.publisher.payments.invoice", compact('paymentHistory', 'company'));
    }
}
