<?php

namespace App\Traits\Publisher;

use App\Models\AdvertiserApply;
use App\Models\PaymentHistory;
use App\Models\Role;
use App\Models\Transaction;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

trait PerformanceGraph
{

    public function getPerformanceOverview($user)
    {
        return [
            "commission" => $this->setPerformanceCommission($user),
            "approved" => $this->setApprovedPerformanceCommission($user),
            "pending" => $this->setPendingPerformanceCommission($user),
            "declined" => $this->setDeclinedPerformanceCommission($user),
            "transaction" => $this->setPerformanceTransaction($user),
            "sale" => $this->setPerformanceSale($user),
            "extra" => [
                "labels" => $this->getDays()
            ]
        ];
    }

    public function getPerformanceClickOverview($user)
    {
        return [
            "click" => $this->setPerformanceClick($user),
            "extra" => [
                "labels" => $this->getDays()
            ]
        ];
    }

    public function getAccountSummary($user, $advertiserData)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;
       

            $accountSummary = AdvertiserApply::select('status', DB::raw('count(*) as total'));

            if($user->getAllowed())
                $accountSummary = $accountSummary->where('publisher_id', $userID)->where("website_id", $websiteID);

            $accountSummary = $accountSummary->groupBy("status")->get()->toArray();

            if(!in_array('joined', array_column($accountSummary, 'status')))
            {
                $accountSummary[] = [
                    'status' => 'joined',
                    'total' => 0
                ];
            }
            if(!in_array('pending', array_column($accountSummary, 'status')))
            {
                $accountSummary[] = [
                    'status' => 'pending',
                    'total' => 0
                ];
            }
            if(!in_array('hold', array_column($accountSummary, 'status')))
            {
                $accountSummary[] = [
                    'status' => 'hold',
                    'total' => 0
                ];
            }
            if(!in_array('rejected', array_column($accountSummary, 'status')))
            {
                $accountSummary[] = [
                    'status' => 'rejected',
                    'total' => 0
                ];
            }

            if($user->getAllowed())
            {
                $accountSummary[] = [
                    'status' => 'not joined',
                    'total' => $advertiserData['count'] - (array_sum(array_column($accountSummary, 'total')))
                ];
            }

            asort($accountSummary);

            return $accountSummary;
      
    }

    public function earningOverview($user, $earningOverviews)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;
       
            $earningOverviewsList = [];
            foreach ($earningOverviews as $earningOverview)
            {
                if($earningOverview['commission_status'] == Transaction::STATUS_PENDING) {
                    $earningOverview = array_merge($earningOverview, $this->getCommissionPercentage($user, Transaction::STATUS_PENDING));
                }
                elseif($earningOverview['commission_status'] == Transaction::STATUS_APPROVED) {
                    $earningOverview = array_merge($earningOverview, $this->getCommissionPercentage($user, Transaction::STATUS_APPROVED));
                }
                elseif($earningOverview['commission_status'] == Transaction::STATUS_DECLINED) {
                    $earningOverview = array_merge($earningOverview, $this->getCommissionPercentage($user, Transaction::STATUS_DECLINED));
                }
                $earningOverviewsList[$earningOverview['commission_status']] = $earningOverview;
            }
            $payment = new PaymentHistory();
            if($user->getAllowed())
            {
                $userPaymentpaid = $payment->where("status", PaymentHistory::PAID)->fetchPublisher($user)->get();
                if($userPaymentpaid->count() > 0){
                    $transactionCommissionpaids = 0;
                     foreach($userPaymentpaid as $pay){
                        $transactionCommissionpaid = Transaction::whereIn('transaction_id',$pay->transaction_idz)->sum("commission_amount");
                        $transactionCommissionpaids +=  $transactionCommissionpaid;
                     }
                $earningOverviewsList['paid_status'] = $transactionCommissionpaids; 
                    }
                $userPaymentpending = $payment->where("status", PaymentHistory::PENDING)->fetchPublisher($user)->get();
                if($userPaymentpending->count() > 0){
                    $transactionCommissionpendings = 0;
                     foreach($userPaymentpending as $pay){
                        $transactionCommissionpending = Transaction::whereIn('transaction_id',$pay->transaction_idz)->sum("commission_amount");
                        $transactionCommissionpendings +=  $transactionCommissionpending;
                     }
                $earningOverviewsList['pending_status'] = $transactionCommissionpendings;
                }
            }
            else
            {
                $earningOverviewsList['paid_status'] = $payment->where("status", PaymentHistory::PAID)->sum("commission_amount");
                $earningOverviewsList['peending_status'] = $payment->where("status", PaymentHistory::PENDING)->sum("commission_amount");
            }

           
            return $earningOverviewsList;
        
    }

    private function getDays()
    {
        $days = [];
        for ($i = 1; $i <= 31; $i++) {
            // Perform action here, such as echoing the current value of $i
            $days[] = $i;
        }
        return $days;
    }

    private function getMonths($startDate, $endDate)
    {
        $begin = new \DateTime($startDate);
        $end = new \DateTime($endDate);

        $interval = \DateInterval::createFromDateString('1 Month');
        $period = new \DatePeriod($begin, $interval, $end);

        $months = [];
        foreach ($period as $dt) {
            $months[] = $dt->format("M");
        }
        return $months;
    }

}
