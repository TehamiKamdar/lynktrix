<?php

namespace App\Jobs;

use App\Models\Advertiser;
use App\Models\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

ini_set("memory_limit", "-1");

class LinkBuxJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const PID = "PB00020052";
    const ADVERTISERS = "Advertisers";
    const COUPONS = "Coupons";
    const TRANSACTIONS = "Transactions";
    const PAYMENTS = "Payments";

    protected mixed $data;
    protected string $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->type == self::ADVERTISERS)
            $this->createOrUpdateAdvertisers($this->data);

        if($this->type == self::COUPONS)
            $this->createOrUpdateCoupons($this->data);

        if($this->type == self::TRANSACTIONS)
            $this->createOrUpdateTransactions($this->data);

        if($this->type == self::PAYMENTS)
            $this->createOrUpdatePayments($this->data);
    }

    private function createOrUpdateAdvertisers($advertisers)
    {
        if(isset($advertisers[1]))
        {
            foreach ($advertisers[1]['list'] as $advertiser)
            {
                Advertiser::updateOrCreate(
                    ['advertiser_id' => $advertiser["mid"]],
                    [
                        "advertiser_id" => $advertiser["mid"],
                        "name" => $advertiser["merchant_name"],
                        "url" => $advertiser["site_url"],
                        "image" => $advertiser["logo"],
                        "categories" => $advertiser["categories"],
                        "country" => $advertiser["country"],
                        "comm_rate" => $advertiser["comm_rate"],
                        "comm_detail" => $advertiser["comm_detail"],
                        "affiliate_url" => $this->generateAffiliateURL(self::PID, $advertiser["mid"], $advertiser["site_url"], Str::uuid()->toString()),
                        "avg_payout" => $advertiser["avg_payout"],
                        "avg_payout_cycle" => $advertiser["avg_payment_cycle"],
                        "offer_type" => $advertiser["offer_type"],
                        "tags" => $advertiser["tags"],
                        "methods" => $advertiser["promotional_methods"],
                        "support_deeplink" => $advertiser["support_deeplink"] == "Y" ? 1 : 0
                    ]
                );
            }
        }
    }

    private function createOrUpdateCoupons($coupons)
    {
        if(isset($coupons[1]['data']))
        {
            foreach ($coupons[1]['data'] as $coupon)
            {
                Coupon::updateOrCreate(
                    ['coupon_id' => $coupon['coupon_id'], 'advertiser_id' => $coupon['mid']],
                    [
                        "coupon_id" => $coupon['coupon_id'],
                        "advertiser_id" => $coupon['mid'],
                        "advertiser_name" => $coupon['merchant_name'],
                        "image" => $coupon['logo'],
                        "coupon_name" => $coupon['coupon_name'],
                        "coupon_code" => $coupon['coupon_code'],
                        "discount" => $coupon['discount'],
                        "country" => $coupon['country'],
                        "begin_date" => $coupon['begin_date'],
                        "end_date" => $coupon['end_date'],
                        "category" => $coupon['category'],
                        "description" => $coupon['description']
                    ]
                );
            }
        }
    }

    private function createOrUpdateTransactions($advertisers)
    {

    }

    private function createOrUpdatePayments($advertisers)
    {

    }

    private function generateAffiliateURL($pid, $mid, $url, $uid)
    {
        $params = [
            "pid" => $pid,
            "mid" => $mid,
            "url" => $url,
            "uid" => $uid,
        ];
        $param = http_build_query($params);
        return "https://app.partnerboost.com/track?$param";
    }
}
