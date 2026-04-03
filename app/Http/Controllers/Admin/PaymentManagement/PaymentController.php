<?php

namespace App\Http\Controllers\Admin\PaymentManagement;

use App\Enums\PaymentSection;
use App\Exports\ReleasePaymentExport;
use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Models\Transaction;
use App\Service\Admin\PaymentManagement\IndexService;
use App\Service\Admin\PaymentManagement\PaymentHistoryService;
use App\Service\Admin\PaymentManagement\ReleasePaymentService;
use App\Service\Admin\PaymentManagement\ReleaseService;
use App\Service\Admin\PaymentManagement\StatusByIDService;
use App\Service\Admin\PaymentManagement\StatusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index(Request $request, PaymentSection $section, IndexService $service, ReleaseService $releaseService)
    {

        abort_if(Gate::denies('admin_payments_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($section->value == PaymentHistory::PENDING_TO_PAY)
        {
            abort_if(Gate::denies('admin_pending_to_pay_payments_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($section->value == PaymentHistory::PAID_TO_PUBLISHER)
        {
            abort_if(Gate::denies('admin_paid_to_publisher_payments_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($section->value == PaymentHistory::RELEASE_PAYMENT)
        {
            abort_if(Gate::denies('admin_release_payments_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($section->value == PaymentHistory::PAYMENT_HISTORY)
        {
            abort_if(Gate::denies('admin_history_payments_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($section->value == PaymentHistory::NO_PUBLISHER_PAYMENT)
        {
            abort_if(Gate::denies('admin_no_publisher_payments_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $columns = [];
        if($section->value == PaymentHistory::PENDING_TO_PAY)
        {
            $columns = Transaction::makeFilterColumns();
        }

        if($section->value == PaymentHistory::RELEASE_PAYMENT || $section->value == PaymentHistory::PAYMENT_HISTORY)
        {
            return $releaseService->init($request, $section);
        }
        else
        {
            return $service->init($request, $section, $columns);
        }
    }

    public function statusUpdate(Request $request, StatusService $service)
    {
       
        return $service->init($request);
    }

    public function statusUpdateReleasePayment(Request $request, ReleasePaymentService $service)
    {
       
        return $service->init($request);
    }

    public function statusUpdateByID(Request $request, PaymentSection $section, Transaction $transaction, $status, StatusByIDService $service)
    {
        
        return $service->init($request, $transaction, $status);
    }

    public function releasePaymentExport(Request $request)
{
    return Excel::download(new ReleasePaymentExport($request), 'release_payment.csv', \Maatwebsite\Excel\Excel::CSV);
}

    public function paymentHistoryByInvoice(Request $request, PaymentHistoryService $service, $invoiceID)
    {
        return $service->init($invoiceID);
    }

    public function updatePaymentHistoryByInvoice(Request $request, PaymentHistoryService $service, $invoiceID)
    {
        return $service->update($request, $invoiceID);
    }

}
