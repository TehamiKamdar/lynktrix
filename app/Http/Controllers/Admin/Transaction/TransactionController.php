<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SetMissingTransactionRequest;
use App\Models\Transaction;
use App\Service\Admin\Transactions\ExportService;
use App\Service\Admin\Transactions\IndexService;
use App\Service\Admin\Transactions\RakutenTransactionPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_transactions_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('admin_transactions_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('template.admin.transactions.show', compact('transaction'));
    }

    public function missingTransaction(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_missing_transactions_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    public function setMissingTransaction(SetMissingTransactionRequest $request)
    {
        try {
            Transaction::where("id", $request->transaction_id)->update([
                "publisher_id" => $request->publisher,
                "website_id" => $request->website,
            ]);

            $response = [
                "type" => "success",
                "message" => "Set Missing Transaction Successfully Updated."
            ];
        } catch (\Exception $exception)
        {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.transactions.missing')->with($response['type'], $response['message']);
    }

    public function missingTransactionPayment(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_missing_payment_transactions_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    public function setMissingTransactionPayment(Request $request)
    {
        try {
            Transaction::whereIn("id", $request->transaction_ids)->update([
                "paid_to_publisher" => 1,
                "commission_status" => Transaction::STATUS_APPROVED
            ]);

            $response = [
                "type" => "success",
                "message" => "Set Missing Transaction Payment Successfully Updated."
            ];
        } catch (\Exception $exception)
        {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        $request->session()->flash($response['type'], $response['message']);
        return json_encode($response);
    }

    public function actionTransactionDataExportView(Request $request, ExportService $service)
    {
        return $service->init();
    }

    public function actionTransactionDataExport(Request $request, ExportService $service)
    {
        return $service->export($request);
    }

    public function transactionsRakutenPayment(Request $request, RakutenTransactionPaymentService $service)
    {
        return $service->init($request);
    }
}
