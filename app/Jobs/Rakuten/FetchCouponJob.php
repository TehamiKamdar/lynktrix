<?php

namespace App\Jobs\Rakuten;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\Coupon as CouponModel;
use App\Traits\JobTrait;
use App\Traits\RequestTrait;
use Illuminate\Bus\Batch;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Plugins\Rakuten\RakutenTrait;

class FetchCouponJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, RakutenTrait, RequestTrait;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return false
     */
    public function handle()
    {

    }
}
