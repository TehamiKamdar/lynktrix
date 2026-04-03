<?php

namespace App\Service\Admin\AdvertiserManagement\Advertiser;

use App\Models\Role;
use App\Service\Admin\UserManagement\BaseService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class IndexService extends BaseService
{
    public function init(Request $request)
    {

        if ($request->ajax()) {

            $exclude = [Role::SUPER_ADMIN_ROLE, Role::ADMIN_ROLE, Role::STAFF_ROLE, Role::PUBLISHER_ROLE];

            // VIEW
            $viewGate      = 'crm_advertiser_show';

            // DELETE
            $deleteGate    = 'crm_advertiser_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.advertiser-management.advertisers';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => null,
                "delete" => $deleteGate
            ];

            return $this->prepareListing($request, $exclude, $actionData);

        }

        SEOMeta::setTitle(trans('cruds.advertiser.title') . " " . trans('global.list'));

        return view('template.admin.advertisers.index');
    }
}
