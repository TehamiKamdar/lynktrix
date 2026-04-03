<?php

namespace App\Service\Admin\PaymentManagement;

use App\Helper\Static\Vars;
use App\Models\PaymentHistory;
use App\Models\PaymentMethodHistory;
use App\Models\PaymentSetting;
use App\Models\Transaction;

class StatusService
{
    protected $messages = [];
    public function init($request)
    {
        $status = false;
        try {
            $paymentStatus = Transaction::PAYMENT_STATUS_REJECT;
            if($request->status == "confirm")
            {
                $paymentStatus = Transaction::PAYMENT_STATUS_CONFIRM;
            }
            elseif($request->status == "release")
            {
                $paymentStatus = Transaction::PAYMENT_STATUS_RELEASE;
                $this->makeHistory($request);
            }

            if(!empty($this->messages))
            {
                $request->session()->flash('error', implode("<br />", $this->messages));
            }
            else
            {
                if($request->status == "reject")
                {
                    foreach ($request->transaction_ids as $id)
                    {
                        $transaction = Transaction::where('id', $id)->first();
                        $data = [
                            'payment_status' => $paymentStatus
                        ];

                        if($transaction->commission_status == Transaction::STATUS_PENDING)
                            $data['commission_status'] = Transaction::STATUS_DECLINED;

                        $data['commission_amount'] = -$transaction->commission_amount;
                        $data['sale_amount'] = -$transaction->sale_amount;
                        $transaction->update($data);
                    }
                }
                else
                {
                    $data = [
                        'commission_status' => Transaction::STATUS_APPROVED,
                        'payment_status' => $paymentStatus
                    ];

                    Transaction::whereIn("id", $request->transaction_ids)->update($data);
                }
                $request->session()->flash('success', 'Thank you for the update! Payment status has been successfully updated.');
                $status = true;
            }
        } catch (\Exception $exception)
        {
            $request->session()->flash('error', $exception->getMessage());
        }

        return $status;
    }

    // ADD TRANSACTION LOOP
    private function makeHistory($request)
    {
        Transaction::whereIn('id', $request->transaction_ids)->chunk(Vars::LIMIT_20, function ($transactions) {
            foreach ($transactions as $transaction)
            {
                $payment = PaymentHistory::where([
                    "website_id" => $transaction->website_id,
                    "status" => PaymentHistory::PENDING
                ])->first();

                $staticCommission = Vars::COMMISSION_PERCENTAGE;

                if($payment)
                {
                    $paymentCheck = PaymentHistory::where("status", "paid")->where("transaction_idz", "LIKE", "%$transaction->transaction_id%")->count();
                    if($paymentCheck)
                    {
                        $this->messages[] = "Transaction ID: $transaction->transaction_id already paid.";
                    }
                    else
                    {
                        if(!in_array($transaction->transaction_id, $payment->transaction_idz))
                        {
                            $commissionAmount = $payment->commission_amount + $transaction->commission_amount;
                            $saleAmount = $payment->amount + $transaction->sale_amount;
                            $payment->update([
                                "transaction_idz" => array_unique(array_merge($payment->transaction_idz ?? [], [$transaction->transaction_id])),
                                "amount" => $saleAmount,
                                "commission_amount" => $commissionAmount,
                                "lc_commission_amount" => "0.{$staticCommission}" * $commissionAmount,
                                "commission_percentage" => $staticCommission,
                                "is_matched" => 0,
                            ]);
                        }

                    }
                }
                else
                {

                    $paymentCheck = PaymentHistory::where("status", "paid")->where("transaction_idz", "LIKE", "%$transaction->transaction_id%")->count();
                    if($paymentCheck)
                    {
                        $this->messages[] = "Transaction ID: $transaction->transaction_id already exist.";
                    }
                    else
                    {

                        $commissionAmount = $transaction->commission_amount;
                        $saleAmount = $transaction->sale_amount;

                        $payment = PaymentSetting::where("website_id", $transaction->website_id)->first();

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
            }
        });
    }
}
