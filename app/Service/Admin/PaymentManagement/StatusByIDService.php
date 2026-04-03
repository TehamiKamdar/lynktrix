<?php

namespace App\Service\Admin\PaymentManagement;

use App\Helper\Static\Vars;
use App\Models\PaymentHistory;
use App\Models\PaymentMethodHistory;
use App\Models\PaymentSetting;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StatusByIDService
{
    public function init(Request $request, Transaction $transaction, $status)
    {
        try {
            $paymentStatus = Transaction::PAYMENT_STATUS_REJECT;
            if($status == "confirm")
            {
                $paymentStatus = Transaction::PAYMENT_STATUS_CONFIRM;
            }
            elseif($status == "release")
            {
                $paymentStatus = Transaction::PAYMENT_STATUS_RELEASE;
                $message = $this->makeHistory($transaction);
            }
            if(isset($message) && !empty($message))
            {
                $request->session()->flash('error', $message);
            }
            else
            {
                $data = [
                    'payment_status' => $paymentStatus
                ];
                if($request->status == "reject")
                {
                    if($transaction->commission_status == Transaction::STATUS_PENDING)
                        $data['commission_status'] = Transaction::STATUS_DECLINED;
                    $data['commission_amount'] = -$transaction->commission_amount;
                    $data['sale_amount'] = -$transaction->sale_amount;
                }
                else
                {
                    if($transaction->commission_status == Transaction::STATUS_PENDING)
                        $data['commission_status'] = Transaction::STATUS_APPROVED;
                }
                $transaction->update($data);
                $request->session()->flash('success', 'Thank you for the update! Payment status has been successfully updated.');
            }
        } catch (\Exception $exception)
        {
            $request->session()->flash('error', $exception->getMessage());
        }

        return redirect()->back();
    }

    // ADD TRANSACTION LOOP
    private function makeHistory($transaction)
    {
        $paymentID = null;

        $payment = PaymentHistory::where([
            "website_id" => $transaction->website_id,
            "status" => PaymentHistory::PENDING
        ])->first();

        $staticCommission = Vars::COMMISSION_PERCENTAGE;

        if($payment)
        {
            $commissionAmount = $payment->commission_amount + $transaction->commission_amount;
            $saleAmount = $payment->amount + $transaction->sale_amount;

            $paymentCheck = PaymentHistory::where("status", "paid")
            ->whereRaw("JSON_CONTAINS(transaction_idz, ?)", [json_encode($transaction->transaction_id)])
            ->exists();
           
            if($paymentCheck)
            {
                return "Transaction ID: $transaction->transaction_id already paid.";
            }
            else
            {
                $payment->update([
                    "transaction_idz" => array_unique(array_merge($payment->transaction_idz ?? [], [$transaction->transaction_id])),
                    "amount" => $saleAmount,
                    "commission_amount" => $commissionAmount,
                    "lc_commission_amount" => "0.{$staticCommission}" * $commissionAmount,
                    "commission_percentage" => $staticCommission,
                    "is_matched" => 0,
                ]);
            }

            $paymentID = $payment->payment_id;
        }
        else
        {

            $paymentCheck = PaymentHistory::where("status", "paid")->where("transaction_idz", "LIKE", "%$transaction->transaction_id%")->count();
            if($paymentCheck)
            {
                return "Transaction ID: $transaction->transaction_id already exist.";
            }
            else
            {
                $commissionAmount = $transaction->commission_amount;
                $saleAmount = $transaction->sale_amount;

                $payment = PaymentSetting::where('website_id',  $transaction->website_id)->first();

                $history = PaymentHistory::create([
                    "transaction_idz" => [$transaction->transaction_id],
                    "publisher_id" => $transaction->publisher_id,
                    "website_id" => $transaction->website_id,
                    "amount" => $saleAmount,
                    "commission_amount" => $commissionAmount,
                    "commission_percentage" => $staticCommission,
                    "lc_commission_amount" => "0.{$staticCommission}" * $commissionAmount,
                    "status" => PaymentHistory::PENDING,
                    "is_new_invoice" => PaymentHistory::INVOICE_NEW,
                ]);

                PaymentMethodHistory::create([
                    "payment_history_id" => $history->id,
                    "user_id" => $transaction->publisher_id,
                    "website_id" => $transaction->website_id,
                    "payment_frequency" => $payment->payment_frequency ?? null,
                    "payment_threshold" => $payment->payment_threshold ?? null,
                    "payment_method" => $payment->payment_method ?? null,
                    "bank_location" => $payment->bank_location ?? null,
                    "account_holder_name" => $payment->account_holder_name ?? null,
                    "bank_account_number" => $payment->bank_account_number ?? null,
                    "bank_code" => $payment->bank_code ?? null,
                    "account_type" => $payment->account_type ?? null,
                    "paypal_country" => $payment->paypal_country ?? null,
                    "paypal_holder_name" => $payment->paypal_holder_name ?? null,
                    "paypal_email" => $payment->paypal_email ?? null,
                    "payoneer_holder_name" => $payment->payoneer_holder_name ?? null,
                    "payoneer_email" => $payment->payoneer_email ?? null,
                    "status" => PaymentMethodHistory::PENDING
                ]);
            }

        }

        if($paymentID)
        {
            Transaction::whereIn('transaction_id', is_array($payment->transaction_idz) ? $payment->transaction_idz : [$payment->transaction_idz])->update([
                'internal_payment_id' => $paymentID
            ]);
        }
    }
}
