<?php

namespace App\Service\Admin\AdvertiserManagement\Advertiser;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;

class ShowService
{
    public function init($id)
    {
        $user = User::find($id);
        $this->loadRoles($user);
        $this->loadAdvertiser($user);
        SEOMeta::setTitle(trans('global.show') . " " . trans('cruds.advertiser.title_singular'));
        $advertiser = $user->advertiser;
        return view('template.admin.advertisers.show', compact('user', 'advertiser'));
    }

    public function loadRoles(User $user)
    {
        return $user->load('roles');
    }

    public function loadAdvertiser(User $user)
    {
        return $user->load('advertiser');
    }
}
