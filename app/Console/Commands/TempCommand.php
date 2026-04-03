<?php

namespace App\Console\Commands;

use App\Models\DeeplinkTracking;
use App\Models\DeeplinkTrackingCode;
use App\Models\DelDeeplinkTracking;
use App\Models\DelTracking;
use App\Models\GenerateTrackingCode;
use App\Models\PaymentHistory;
use App\Models\Setting;
use App\Models\Tracking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TempCommand extends Command
{
    protected $count = 0;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:temp-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Temp Command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $this->processPendingPayments();
        $this->setPaymentCommissionAmount();
    }


        function setPaymentCommissionAmount(){
              $payment = PaymentHistory::where('status', 'pending')->where('payment_id', 18505642)->first();
               if ($payment) {
            // Get the total commission and transaction data for the pending payment
            $transaction = DB::table("transactions")
                ->select(DB::raw('SUM(sale_amount) as total_sale_amount,
                              SUM(commission_amount) as total_commission_amount,
                              count(*) as total_transactions'))
                ->whereIn("transaction_id", $payment->transaction_idz) // Assuming transaction_idz is a comma-separated string
                ->first();

                $payment->amount = $transaction->total_sale_amount;
                $payment->commission_amount = $transaction->total_commission_amount;
                $payment->lc_commission_amount = (float)$transaction->total_commission_amount * 0.8;
                $payment->update();
               }
        }
    function processPendingPayments()
    {
        // Get the first pending payment record
        $payment = PaymentHistory::where('status', PaymentHistory::PAID)->where('is_matched', 0) // Assuming a status column to track pending payments
                                    ->orderBy('paid_date', 'DESC')
                                    ->first();

        // If a pending payment exists
        if ($payment) {
            // Get the total commission and transaction data for the pending payment
            $transaction = DB::table("transactions")
                ->select(DB::raw('SUM(sale_amount) as total_sale_amount,
                              SUM(commission_amount) as total_commission_amount,
                              count(*) as total_transactions'))
                ->whereIn("transaction_id", $payment->transaction_idz) // Assuming transaction_idz is a comma-separated string
                ->first();

            $condition = $transaction->total_commission_amount != $payment->commission_amount;
            $this->info("TRANSACTION COMMISSION: {$transaction->total_commission_amount}");
            $this->info("PAYMENTS COMMISSION: {$payment->commission_amount}");
            $this->info("CHECK CONDITION: {$condition}");

            // Check if the total_commission_amount doesn't match the payment's commission_amount
            if ($condition) {
                // Get the list of transaction IDs
                $transactionIds = $payment->transaction_idz;

                // Calculate the remaining difference between payment's commission_amount and the current total_commission_amount
                $difference = $payment->commission_amount - $transaction->total_commission_amount;

                if ($difference > 0) {
                    // Loop through each transaction and update commission_amount if necessary
                    foreach ($transactionIds as $transactionId) {

                        $this->info("TRANSACTION ID: {$transactionId}");

                        // Fetch the individual transaction
                        $singleTransaction = DB::table('transactions')
                            ->where('transaction_id', $transactionId)
                            ->first();

                        if ($singleTransaction) {
                            // Check if this transaction's commission_amount is less than its sale_amount
                            if ($singleTransaction->commission_amount < $singleTransaction->sale_amount) {
                                // Calculate the increment, but make sure the commission_amount does not exceed sale_amount
                                $increment = min(
                                    $difference / count($transactionIds),
                                    $singleTransaction->sale_amount - $singleTransaction->commission_amount
                                );

                                // Update the commission_amount for this transaction
                                DB::table('transactions')
                                    ->where('transaction_id', $transactionId)
                                    ->increment('commission_amount', $increment);

                                // Reduce the remaining difference
                                $difference -= $increment;

                                // Break if the difference is now 0
                                if ($difference <= 0) {
                                    break;
                                }
                            }
                        }
                    }
                }

                // Fetch the updated total commission amount after making changes
                $updatedTransaction = DB::table("transactions")
                    ->select(DB::raw('SUM(sale_amount) as total_sale_amount,
                                  SUM(commission_amount) as total_commission_amount,
                                  count(*) as total_transactions'))
                    ->whereIn("transaction_id", $payment->transaction_idz)
                    ->first();

                // If the amounts still do not match, re-run the function to keep processing
                if (($updatedTransaction->total_commission_amount != $payment->commission_amount) && $difference > 0) {
                    // Call the function again for further processing
                    $this->processPendingPayments();
                } else {
                    // Mark the payment as processed once the amounts match
                    $payment->is_matched = 1;
                    $payment->save();
                }
            } else {
                // Mark the payment as processed if the amounts already match
                $payment->is_matched = 1;
                $payment->save();
            }
        }
    }

}
