<?php

namespace App\Service\Admin\UserManagement;

use App\Enums\UserStatus;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\Admitad\CreateWebsite;
use App\Models\EmailJob;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserService extends BaseService
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $exclude = [Role::PUBLISHER_ROLE, Role::ADVERTISER_ROLE];

            // VIEW
            $viewGate      = 'users_show';

            // EDIT
            $editGate      = '';

            // DELETE
            $deleteGate    = 'users_show';

            // PERMISSIONS
            $crudRoutePart = 'admin.user-management.users';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate,
            ];

            return $this->prepareListing($request, $exclude, $actionData);

        }
    }

    public function store(StoreUserRequest $request)
    {

        try {

            $user = User::create(array_merge($request->validated(), ['status' => 'active', 'type' => $request->input('roles'), 'email_verified_at' => now()->format("Y-m-d H:i:s")]));
            $user->roles()->sync([$request->input('roles')]);

            $response = [
                "type" => "success",
                "message" => "User Successfully Added."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;

    }

    public function update(UpdateUserRequest $request, User $user)
    {

        try {

            $user->update($request->validated());
            $user->roles()->sync($request->input('roles', []));

            $response = [
                "type" => "success",
                "message" => "User Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;

    }

    public function delete(User $user)
    {
        try {

            $user->delete();

            $response = [
                "type" => "success",
                "message" => "User Successfully deleted."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;
    }

    public function deleteMultiple()
    {
        User::whereIn('id', request('ids'))->delete();
    }

    public function updateStatus(UserStatus $status, User $user)
    {
        try {

            $user->load('companies');

            $user->update([
                'status' => $status->value
            ]);

            $name = $path = null;
            if($status->value == User::HOLD && $user->getRoleName() == Role::PUBLISHER_ROLE) {
                $name = "Hold Job";
                $path = "HoldJob";
            }
            elseif($status->value == User::REJECTED && $user->getRoleName() == Role::PUBLISHER_ROLE) {
                $name = "Reject Job";
                $path = "RejectJob";
            }
            elseif($status->value == User::ACTIVE && $user->getRoleName() == Role::PUBLISHER_ROLE) {
                $name = "Approve Job";
                $path = "ApproveJob";
            }

            if ($name && $path)
            {
                EmailJob::create([
                    'name' => $name,
                    'path' => $path,
                    'payload' => json_encode($user),
                    'date' => now()->format(Vars::CUSTOM_DATE_FORMAT)
                ]);
            }

            $response = [
                "type" => "success",
                "message" => "User Status Successfully Update."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;
    }

    public function getRoles()
    {
        return Role::all()->pluck('title', 'id');
    }

    public function loadRoles(User $user)
    {
        return $user->load('roles');
    }
}
