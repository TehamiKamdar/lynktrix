<?php

namespace App\Service\Admin\PublisherManagement\Apply;

use App\Enums\Status;
use App\Models\AdvertiserApply;
use Artesaos\SEOTools\Facades\SEOMeta;

class ShowService
{
    public function init(AdvertiserApply $approval, Status $status)
    {
        SEOMeta::setTitle(trans('global.show') . " " . trans('advertiser.api-advertiser.title_singular'));

        $this->loadApprover($approval);
        $this->loadWebsite($approval);

        return view('template.admin.advertisers.apply.show', compact('approval', 'status'));
    }

    private function loadApprover(AdvertiserApply $apply_advertiser)
    {
        return $apply_advertiser->load('approver');
    }

    private function loadWebsite(AdvertiserApply $apply_advertiser)
    {
        return $apply_advertiser->load('website');
    }
}
