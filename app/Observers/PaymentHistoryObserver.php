<?php

namespace App\Observers;

use App\Models\PaymentHistory;
use App\Models\Transaction;

class PaymentHistoryObserver
{
    public function creating($model)
    {
        $id = $this->generateBarcodeNumber();
        $model->payment_id = $id;
        $model->invoice_id = "LC-INV-{$id}";

        Transaction::whereIn('transaction_id', is_array($model->transaction_idz) ? $model->transaction_idz : [$model->transaction_idz])->update([
            'internal_payment_id' => $model->payment_id
        ]);
    }

    private function generateBarcodeNumber() {
        $number = mt_rand(10000000, 99999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->sidExists($number)) {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    private function sidExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return PaymentHistory::wherePaymentId($number)->exists();
    }
}
