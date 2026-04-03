<?php

namespace App\Http\Controllers\Publisher\Payments;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Service\Publisher\Payments\IndexService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected object $service;
    public function __construct(IndexService $service)
    {
        $this->service = $service;
    }
    public function actionPayment(Request $request)
    {
        return $this->service->list($request);
    }
    public function actionInvoice(PaymentHistory $paymentHistory)
    {
        return $this->service->invoice($paymentHistory);
    }
}
