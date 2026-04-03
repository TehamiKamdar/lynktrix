<?php

namespace App\Http\Middleware;

use App\Enums\AccountType;
use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublisherStatus
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure(Request): (Response|RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status != User::ACTIVE) {
            return redirect(route("dashboard", ["type" => $this->getType()]));
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
