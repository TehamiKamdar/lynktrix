<?php

namespace App\Console\Commands\Global;

use App\Helper\Static\Vars;
use App\Models\PaymentHistory;
use App\Models\PaymentMethodHistory;
use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncPaymentTotal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync-payment-total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Payment Total every 4 hours.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $payments = PaymentHistory::select('*')->where("is_matched", "0")->where('status','pending')->get();

        foreach ($payments as $payment)
        {

            $paymentsetting = PaymentMethodHistory::where('payment_history_id',$payment->id)->where('user_id',$payment->publisher_id)->first();
            $transaction = DB::table("transactions")
                ->select(DB::raw('SUM(sale_amount) as total_sale_amount,
                      SUM(commission_amount) as total_commission_amount,
                        count(*) as total_transactions'))
                ->whereIn("transaction_id", $payment->transaction_idz)->first();

            $commissionAmount = (float)$transaction->total_commission_amount;
            $saleAmount = (float)$transaction->total_sale_amount;
           $staticCommission = $payment->commission_percentage;
           $lccommission = "0.{$staticCommission}" * $commissionAmount;
           $minus = number_format($commissionAmount - $lccommission, 2) ?? 0;
           
             $payment->update([
                                "amount" => $saleAmount,
                                "commission_amount" => $commissionAmount,
                                "lc_commission_amount" => "0.{$staticCommission}" * $commissionAmount,
                                "commission_percentage" => $staticCommission,
                                "is_matched" => 1,
                            ]);
        }
    }
}
