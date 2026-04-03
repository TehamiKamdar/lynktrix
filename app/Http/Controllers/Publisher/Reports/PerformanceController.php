<?php

namespace App\Http\Controllers\Publisher\Reports;

use App\Enums\ExportType;
use App\Http\Controllers\Controller;
use App\Service\Publisher\Reports\PerformanceClickService;
use App\Service\Publisher\Reports\PerformanceTransactionService;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    protected object $transactionService, $clickService;
    public function __construct(PerformanceTransactionService $transactionService, PerformanceClickService $clickService)
    {
        $this->transactionService = $transactionService;
        $this->clickService = $clickService;
    }

    public function actionPerformanceTransaction(Request $request)
    {
        return $this->transactionService->list($request);
    }
    public function actionPerformanceTransactionExport(ExportType $type, Request $request)
    {
        return $this->transactionService->export($type, $request);
    }

    public function actionPerformanceClick(Request $request)
    {
        return $this->clickService->list($request);
    }
    public function actionPerformanceClickExport(ExportType $type, Request $request)
    {
        return $this->clickService->export($type, $request);
    }
}
