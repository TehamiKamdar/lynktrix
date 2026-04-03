<?php

namespace App\Jobs\Temp;

use App\Helper\Static\Methods;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction as TransactionModel;

class Transaction2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data, $jobID, $isStatusChange;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->jobID = $data['job_id'];
        $this->isStatusChange = $data['is_status_change'];
        unset($data['job_id']);
        unset($data['is_status_change']);
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {

            foreach ($this->data as $transaction)
            {
                TransactionModel::where("id", $transaction['id'])->update([
                    "tmp_commission_amount" => $transaction['commission_amount'],
                    "tmp_sale_amount" => $transaction['sale_amount'],
                    "commission_amount" => $transaction['commission_amount'] - ($transaction['commission_amount'] * 0.02),
                    "sale_amount" => $transaction['sale_amount'] - ($transaction['sale_amount'] * 0.02)
                ]);
            }

            Methods::tryBodyFetchDaily($this->jobID, false);

        } catch (\Throwable $exception) {

            Methods::catchBodyFetchDaily("TEMP TRANSACTION JOB", $exception, $this->jobID);

        }
    }
}
