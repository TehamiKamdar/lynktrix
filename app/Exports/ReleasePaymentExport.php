<?php

namespace App\Exports;

use App\Helper\Static\Vars;
use App\Models\City;
use App\Models\Country;
use App\Models\PaymentHistory;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ReleasePaymentExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $histories = PaymentHistory::select($this->getFields())
            ->rightJoin('websites', 'websites.id', '=', 'payment_histories.website_id')
             ->rightJoin('payment_method_histories', 'payment_method_histories.payment_history_id', '=', 'payment_histories.id')
            ->rightJoin('billings', 'billings.user_id', '=', 'payment_histories.publisher_id')
            ->where('payment_histories.status', 'paid')
            ->orderBy('payment_histories.paid_date', 'desc')
            ->get();

        $cities = City::whereIn('id', $histories->pluck('city')->unique())->get()->keyBy('id');
        $states = State::whereIn('id', $histories->pluck('state')->unique())->get()->keyBy('id');
        $countries = Country::whereIn('id', $histories->pluck('country')->unique())->get()->keyBy('id');

        return $histories->map(function ($history) use ($cities, $states, $countries) {
            $paymentDetails = $this->getPaymentDetails($history);
            $options = $this->getPaymentOptions($history);
            $amount = $this->getAmountToPay($history);
            $billingDetails = $this->getBillingDetails($history, $cities, $states, $countries);
            $date = Carbon::parse($history->created_at)->format('F Y');
            $description = "Commission payment upto {$date} for {$history->url}";

            return [
                'created_at' => Carbon::parse($history->created_at)->format('Y-m-d H:i:s a'),
                'paid_date' => Carbon::parse($history->paid_date)->format('Y-m-d H:i:s a'),
                'status' => $history->status,
                'publisher_domain' => $history->url ?? '-',
                'payment_method' => ucwords($history->payment_method ?? '-'),
                'payment_details' => $paymentDetails,
                'billing_details' => $billingDetails,
                'payment_option' => $options,
                'amount_to_pay' => $amount,
                'description' => $description,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Created At',
            'Paid Date',
            'Status',
            'Publisher Domain',
            'Payment Method',
            'Payment Details',
            'Billing Details',
            'Payment Option',
            'Amount To Pay',
            'Description',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'use_bom' => true,
        ];
    }

    private function getFields(): array
    {
        return [
            'payment_histories.id',
            'payment_histories.amount',
            'payment_histories.paid_date',
            'payment_histories.commission_amount',
            'payment_histories.lc_commission_amount',
            'payment_histories.is_new_invoice',
            'payment_histories.description',
            'payment_histories.created_at',
            'payment_histories.status',
            'websites.name as url',
            'payment_method_histories.account_holder_name',
            'payment_method_histories.bank_account_number',
            'payment_method_histories.account_type',
            'payment_method_histories.bank_code',
            'payment_method_histories.bank_location',
            'payment_method_histories.payment_method',
            'payment_method_histories.paypal_country',
            'payment_method_histories.paypal_holder_name',
            'payment_method_histories.paypal_email',
            'payment_method_histories.payoneer_holder_name',
            'payment_method_histories.payoneer_email',
            'payment_method_histories.payment_frequency',
            'payment_method_histories.payment_threshold',
            'billings.name as billing_name',
            'billings.phone',
            'billings.address',
            'billings.zip_code',
            'billings.country',
            'billings.state',
            'billings.city',
            'billings.company_registration_no',
            'billings.tax_vat_no',
        ];
    }

    private function getPaymentDetails($history): string
    {
        if ($history->payment_method == Vars::PAYPAL) {
            return "Country: {$history->fetchCountry->name}, Name: {$history->paypal_holder_name}, Email: {$history->paypal_email}";
        } elseif ($history->payment_method == Vars::PAYONEER) {
            return "Name: {$history->payoneer_holder_name}, Email: {$history->payoneer_email}";
        } elseif ($history->payment_method == Vars::BANK) {
            $location = $history->fetchBankLocation->name ?? '-';
            return "Account Holder Name: {$history->account_holder_name}, Account Number: {$history->bank_account_number}, Account Type: {$history->account_type}, Bank Code: {$history->bank_code}, Bank Location: {$location}";
        }
        return '-';
    }

    private function getPaymentOptions($history): string
    {
        if ($history->payment_frequency && $history->payment_threshold) {
            return '$' . $history->payment_threshold . ' ' . ucwords(str_replace('_', ' ', $history->payment_frequency));
        }
        return '-';
    }

    private function getAmountToPay($history): string
    {
        if ($history->is_new_invoice == PaymentHistory::INVOICE_NEW) {
            $cappedAmount = $history->payment_method == Vars::PAYONEER ? 20 : 30;
            $processingFees = min($history->lc_commission_amount * 0.02, $cappedAmount);
            $amount = $history->lc_commission_amount - $processingFees;
            return '$' . number_format($amount, 2);
        }
        return '$' . number_format($history->lc_commission_amount, 2);
    }

    private function getBillingDetails($history, $cities, $states, $countries): string
    {
        $details = [];

        if ($history->billing_name) $details[] = $history->billing_name;
        if ($history->phone) $details[] = $history->phone;
        if ($history->address) $details[] = $history->address;
        if ($history->city && isset($cities[$history->city])) $details[] = $cities[$history->city]->name;
        if ($history->state && isset($states[$history->state])) $details[] = $states[$history->state]->name;
        if ($history->country && isset($countries[$history->country])) $details[] = $countries[$history->country]->name;
        if ($history->zip_code) $details[] = $history->zip_code;

        return implode(', ', $details) ?: '-';
    }
}
