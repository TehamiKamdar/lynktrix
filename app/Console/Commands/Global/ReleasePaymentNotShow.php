<?php

namespace App\Console\Commands\Global;

use App\Models\PaymentHistory;
use App\Models\PaymentMethodHistory;
use App\Models\PaymentSetting;
use App\Helper\Static\Vars;
use App\Models\Transaction;
use App\Models\TransactionConversation;
use Illuminate\Console\Command;

class ReleasePaymentNotShow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:paymentmissing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
protected $messages = [];
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $transactions = Transaction::where('publisher_id','f4a9dbec-7608-4bdb-bac3-f529627b6faa')->where('commission_status','approved')->where('paid_to_publisher',1)->where('payment_status',3)->get();
        $this->info($transactions->count());
        $count = 0;
        foreach ($transactions as $transaction) {
        
    $payment = PaymentHistory::where('transaction_idz', 'like', '%' . $transaction->transaction_id . '%')->where('publisher_id','f4a9dbec-7608-4bdb-bac3-f529627b6faa')->where('status','paid')->first();

    if ($payment) {
        $count ++;
         $paymentStatus = Transaction::PAYMENT_STATUS_RELEASE;
                // $this->makeHistory($transaction);
    }

  

}
  $this->info("Total Duplicates Found: " . $count);
    }
     private function makeHistory($transaction)
    {
        Transaction::where('id', $transaction->transaction_id)->first();
            
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
}
