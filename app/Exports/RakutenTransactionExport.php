<?php

// app/Exports/RakutenTransactionExport.php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\PaymentHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class RakutenTransactionExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $start_date;
    protected $end_date;
    protected $paymentID;

    public function __construct(?string $start_date = null, ?string $end_date = null, ?string $paymentID = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->paymentID = $paymentID;
    }

    public function collection()
    {
        $query = Transaction::select(
            'transaction_date',
            'advertiser_name',
            'external_advertiser_id',
            'transaction_id',
            'publisher_id',
            'sale_amount_currency',
            'sale_amount',
            'commission_amount_currency',
            'commission_amount',
            'payment_status',
            'commission_status'
        )
        ->where('source', 'Rakuten');

        if ($this->paymentID) {
            $payment = PaymentHistory::select('transaction_idz')->find($this->paymentID);
            if ($payment && is_array($payment->transaction_idz)) {
                $query->whereIn('transaction_id', $payment->transaction_idz);
            }
        } elseif ($this->start_date && $this->end_date) {
            $query->whereBetween('transaction_date', [$this->start_date, $this->end_date]);
        }

        return $query->get()->map(function ($t) {
            return [
                $t->transaction_date,
                $t->advertiser_name,
                $t->external_advertiser_id,
                $t->publisher_id,
                $t->transaction_id,
                $t->sale_amount_currency . ' ' . $t->sale_amount,
                $t->commission_amount_currency . ' ' . $t->commission_amount,
                $this->resolveStatus($t),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Transaction Date',
            'Advertiser Name',
            'Advertiser ID',
            'Publisher ID',
            'Transaction ID',
            'Sale Amount',
            'Commission Amount',
            'Status',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '"',
            'use_bom' => false,
        ];
    }

    private function resolveStatus($transaction)
    {
        return match ($transaction->payment_status) {
            Transaction::PAYMENT_STATUS_RELEASE_PAYMENT, Transaction::PAYMENT_STATUS_CONFIRM => Transaction::STATUS_PAID,
            Transaction::PAYMENT_STATUS_RELEASE => str_replace('_', ' ', Transaction::STATUS_PENDING_PAID),
            default => match ($transaction->commission_status) {
                Transaction::STATUS_PENDING => Transaction::STATUS_PENDING,
                Transaction::STATUS_HOLD => Transaction::STATUS_HOLD,
                Transaction::STATUS_APPROVED => Transaction::STATUS_APPROVED,
                Transaction::STATUS_PAID => Transaction::STATUS_PAID,
                Transaction::STATUS_DECLINED => Transaction::STATUS_DECLINED,
                default => null,
            },
        };
    }
}

