<?php

namespace App\Console\Commands;

use App\Models\PaymentHistory;
use App\Models\Transaction;
use Illuminate\Console\Command;

class SetTransactionPaymentId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:payment_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $payments = PaymentHistory::where('status', 'paid')
    ->orderBy('paid_date', 'desc')
    ->get();

        foreach($payments as $payment){
            foreach($payment->transaction_idz as $transaction){
                   $transaction = Transaction::where('transaction_id',$transaction)->first();
                   if($transaction){
                      $this->info("payment_id");
                        $this->info($payment->payment_id);
                        $this->info("transaction_id");
                        $this->info($transaction->payment_id);
                    if(empty($transaction->payment_id) || $transaction->payment_id == 0){
                      
                         
                        $transaction->payment_id = $payment->payment_id;
                        $transaction->update();
                    }
                    if($transaction->transaction_id == '1858077268'){
                        $this->info($payment->payment_id);
                    }
                   }
            }
        }
    }
}
