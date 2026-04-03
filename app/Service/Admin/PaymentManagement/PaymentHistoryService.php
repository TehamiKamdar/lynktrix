<?php

namespace App\Service\Admin\PaymentManagement;

use App\Models\PaymentHistory;

class PaymentHistoryService
{
    public function init($invoiceID)
    {
        $data = PaymentHistory::where('invoice_id', $invoiceID)->first();
        return view("template.admin.payments.update", compact("data"))->with(["id" => $invoiceID]);
    }

    public function update($request, $invoiceID)
    {
        try {

            PaymentHistory::where('invoice_id', $invoiceID)->update([
                "commission_amount" => $request->commission_amount,
                "lc_commission_amount" => $request->lc_commission_amount
            ]);

            $response = [
                "type" => "success",
                "message" => "Commission Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.payment-management.paymentHistoryByInvoice', ['id' => $invoiceID])->with($response['type'], $response['message']);

    }
}
