<?php

namespace App\Service\Admin\Transactions;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportService
{
    public function init()
    {
        return view("template.admin.transactions.data-export");
    }

    public function export(Request $request)
    {
        $date = explode(" - ", $request->date);

        $startDate = Carbon::parse($date[0])->format("Y-m-d");
        $endDate = Carbon::parse($date[1])->format("Y-m-d");

        $transactions = Transaction::select(
            'advertiser_name',
            'customer_country',
            'source',
            DB::raw('
                    COUNT(id) as total_transactions,
                    SUM(CASE WHEN commission_status = "pending" THEN 1 ELSE 0 END) AS pending_transactions,
                    SUM(CASE WHEN commission_status IN ("approved","approved_but_stalled") THEN 1 ELSE 0 END) AS approved_transactions,
                    SUM(CASE WHEN commission_status IN ("declined","deleted") THEN 1 ELSE 0 END) AS declined_transactions,
                    SUM(commission_amount) as total_commission,
                    SUM(CASE WHEN commission_status IN ("approved","approved_but_stalled") THEN commission_amount ELSE 0 END) AS approved_commission,
                    SUM(CASE WHEN commission_status = "pending" THEN commission_amount ELSE 0 END) AS pending_commission,
                    SUM(CASE WHEN commission_status IN ("declined","deleted") THEN commission_amount ELSE 0 END) AS decline_commission,
                    SUM(CASE WHEN commission_status IN ("declined","deleted") THEN commission_amount ELSE 0 END) / SUM(commission_amount) * 100 AS decline_ratio,
                    (SUM(CASE WHEN commission_status IN ("declined", "deleted") THEN 1 ELSE 0 END) / COUNT(id)) * 100 AS decline_ratio
                ')
            )
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->groupBy('advertiser_name')
            ->orderBy('advertiser_name')
            ->get();

        $csvData = "Brand Name,Region,Network,Total Commission,Pending Commission,Approved Commission,Decline Commission,Decline Ratio,Transactions Count,Pending Transactions,Approved Transactions,Declined Transactions,Decline Count Ratio\n";

        foreach ($transactions as $transaction) {
            $advertiserName = str_replace(",", "", $transaction->advertiser_name);
            $region = $transaction->customer_country ?? "-";
            $csvData .= "{$advertiserName},{$region},{$transaction->source},{$transaction->total_commission},{$transaction->pending_commission},{$transaction->approved_commission},{$transaction->decline_commission},{$transaction->decline_ratio},{$transaction->total_transactions},{$transaction->pending_transactions},{$transaction->approved_transactions},{$transaction->declined_transactions},{$transaction->decline_ratio}\n";
        }

        $filename = "{$startDate}-{$endDate}.csv";

        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
