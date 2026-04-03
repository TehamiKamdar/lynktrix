<?php

namespace App\Service\Admin\PaymentManagement;

use App\Models\PaymentHistory;
use App\Models\Transaction;
use App\Traits\Notification\Payment\Invoice;
use Illuminate\Http\Request;

class ReleasePaymentService
{
    use Invoice;
    public function init(Request $request)
    {
        $paymentID = $request->paymentID;
        $history = PaymentHistory::where('id', $paymentID)->first();
        Transaction::whereIn("transaction_id", $history->transaction_idz)->update([
            'payment_status' => Transaction::PAYMENT_STATUS_RELEASE_PAYMENT,
            'commission_status' => Transaction::STATUS_APPROVED
        ]);
        $history->update([
            'approver_id' => auth()->user()->id,
            'status' => PaymentHistory::PAID,
            'paid_date' => now()->format("Y-m-d H:i:s"),
            'description' => $request->comment,
            'transaction_id' => $request->transaction_id,
            'converted_amount' => $request->converted_amount
        ]);
        $this->inoviceNotification($history);
        $request->session()->flash('success', 'Thank you for the update! Payment status has been successfully updated.');
        return redirect()->back();
    }
}
