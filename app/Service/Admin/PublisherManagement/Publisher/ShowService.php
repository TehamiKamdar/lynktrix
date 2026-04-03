<?php

namespace App\Service\Admin\PublisherManagement\Publisher;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;

class ShowService
{
    public function init(User $publisher)
    {
        $this->loadRoles($publisher);
        $this->loadWebsite($publisher);
        $this->loadPublisher($publisher);

        SEOMeta::setTitle(trans('global.show') . " " . trans('cruds.publisher.title_singular'));

        return view('template.admin.publishers.show', compact('publisher'));
    }

    public function loadRoles(User $user)
    {
        return $user->load('roles');
    }

    public function loadWebsite(User $user)
    {
        return $user->load('websites');
    }

    public function loadPublisher(User $user)
    {
        return $user->load('publisher');
    }
}
