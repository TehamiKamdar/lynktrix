<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Ajax\GetCountriesByNetworkController;
use App\Http\Controllers\Ajax\GetAdvertiserByNetworkController;
use App\Http\Controllers\Ajax\GetAdvertiserByNetworkByUserController;
use App\Http\Controllers\Ajax\GetWebsiteByUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route("get-started"));
});



Route::get("/test", [\App\Http\Controllers\TestController::class, 'index']);
Route::get("/test-total-transactions", [\App\Http\Controllers\TestController::class, 'totalTransaction']);
Route::get("/test2", [\App\Http\Controllers\TestController::class, 'index2']);

require __DIR__.'/publisher_public.php';

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('{type}/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    require __DIR__.'/admin.php';
    require __DIR__.'/publisher.php';

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('get-states', [AddressController::class, 'actionStates'])->name('get-states');
Route::post('get-cities', [AddressController::class, 'actionCities'])->name('get-cities');
Route::post("get-countries-by-network", GetCountriesByNetworkController::class)->name('get-countries-by-network');
Route::post("get-advertisers-by-network", GetAdvertiserByNetworkController::class)->name('get-advertisers-by-network');
Route::post("get-advertisers-by-network-by-users", GetAdvertiserByNetworkByUserController::class)->name('get-advertisers-by-network-by-user');
Route::post("get-websites-by-user", GetWebsiteByUserController::class)->name('get-websites-by-user');

require __DIR__.'/auth.php';
require __DIR__.'/webhook.php';
