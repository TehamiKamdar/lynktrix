<?php

namespace App\Http\Controllers\Admin\Doc;

use App\Http\Controllers\Controller;
use App\Service\Admin\Doc\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request, HistoryService $service)
    {
        return $service->init($request);
    }
}
