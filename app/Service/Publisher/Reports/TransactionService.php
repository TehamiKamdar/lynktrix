<?php

namespace App\Service\Publisher\Reports;

use App\Enums\ExportType;
use App\Exports\TransactionExport;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\PaymentHistory;
use App\Models\Transaction;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TransactionService
{
    public function list(Request $request)
    {
        $limit = Vars::DEFAULT_PUBLISHER_TRANSACTION_PAGINATION;
        if(session()->has('publisher_transaction_limit')) {
            $limit = session()->get('publisher_transaction_limit');
        }

        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $message = $type = $countries = null;

        if ($websites) {

            $region = $request->region;

            $transactions = new Transaction();

            $transactions = $transactions->fetchPublisher(auth()->user());
           
            $transactionsCountry = clone $transactions;
            $countries = $transactionsCountry->select('advertiser_country')->groupBy('advertiser_country')->get();

            $startDate = $request->start_date ? "$request->start_date 00:00:00" : now()->format("Y-m-01 00:00:00");
            $endDate = $request->end_date ? "$request->end_date 23:59:59" : now()->format("Y-m-t 23:59:59");

            if ($request->search_by_name)
            {
                $transactions = $transactions->where(function ($query) use ($request) {
                    $query->orWhere("advertiser_name", "LIKE", "%{$request->search_by_name}%")
                        ->orWhere("external_advertiser_id", "LIKE", "%{$request->search_by_name}%")
                        ->orWhere("transaction_id", "LIKE", "%{$request->search_by_name}%");
                });
            }
           
            if(!$request->payment_id)
                $transactions = $transactions->whereBetween('transaction_date', [$startDate, $endDate]);
                
            if($request->section == Transaction::STATUS_PAID || $request->payment_id)
            {
                if($request->payment_id)
                {
                    $payment = PaymentHistory::select('transaction_idz')->find($request->payment_id);
                    $transactions = $transactions->whereIn("transaction_id", $payment->transaction_idz);


                    // Get the total commission and transaction data for the pending payment
                    $dbTransaction = DB::table("transactions")
                        ->select(DB::raw('SUM(sale_amount) as total_sale_amount,
                              SUM(commission_amount) as total_commission_amount,
                               SUM(old_commission_amount) as total_last_commission_amount,
                              count(*) as total_transactions'))
                        ->whereIn("transaction_id", $payment->transaction_idz) // Assuming transaction_idz is a comma-separated string
                        ->first();
                        
                }
                else
                {
                    $transactions = $transactions->whereIn('payment_status', [Transaction::PAYMENT_STATUS_RELEASE, Transaction::PAYMENT_STATUS_RELEASE_PAYMENT]);
                }
            }
            elseif ($request->section)
            {
                
$transactions = $transactions->where('commission_status', $request->section)->whereNotIn('payment_status', [Transaction::PAYMENT_STATUS_REJECT, Transaction::PAYMENT_STATUS_RELEASE, Transaction::PAYMENT_STATUS_RELEASE_PAYMENT]);
                
               
            }
           
            if($region && $region == "unknown")
            {
                $transactions = $transactions->whereNull("advertiser_country");
            }
            elseif ($region && $region != "all")
            {
                $transactions = $transactions->where('advertiser_country', 'LIKE', "%$region%");
            }
 
            $transactions = $transactions->orderBy("transaction_date", "DESC")->paginate($limit);
            if ($transactions->count() > 0) {
                foreach ($transactions as $transaction) {
                    $transactionId = $transaction->transaction_id;
                    $alreadyPaidCount = DB::selectOne("
                    SELECT COUNT(*) as count
                    FROM payment_histories
                    WHERE JSON_CONTAINS(transaction_idz, ?) AND status = 'paid'
                ", ['"' . $transactionId . '"'])->count;
                    $transaction->yespaid = $alreadyPaidCount >= 1 ? 1 : 0;
                }
            }
            
            $totalSaleAmount = $dbTransaction->sale_amount ?? $transactions->sum('sale_amount');
            $totalCommissionAmount = $dbTransaction->total_commission_amount ?? $transactions->sum('commission_amount');
            $totallastCommissionAmount = $dbTransaction->total_last_commission_amount ?? $transactions->sum('old_commission_amount');
            $total = $dbTransaction->total_transactions ?? $transactions->total();

        } else {

            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Report Transactions.";
            $type = "error";
            $transactions = [];
            $total = 0;
            $totalSaleAmount = 0;
            $totalCommissionAmount  = 0;
            $totallastCommissionAmount = 0;

        }

        $total = number_format($total);
       
        if ($request->ajax()) {
            $view = view("template.publisher.reports.transaction.list_view", compact('transactions', 'totalSaleAmount', 'totalCommissionAmount','totallastCommissionAmount'))->render();
            return response()->json(['total' => $total, 'html' => $view]);
        }

        if ($type && $message)
            Session::put($type, $message);
          
        return view("template.publisher.reports.transaction.list", compact('transactions', 'total', 'totalSaleAmount', 'totalCommissionAmount', 'countries','totallastCommissionAmount'));
    }

    public function export(ExportType $type, Request $request)
    {
        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        if ($websites) {

            $startDate = $request->start_date ?? now()->startOfMonth()->toDateTime();
            $endDate = $request->end_date ?? now()->endOfMonth()->toDateTime();
            $paymentID = $request->payment_id ?? '';

            $export = new TransactionExport($startDate, $endDate, $paymentID);

            if($paymentID)
                $filename = "transactions_{$paymentID}";

            else
                $filename = "transactions_{$startDate}_to_{$endDate}";

            if(ExportType::CSV == $type) {
                return Excel::download($export, "{$filename}.csv", \Maatwebsite\Excel\Excel::CSV);
            }
            elseif(ExportType::XLSX == $type) {
                return Excel::download($export, "{$filename}.xlsx");

            }
        }

        Session::put("high_priority_error", "Please verify your site. Then you will be export transactions data.");
        return redirect()->back();


    }

}
