<?php

namespace App\Traits\Publisher;

use App\Helper\Static\Methods;
use App\Models\Role;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

trait CommissionGraph
{

    public function getCommissions($user)
    {

        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

       
            $transactionsQuery = Transaction::selectRaw('SUM(commission_amount) as total_commission_amount, commission_status, commission_amount_currency');

            if($user->getAllowed())
            {
                $transactionsQuery->fetchPublisher(auth()->user());
            }

            return $transactionsQuery
                ->whereIn('commission_status', [Transaction::STATUS_PENDING, Transaction::STATUS_DECLINED, Transaction::STATUS_APPROVED])
                ->groupBy('commission_status')
                ->orderByDesc('total_commission_amount')
                ->get()
                ->toArray();
        
    }

    public function getCommissionPercentage($user, $status = null)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getCommissionPercentage{$userID}{$websiteID}{$status}", 60 * 60, function () use($user, $status) {

            $currentMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m'))->whereYear('transaction_date', date('Y'))
                ->select('commission_amount');

            $previousMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m', strtotime('-1 month')))
                ->select('commission_amount');

            if($user->getAllowed())
            {
                $currentMonthCommissionQuery->fetchPublisher($user);
                $previousMonthCommissionQuery->fetchPublisher($user);
            }

            if ($status) {
                $currentMonthCommissionQuery->where('commission_status', $status);
                $previousMonthCommissionQuery->where('commission_status', $status);
            }

            $currentMonthCommission = $currentMonthCommissionQuery->sum('commission_amount');
            $previousMonthCommission = $previousMonthCommissionQuery->sum('commission_amount');

            return Methods::returnPerGrowth($previousMonthCommission, $currentMonthCommission);

        });

    }

         public function getApprovedCommissionPercentage($user, $status = null)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;
        $status = 'approved';

        return Cache::remember("getApprovedCommissionPercentage{$userID}{$websiteID}{$status}", 60 * 60, function () use($user, $status) {

            $currentMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m'))->whereYear('transaction_date', date('Y'))
                ->select('commission_amount')->where('commission_status','approved');

            $previousMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m', strtotime('-1 month')))
                ->select('commission_amount')->where('commission_status','approved');

            if($user->getAllowed())
            {
                $currentMonthCommissionQuery->fetchPublisher($user);
                $previousMonthCommissionQuery->fetchPublisher($user);
            }

            if ($status) {
                $currentMonthCommissionQuery->where('commission_status', $status);
                $previousMonthCommissionQuery->where('commission_status', $status);
            }

            $currentMonthCommission = $currentMonthCommissionQuery->sum('commission_amount');
            $previousMonthCommission = $previousMonthCommissionQuery->sum('commission_amount');

            return Methods::returnPerGrowth($previousMonthCommission, $currentMonthCommission);

        });

    }

    public function getPendingCommissionPercentage($user, $status = null)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;
        $status = 'pending';

        return Cache::remember("getPendingCommissionPercentage{$userID}{$websiteID}{$status}", 60 * 60, function () use($user, $status) {

            $currentMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m'))->whereYear('transaction_date', date('Y'))
                ->select('commission_amount')->where('commission_status','pending');

            $previousMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m', strtotime('-1 month')))
                ->select('commission_amount')->where('commission_status','pending');

            if($user->getAllowed())
            {
                $currentMonthCommissionQuery->fetchPublisher($user);
                $previousMonthCommissionQuery->fetchPublisher($user);
            }

            if ($status) {
                $currentMonthCommissionQuery->where('commission_status', $status);
                $previousMonthCommissionQuery->where('commission_status', $status);
            }

            $currentMonthCommission = $currentMonthCommissionQuery->sum('commission_amount');
            $previousMonthCommission = $previousMonthCommissionQuery->sum('commission_amount');

            return Methods::returnPerGrowth($previousMonthCommission, $currentMonthCommission);

        });

    }


    public function getDeclinedCommissionPercentage($user, $status = null)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;
        $status = 'declined';

        return Cache::remember("getDeclinedCommissionPercentage{$userID}{$websiteID}{$status}", 60 * 60, function () use($user, $status) {

            $currentMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m'))->whereYear('transaction_date', date('Y'))
                ->select('commission_amount')->where('commission_status','declined');

            $previousMonthCommissionQuery = Transaction::whereMonth('transaction_date', date('m', strtotime('-1 month')))
                ->select('commission_amount')->where('commission_status','declined');

            if($user->getAllowed())
            {
                $currentMonthCommissionQuery->fetchPublisher($user);
                $previousMonthCommissionQuery->fetchPublisher($user);
            }

            if ($status) {
                $currentMonthCommissionQuery->where('commission_status', $status);
                $previousMonthCommissionQuery->where('commission_status', $status);
            }

            $currentMonthCommission = $currentMonthCommissionQuery->sum('commission_amount');
            $previousMonthCommission = $previousMonthCommissionQuery->sum('commission_amount');

            return Methods::returnPerGrowth($previousMonthCommission, $currentMonthCommission);

        });

    }

    public function setPerformanceCommission($user)
    {
        $totalCommission = $this->getTotalCommission($user);
        $dailyCurrentCommission = $this->getCurrentDailyCommission($user);
        $dailyCurrentCommission = array_values($dailyCurrentCommission);
        $dailyPreviousCommission = $this->getPreviousDailyCommission($user);
        $dailyPreviousCommission = array_values($dailyPreviousCommission);

        $getMinMaxCommission = array_filter(array_merge($dailyPreviousCommission, $dailyCurrentCommission));
        $minCommission = $getMinMaxCommission ? min($getMinMaxCommission) : 1;
        $maxCommission = $getMinMaxCommission ? floatval(max($getMinMaxCommission)) + 20 : 20;
        $commissionPercentage = $this->getCommissionPercentage($user);

        return [
            "count" => Methods::numberFormatShort($totalCommission),
            "min_value" => $minCommission,
            "max_value" => $maxCommission,
            "dailyCurrentMonth" => $dailyCurrentCommission,
            "dailyPreviousMonth" => $dailyPreviousCommission,
            ...$commissionPercentage
        ];
    }

          public function setApprovedPerformanceCommission($user)
    {
        $totalCommission = $this->getApprovedTotalCommission($user);
        $dailyCurrentCommission = $this->getApprovedCurrentDailyCommission($user);
        $dailyCurrentCommission = array_values($dailyCurrentCommission);
        $dailyPreviousCommission = $this->getApprovedPreviousDailyCommission($user);
        $dailyPreviousCommission = array_values($dailyPreviousCommission);

        $getMinMaxCommission = array_filter(array_merge($dailyPreviousCommission, $dailyCurrentCommission));
        $minCommission = $getMinMaxCommission ? min($getMinMaxCommission) : 1;
        $maxCommission = $getMinMaxCommission ? floatval(max($getMinMaxCommission)) + 20 : 20;
        $commissionPercentage = $this->getApprovedCommissionPercentage($user);

        return [
            "count" => Methods::numberFormatShort($totalCommission),
            "min_value" => $minCommission,
            "max_value" => $maxCommission,
            "dailyCurrentMonth" => $dailyCurrentCommission,
            "dailyPreviousMonth" => $dailyPreviousCommission,
            ...$commissionPercentage
        ];
    }

       public function setDeclinedPerformanceCommission($user)
    {
        $totalCommission = $this->getDeclinedTotalCommission($user);
        $dailyCurrentCommission = $this->getDeclinedCurrentDailyCommission($user);
        $dailyCurrentCommission = array_values($dailyCurrentCommission);
        $dailyPreviousCommission = $this->getDeclinedPreviousDailyCommission($user);
        $dailyPreviousCommission = array_values($dailyPreviousCommission);

        $getMinMaxCommission = array_filter(array_merge($dailyPreviousCommission, $dailyCurrentCommission));
        $minCommission = $getMinMaxCommission ? min($getMinMaxCommission) : 1;
        $maxCommission = $getMinMaxCommission ? floatval(max($getMinMaxCommission)) + 20 : 20;
        $commissionPercentage = $this->getDeclinedCommissionPercentage($user);

        return [
            "count" => Methods::numberFormatShort($totalCommission),
            "min_value" => $minCommission,
            "max_value" => $maxCommission,
            "dailyCurrentMonth" => $dailyCurrentCommission,
            "dailyPreviousMonth" => $dailyPreviousCommission,
            ...$commissionPercentage
        ];
    }

       public function setPendingPerformanceCommission($user)
    {
        $totalCommission = $this->getPendingTotalCommission($user);
        $dailyCurrentCommission = $this->getPendingCurrentDailyCommission($user);
        $dailyCurrentCommission = array_values($dailyCurrentCommission);
        $dailyPreviousCommission = $this->getPendingPreviousDailyCommission($user);
        $dailyPreviousCommission = array_values($dailyPreviousCommission);

        $getMinMaxCommission = array_filter(array_merge($dailyPreviousCommission, $dailyCurrentCommission));
        $minCommission = $getMinMaxCommission ? min($getMinMaxCommission) : 1;
        $maxCommission = $getMinMaxCommission ? floatval(max($getMinMaxCommission)) + 20 : 20;
        $commissionPercentage = $this->getPendingCommissionPercentage($user);

        return [
            "count" => Methods::numberFormatShort($totalCommission),
            "min_value" => $minCommission,
            "max_value" => $maxCommission,
            "dailyCurrentMonth" => $dailyCurrentCommission,
            "dailyPreviousMonth" => $dailyPreviousCommission,
            ...$commissionPercentage
        ];
    }



    public function getTotalCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getTotalCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactions = Transaction::query();
            if($user->getAllowed())
                $transactions->fetchPublisher(auth()->user());
            return $transactions->sum("commission_amount");
        });
    }

         public function getApprovedTotalCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getApprovedTotalCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactions = Transaction::query();
            if($user->getAllowed())
                $transactions->fetchPublisher(auth()->user());
            return $transactions->where('commission_status','approved')->sum("commission_amount");
        });
    }

     public function getPendingTotalCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getPendingTotalCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactions = Transaction::query();
            if($user->getAllowed())
                $transactions->fetchPublisher(auth()->user());
            return $transactions->where('commission_status','pending')->sum("commission_amount");
        });
    }

     public function getDeclinedTotalCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getDeclinedTotalCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactions = Transaction::query();
            if($user->getAllowed())
                $transactions->fetchPublisher(auth()->user());
            return $transactions->where('commission_status','declined')->sum("commission_amount");
        });
    }

    public function getCurrentDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

       
            $transactionsQuery = Transaction::query()
                ->selectRaw("SUM(commission_amount) as daily_commissions")
                ->selectRaw('DATE_FORMAT(transaction_date, "%d") as trans_date')
                ->whereYear('transaction_date', date('Y'))
                ->whereMonth('transaction_date', date('m'));

            if($user->getAllowed())
                $transactionsQuery->fetchPublisher(auth()->user());

            $transactions = $transactionsQuery
                ->groupByRaw("DATE_FORMAT(transaction_date, '%d-%m-%Y')")
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")
                ->toArray();

            $begin = new \DateTime(now()->format("Y-m-01 00:00:00"));
            $end = new \DateTime(now()->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $day = $dt->format("d");
                $transactions[$day] = number_format($transactions[$day] ?? 0, 2, '.', '');
            }

            ksort($transactions);

            return $transactions;


    }

         public function getApprovedCurrentDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getApprovedCurrentDailyCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactionsQuery = Transaction::query()
                ->selectRaw("SUM(commission_amount) as daily_commissions")
                ->selectRaw('DATE_FORMAT(transaction_date, "%d") as trans_date')
                ->whereYear('transaction_date', date('Y'))
                ->whereMonth('transaction_date', date('m'));

            if($user->getAllowed())
                $transactionsQuery->fetchPublisher(auth()->user());

            $transactions = $transactionsQuery->where('commission_status','approved')
                ->groupByRaw("DATE_FORMAT(transaction_date, '%d-%m-%Y')")
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")
                ->toArray();

            $begin = new \DateTime(now()->format("Y-m-01 00:00:00"));
            $end = new \DateTime(now()->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $day = $dt->format("d");
                $transactions[$day] = number_format($transactions[$day] ?? 0, 2, '.', '');
            }

            ksort($transactions);

            return $transactions;
        });

    }

     public function getPendingCurrentDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getPendingCurrentDailyCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactionsQuery = Transaction::query()
                ->selectRaw("SUM(commission_amount) as daily_commissions")
                ->selectRaw('DATE_FORMAT(transaction_date, "%d") as trans_date')
                ->whereYear('transaction_date', date('Y'))
                ->whereMonth('transaction_date', date('m'));

            if($user->getAllowed())
                $transactionsQuery->fetchPublisher(auth()->user());

            $transactions = $transactionsQuery->where('commission_status','pending')
                ->groupByRaw("DATE_FORMAT(transaction_date, '%d-%m-%Y')")
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")
                ->toArray();

            $begin = new \DateTime(now()->format("Y-m-01 00:00:00"));
            $end = new \DateTime(now()->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $day = $dt->format("d");
                $transactions[$day] = number_format($transactions[$day] ?? 0, 2, '.', '');
            }

            ksort($transactions);

            return $transactions;
        });

    }



     public function getDeclinedCurrentDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getDeclinedCurrentDailyCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {
            $transactionsQuery = Transaction::query()
                ->selectRaw("SUM(commission_amount) as daily_commissions")
                ->selectRaw('DATE_FORMAT(transaction_date, "%d") as trans_date')
                ->whereYear('transaction_date', date('Y'))
                ->whereMonth('transaction_date', date('m'));

            if($user->getAllowed())
                $transactionsQuery->fetchPublisher(auth()->user());

            $transactions = $transactionsQuery->where('commission_status','declined')
                ->groupByRaw("DATE_FORMAT(transaction_date, '%d-%m-%Y')")
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")
                ->toArray();

            $begin = new \DateTime(now()->format("Y-m-01 00:00:00"));
            $end = new \DateTime(now()->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $day = $dt->format("d");
                $transactions[$day] = number_format($transactions[$day] ?? 0, 2, '.', '');
            }

            ksort($transactions);

            return $transactions;
        });

    }

    public function getPreviousDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

      

            $transactions = Transaction::
            select(
                DB::raw("SUM(commission_amount) daily_commissions"),
                DB::raw('DATE_FORMAT(transaction_date, "%d") as trans_date')
            );

            $user = auth()->user();
            if($user->getAllowed())
                $transactions = $transactions->fetchPublisher(auth()->user());

            $subMonth = Methods::subMonths();
          
            $startOfMonth = $subMonth->copy()->startOfMonth();
            $endOfMonth = $subMonth->copy()->endOfMonth();
            $transactions = $transactions->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
                ->groupBy(DB::raw("DATE_FORMAT(transaction_date, '%d-%m-%Y')"))
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")->toArray();

            $begin = new \DateTime($subMonth->format("Y-m-01 00:00:00"));
            $end = new \DateTime($subMonth->format("Y-m-t 23:59:59"));
           
           
            $interval = \DateInterval::createFromDateString('1 day');
          
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                if(isset($transactions[$dt->format("d")]))
                {
                    $transactions[$dt->format("d")] = number_format($transactions[$dt->format("d")], 2, '.', '');
                }
                else
                {
                    $transactions[$dt->format("d")] = 0.00;
                }
            }

            ksort($transactions);

          
            return $transactions;

       
    }


         public function getApprovedPreviousDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getApprovedPreviousDailyCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {

            $transactions = Transaction::
            select(
                DB::raw("SUM(commission_amount) daily_commissions"),
                DB::raw('DATE_FORMAT(transaction_date, "%d") as trans_date')
            );

            $user = auth()->user();
            if($user->getAllowed())
                $transactions = $transactions->fetchPublisher(auth()->user());

            $subMonth = Methods::subMonths();

            $transactions = $transactions->whereMonth('transaction_date', $subMonth)->where('commission_status','approved')
                ->groupBy(DB::raw("DATE_FORMAT(transaction_date, '%d-%m-%Y')"))
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")->toArray();

            $begin = new \DateTime($subMonth->format("Y-m-01 00:00:00"));
            $end = new \DateTime($subMonth->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                if(isset($transactions[$dt->format("d")]))
                {
                    $transactions[$dt->format("d")] = number_format($transactions[$dt->format("d")], 2, '.', '');
                }
                else
                {
                    $transactions[$dt->format("d")] = 0.00;
                }
            }

            ksort($transactions);

            return $transactions;

        });
    }

     public function getPendingPreviousDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getPendingPreviousDailyCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {

            $transactions = Transaction::
            select(
                DB::raw("SUM(commission_amount) daily_commissions"),
                DB::raw('DATE_FORMAT(transaction_date, "%d") as trans_date')
            );

            $user = auth()->user();
            if($user->getAllowed())
                $transactions = $transactions->fetchPublisher(auth()->user());

            $subMonth = Methods::subMonths();

            $transactions = $transactions->whereMonth('transaction_date', $subMonth)->where('commission_status','pending')
                ->groupBy(DB::raw("DATE_FORMAT(transaction_date, '%d-%m-%Y')"))
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")->toArray();

            $begin = new \DateTime($subMonth->format("Y-m-01 00:00:00"));
            $end = new \DateTime($subMonth->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                if(isset($transactions[$dt->format("d")]))
                {
                    $transactions[$dt->format("d")] = number_format($transactions[$dt->format("d")], 2, '.', '');
                }
                else
                {
                    $transactions[$dt->format("d")] = 0.00;
                }
            }

            ksort($transactions);

            return $transactions;

        });
    }

     public function getDeclinedPreviousDailyCommission($user)
    {
        $userID = $user->id;
        $websiteID = $user->active_website_id ?? null;

        return Cache::remember("getDeclinedPreviousDailyCommission{$userID}{$websiteID}", 60 * 60, function () use($user) {

            $transactions = Transaction::
            select(
                DB::raw("SUM(commission_amount) daily_commissions"),
                DB::raw('DATE_FORMAT(transaction_date, "%d") as trans_date')
            );

            $user = auth()->user();
            if($user->getAllowed())
                $transactions = $transactions->fetchPublisher(auth()->user());

            $subMonth = Methods::subMonths();

            $transactions = $transactions->whereMonth('transaction_date', $subMonth)->where('commission_status','declined')
                ->groupBy(DB::raw("DATE_FORMAT(transaction_date, '%d-%m-%Y')"))
                ->orderBy('transaction_date')
                ->get()
                ->pluck("daily_commissions", "trans_date")->toArray();

            $begin = new \DateTime($subMonth->format("Y-m-01 00:00:00"));
            $end = new \DateTime($subMonth->format("Y-m-t 23:59:59"));

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                if(isset($transactions[$dt->format("d")]))
                {
                    $transactions[$dt->format("d")] = number_format($transactions[$dt->format("d")], 2, '.', '');
                }
                else
                {
                    $transactions[$dt->format("d")] = 0.00;
                }
            }

            ksort($transactions);

            return $transactions;

        });
    }


}
