<?php

namespace App\Http\Middleware;

use App\Enums\AccountType;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $type = $this->getType();
                return redirect(route("dashboard", ["type" => $type]));
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
