<?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doc\Website\ListController as WebsiteListController;
use App\Http\Controllers\Doc\Website\ShowController as WebsiteShowController;
use App\Http\Controllers\Doc\Advertiser\ListController as AdvertiserListController;
use App\Http\Controllers\Doc\Advertiser\ShowController as AdvertiserShowController;
use App\Http\Controllers\Doc\Offer\ListController as OfferListController;
use App\Http\Controllers\Doc\Offer\ShowController as OfferShowController;
use App\Http\Controllers\Doc\Transaction\ListController as TransactionListController;
use App\Http\Controllers\Doc\Generate\TrackingLinkController;
use App\Http\Controllers\Doc\Generate\DeeplinkController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['doc.auth', 'throttle:60,1'], 'prefix' => 'v1'], function () {
    Route::get('websites', WebsiteListController::class);
    Route::get('websites/{id}', WebsiteShowController::class);
    Route::get('advertisers', AdvertiserListController::class);
    Route::get('advertisers/{id}', AdvertiserShowController::class);
    Route::get('offers', OfferListController::class);
    Route::get('offer/{id}', OfferShowController::class);
    Route::get('transactions', TransactionListController::class);
    Route::post('generate-link/{id}', TrackingLinkController::class);
    Route::post('generate-deep-link/{id}', DeeplinkController::class);
});
// Route::get('/get_users',function(){
//     $user=User::where('type','admin')->first();
   
//     return response()->json(['user'=>$user]);
// });