<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class GetWebsiteByUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $website = Website::withAndWhereHas('users', function($query) use($request) {
            $query->where("id", $request->publisher);
        })->where("status", Website::ACTIVE)->get();

        return response()->json($website->pluck("name", "id")->toArray());
    }
}
