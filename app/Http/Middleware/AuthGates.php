<?php

namespace App\Http\Middleware;

use App\Enums\AccountType;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!app()->runningInConsole() && $user) {
            $roles            = Role::with('permissions')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }

            $admin = AccountType::ADMIN;
            $publisher = AccountType::PUBLISHER;
            $advertiser = AccountType::ADVERTISER;

            $type = $request->segment(1);
            $userType = $this->getType();
            if(($admin == $type || $publisher == $type || $advertiser == $type) && $userType != $type) {
                return abort(404, "Unauthorized Access.");
            }
        }

        return $next($request);
    }

    private function getType()
    {
        $type = auth()->user()->type;

        if($type == User::ADMIN || $type == User::SUPER_ADMIN || $type == User::STAFF || $type == User::INTERN)
        {
            $admin = AccountType::ADMIN;
            $type = $admin->value;
        }

        return $type;
    }
}
