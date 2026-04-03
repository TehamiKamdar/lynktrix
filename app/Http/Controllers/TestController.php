<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        dd(Transaction::whereBetween("transaction_date", ["2024-12-31 00:00:00", "2024-12-31 23:59:59"])->sum('commission_amount'));
    }

}
