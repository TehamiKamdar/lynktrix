<?php

namespace App\Http\Controllers\Publisher\Reports;

use App\Enums\ExportType;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Service\Publisher\Reports\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    protected object $service;
    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }
    public function actionTransaction(Request $request)
    {
        return $this->service->list($request);
    }
    public function actionTransactionExport(ExportType $type, Request $request)
    {
        return $this->service->export($type, $request);
    }
}
