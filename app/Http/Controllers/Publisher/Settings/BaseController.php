<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    const WEB_VERIFY_KEY = "linkscircleverifycode";

    protected function loadPublishers(User $user)
    {
        return $user->load('publisher');
    }

    protected function loadCompanies(User $user)
    {
        return $user->load('companies');
    }

    protected function loadBilling(User $user)
    {
        return $user->load('billing');
    }

    protected function loadPaymentSetting(User $user)
    {
        return $user->load('payment_setting');
    }

    protected function loadWebsites(User $user)
    {
        return $user->load('websites');
    }

}
