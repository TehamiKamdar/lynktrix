<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DOCTokenVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('token');
        $user = User::where("api_token", $header)->count();
        if($user) {
            return $next($request);
        }
        return response()->json(['status' => 404, 'success' => false, 'message' => 'Unauthorized Access'], 404);
    }
}
