<?php

namespace App\Service\Admin\PublisherManagement\Publisher;

use App\Enums\UserStatus;
use App\Models\Role;
use App\Service\Admin\UserManagement\BaseService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class IndexService extends BaseService
{

    public function init(Request $request, UserStatus $status)
    {
        if ($request->ajax()) {

            $exclude = [Role::SUPER_ADMIN_ROLE, Role::ADMIN_ROLE, Role::STAFF_ROLE, Role::ADVERTISER_ROLE];

            // VIEW
            $viewGate      = 'publishers_show';

            // DELETE
            $deleteGate    = 'publishers_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.publisher-management.publishers';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => null,
                "edit" => null,
                "delete" => null,
            ];

            return $this->prepareListing($request, $exclude, $actionData, $status->value);

        }

        SEOMeta::setTitle(ucwords($status->value) . " " . trans('cruds.publisher.title') . " " . trans('global.list'));

        return view('template.admin.publishers.index', compact('status'));
    }

}
