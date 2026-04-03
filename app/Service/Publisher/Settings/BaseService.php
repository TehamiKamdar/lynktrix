<?php

namespace App\Service\Publisher\Settings;

use App\Models\User;

class BaseService
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

    protected function loadWebsites(User $user)
    {
        return $user->load('websites');
    }
}
