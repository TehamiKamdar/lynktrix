<?php

namespace App\Http\Controllers\Publisher\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LinkExpiredController extends Controller
{
    public function __invoke()
    {
        return view("template.publisher.advertisers.link-dead");
    }
}
