<?php

namespace App\Service\Publisher\Reports;

use App\Enums\ExportType;
use App\Exports\PerformanceExport;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Website;
use App\Traits\Publisher\ClickGraph;
use App\Traits\Publisher\CommissionGraph;
use App\Traits\Publisher\CustomClickGraph;
use App\Traits\Publisher\CustomCommissionGraph;
use App\Traits\Publisher\CustomPerformanceClickGraph;
use App\Traits\Publisher\CustomPerformanceGraph;
use App\Traits\Publisher\CustomSalesGraph;
use App\Traits\Publisher\CustomTransactionGraph;
use App\Traits\Publisher\PerformanceGraph;
use App\Traits\Publisher\SalesGraph;
use App\Traits\Publisher\TransactionGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PerformanceTransactionService
{

    use CommissionGraph, CustomCommissionGraph, TransactionGraph, CustomTransactionGraph, PerformanceGraph, CustomPerformanceGraph, SalesGraph, CustomSalesGraph;

    public function list(Request $request)
    {
        $user = auth()->user();
       
        $websites = Website::withAndWhereHas('users', function($query) use ($user) {
            return $query->where("id", $user->id);
        })->where("status", Website::ACTIVE)->count();

        $url = route("publisher.profile.websites.index");

        if($websites == 0)
            Session::put("error", "Please go to <a href='{$url}'>website settings</a> and verify your site to view Report Performance.");

        if($user->status == "active" && $websites) {

            if($request->start_date && $request->end_date) {
               
                $performanceOverview = $this->getCustomPerformanceOverview($request);
            } else {
                $performanceOverview = $this->getPerformanceOverview($user);
            }
            $earningPerformanceList = $this->getEarningPerformanceList($request);
        }

        $performanceOverview = $performanceOverview ?? [];
        $performanceOverviewList = $earningPerformanceList['earning'] ?? [];
        $performanceOverviewList2 = [];

        $total = $earningPerformanceList['total'] ?? 0;
        $total2 = $conversionPerformanceList['total'] ?? 0;
        $countries = $earningPerformanceList['countries'] ?? [];

        if($request->ajax())
        {
            $view = view("template.publisher.widgets.section_performance_overview", compact('performanceOverview'))->render();
            $view2 = view("template.publisher.reports.performance.transaction.list_view", compact('performanceOverviewList'))->render();
            return response()->json(['total' => $total, 'total2' => $total2, 'html' => $view, 'html_2' => $view2, 'performanceOverview' => $performanceOverview]);
        }

        return view("template.publisher.reports.performance.transaction.list", compact('performanceOverview','performanceOverviewList', 'performanceOverviewList2', 'total', 'total2', 'countries'));

    }

//    private function getPerformanceList(Request $request)
//    {
//        $limit = Vars::DEFAULT_PUBLISHER_PERFORMANCE_PAGINATION;
//        if(session()->has('publisher_performance_limit')) {
//            $limit = session()->get('publisher_performance_limit');
//        }
//
//        $websites = Website::withAndWhereHas('users', function($user) {
//            return $user->where("id", auth()->user()->id);
//        })->where("status", Website::ACTIVE)->count();
//
//        $message = $type = null;
//
//        if($websites) {
//
//            $sortBy = $request->sort;
//
//            $startDate = $request->start_date ? "$request->start_date 00:00:00" : now()->format("Y-m-01 00:00:00");
//            $endDate = $request->end_date ? "$request->end_date 23:59:59" : now()->format("Y-m-t 23:59:59");
//
//            $user = auth()->user();
//
//            $transactions = DB::table("tracking_details")
//                ->leftJoin('advertisers', 'advertisers.id', 'tracking_details.advertiser_id')
//                ->leftJoin('transactions', 'transactions.internal_advertiser_id', 'tracking_details.advertiser_id')
//                ->select(
//                    DB::raw("(SELECT count(*) FROM tracking_details as td
//                      WHERE tracking_details.advertiser_id = td.advertiser_id
//                      AND publisher_id='{$user->id}' AND website_id='{$user->active_website_id}' AND created_at BETWEEN '{$startDate}' AND '{$endDate}'
//                    ) as total_clicks"),
//                    DB::raw("(SELECT count(*) FROM transactions
//                      WHERE transactions.internal_advertiser_id = tracking_details.advertiser_id
//                      AND publisher_id='{$user->id}' AND website_id='{$user->active_website_id}' AND transaction_date BETWEEN '{$startDate}' AND '{$endDate}'
//                    ) as total_transactions"),
//                    DB::raw("(SELECT SUM(transactions.commission_amount) FROM transactions
//                      WHERE transactions.internal_advertiser_id = tracking_details.advertiser_id
//                      AND publisher_id='{$user->id}' AND website_id='{$user->active_website_id}' AND transaction_date BETWEEN '{$startDate}' AND '{$endDate}'
//                    ) as total_commission_amount"),
//                    DB::raw("(SELECT SUM(transactions.sale_amount) FROM transactions
//                      WHERE transactions.internal_advertiser_id = tracking_details.advertiser_id
//                      AND publisher_id='{$user->id}' AND website_id='{$user->active_website_id}' AND transaction_date BETWEEN '{$startDate}' AND '{$endDate}'
//                    ) as total_sale_amount"),
//                    'tracking_details.advertiser_id', 'transactions.external_advertiser_id',
//                    'transactions.internal_advertiser_id', 'transactions.commission_amount_currency',
//                    'transactions.sale_amount_currency', 'advertisers.name', 'advertisers.sid', 'transactions.transaction_id'
//                )
//                ->where("tracking_details.publisher_id", $user->id);
//
//            if($request->start_date && $request->end_date)
//                $transactions = $transactions
//                    ->whereBetween('transactions.transaction_date', [$startDate, $endDate]);
//
//            else
//                $transactions = $transactions
//                    ->whereBetween('tracking_details.created_at', [$startDate, $endDate]);
//
//            $searchByName = $request->search_by_name;
//            if($searchByName)
//            {
//                $transactions = $transactions->where(function ($query) use ($searchByName) {
//                    $query->orWhere('advertisers.name', 'LIKE', "%$searchByName%")
//                        ->orWhere('transactions.external_advertiser_id', 'LIKE', "%$searchByName%");
//                });
//            }
//
//            $transactions = $transactions->groupBy('tracking_details.advertiser_id');
//
//            if($sortBy && $sortBy != "advertiser")
//            {
//                if($sortBy == "sale") {
//                    $transactions = $transactions->orderBy("total_sale_amount", "DESC");
//                }
//                elseif($sortBy == "commission") {
//                    $transactions = $transactions->orderBy("total_commission_amount", "DESC");
//                }
//                elseif($sortBy == "clicks") {
//                    $transactions = $transactions->orderBy("total_clicks", "DESC");
//                }
//                elseif($sortBy == "transactions") {
//                    $transactions = $transactions->orderBy("total_transactions", "DESC");
//                }
//            } else {
//                $transactions = $transactions->orderBy("transactions.advertiser_name", "ASC");
//            }
//
//            $transactions = $transactions->paginate($limit);
//
//            $total = $transactions->total();
//
//        }
//        else {
//
//            $url = route("publisher.profile.websites.index");
//            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Report Performance.";
//            $type = "error";
//            $transactions = [];
//            $total = 0;
//
//        }
//
//        if($type && $message)
//            Session::put($type, $message);
//
//        return [
//            "transactions" => $transactions,
//            "total" => $total,
//            "message" => $message,
//            "type" => $type
//        ];
//    }

    private function getEarningPerformanceList(Request $request)
    {
        $limit = Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
        if(session()->has('publisher_earning_performance_limit')) {
            $limit = session()->get('publisher_earning_performance_limit');
        }

        $websites = Website::withAndWhereHas('users', function($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $message = $type = $countries = null;

        if($websites) {

            $sortBy = $request->earning_sort;
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $searchByName = $request->earning_search;
            $region = $request->region;

            $startDate = $startDate ? "$startDate 00:00:00" : now()->format("Y-m-01 00:00:00");
            $endDate = $endDate ? "$endDate 23:59:59" : now()->format("Y-m-t 23:59:59");

            $user = auth()->user();

            $transactions = DB::table("transactions")
                ->select(
                    DB::raw('SUM(sale_amount) as total_sale_amount,
                        SUM(commission_amount) as total_commission_amount,
                        count(*) as total_transactions'),
                    'advertiser_id', 'transactions.external_advertiser_id',
                    'internal_advertiser_id', 'commission_amount_currency',
                    'sale_amount_currency', 'transaction_id', 'advertiser_name'
                )
                ->where("publisher_id", $user->id)
                ->where('website_id', $user->active_website_id)->where('source','!=','Rakuten');

            $transactionsCountry = clone $transactions;
            $countries = $transactionsCountry->select('advertiser_country')->groupBy('advertiser_country')->get();

            if($searchByName)
            {
                $transactions = $transactions->where(function ($query) use ($searchByName) {
                    $query->orWhere('advertiser_name', 'LIKE', "%$searchByName%")
                        ->orWhere('external_advertiser_id', 'LIKE', "%$searchByName%");
                });
            }

            $transactions = $transactions->whereBetween('transaction_date', [$startDate, $endDate]);

            if($region && $region == "unknown")
            {
                $transactions = $transactions->whereNull("advertiser_country");
            }
            elseif ($region && $region != "all")
            {
                $transactions = $transactions->where('advertiser_country', 'LIKE', "%$region%");
            }

            $transactions = $transactions->groupBy('external_advertiser_id');

            if($sortBy && $sortBy != "advertiser")
            {
                if($sortBy == "sale") {
                    $transactions = $transactions->orderBy("total_sale_amount", "DESC");
                }
                elseif($sortBy == "commission") {
                    $transactions = $transactions->orderBy("total_commission_amount", "DESC");
                }
                elseif($sortBy == "transactions") {
                    $transactions = $transactions->orderBy("total_transactions", "DESC");
                }
            } else {
                $transactions = $transactions->orderBy("advertiser_name", "ASC");
            }

            $transactions = $transactions->paginate($limit, ['*'], 'earning_page');

            $total = $transactions->total();

        }
        else {

            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Report Performance.";
            $type = "error";
            $transactions = [];
            $total = 0;

        }

        if($type && $message)
            Session::put($type, $message);

        return [
            "earning" => $transactions,
            "total" => $total,
            "message" => $message,
            "type" => $type,
            "countries" => $countries
        ];
    }

    private function getConversionPerformanceList(Request $request)
    {
        $limit = Vars::DEFAULT_PUBLISHER_CONVERSION_PERFORMANCE_PAGINATION;
        if(session()->has('publisher_conversion_performance_limit')) {
            $limit = session()->get('publisher_conversion_performance_limit');
        }

        $websites = Website::withAndWhereHas('users', function($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $message = $type = null;

        if($websites) {

            $sortBy = $request->conversion_sort;
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $searchByName = $request->conversion_search;

            $startDate = $startDate ? "$startDate 00:00:00" : now()->format("Y-m-01 00:00:00");
            $endDate = $endDate ? "$endDate 23:59:59" : now()->format("Y-m-t 23:59:59");

            $user = auth()->user();

            $transactions = DB::table("tracking_details")
                ->leftJoin('advertisers', 'advertisers.id', 'tracking_details.advertiser_id')
                ->select(
                    DB::raw('count(*) as total_clicks'),
                    DB::raw("(SELECT count(*) FROM transactions
                      WHERE transactions.internal_advertiser_id = tracking_details.advertiser_id
                      AND publisher_id='{$user->id}' AND website_id='{$user->active_website_id}' AND transaction_date BETWEEN '{$startDate}' AND '{$endDate}'
                    ) as total_transactions"),
                    'tracking_details.advertiser_id', 'advertisers.name', 'advertisers.sid'
                )
                ->where("tracking_details.publisher_id", $user->id);

            $transactions = $transactions
                ->whereBetween('tracking_details.created_at', [$startDate, $endDate]);

            if($searchByName)
            {
                $transactions = $transactions->where(function ($query) use ($searchByName) {
                    $query->orWhere('advertisers.name', 'LIKE', "%$searchByName%");
                });
            }

            $transactions = $transactions->groupBy('tracking_details.advertiser_id');

            if($sortBy && $sortBy != "advertiser")
            {
                if($sortBy == "clicks") {
                    $transactions = $transactions->orderBy("total_clicks", "DESC");
                }
                elseif($sortBy == "transactions") {
                    $transactions = $transactions->orderBy("total_transactions", "DESC");
                }
            } else {
                $transactions = $transactions->orderBy("advertisers.name", "ASC");
            }

            $transactions = $transactions->paginate($limit, ['*'], 'conversion_page');

            $total = $transactions->total();

        }
        else {

            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Report Performance.";
            $type = "error";
            $transactions = [];
            $total = 0;

        }

        if($type && $message)
            Session::put($type, $message);

        return [
            "conversion" => $transactions,
            "total" => $total,
            "message" => $message,
            "type" => $type,
        ];
    }

    public function export(ExportType $type, Request $request)
    {
        $startDate = $request->start_date ?? now()->format("Y-m-01 00:00:00");
        $endDate = $request->end_date ?? now()->format("Y-m-t 23:59:59");

        if(ExportType::CSV == $type)
            return Excel::download(new PerformanceExport($startDate, $endDate), 'transactions.csv');
        elseif(ExportType::XLSX == $type)
            return Excel::download(new PerformanceExport($startDate, $endDate), 'transactions.xlsx');
    }

}
