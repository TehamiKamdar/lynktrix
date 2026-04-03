<?php

use App\Http\Controllers\Admin\AdvertiserManagement\AdvertiserConfigController;
use App\Http\Controllers\Admin\AdvertiserManagement\AdvertiserController;
use App\Http\Controllers\Admin\AdvertiserManagement\ApiAdvertiserController;
use App\Http\Controllers\Admin\AdvertiserManagement\DuplicateController;
use App\Http\Controllers\Admin\AdvertiserManagement\ManualJoinController;
use App\Http\Controllers\Admin\AdvertiserManagement\ManualApprovalNetworkHoldNActiveAdvertiserController;
use App\Http\Controllers\Publisher\Advertisers\AdvertiserController as PublisherAdvertiserController;
use App\Http\Controllers\Admin\AdvertiserManagement\ShowOnController;
use App\Http\Controllers\Admin\CreativeManagement\CouponController;
use App\Http\Controllers\Admin\PublisherManagement\ApplyAdvertiserController;
use App\Http\Controllers\Admin\PublisherManagement\PublisherController;
use App\Http\Controllers\Admin\Statistics\DeeplinkController;
use App\Http\Controllers\Admin\Statistics\LinkController;
use App\Http\Controllers\Admin\Transaction\TransactionController;
use App\Http\Controllers\Admin\PaymentManagement\PaymentController;
use App\Http\Controllers\Admin\UserManagement\PermissionsController;
use App\Http\Controllers\Admin\UserManagement\RolesController;
use App\Http\Controllers\Admin\Setting\NotificationController;
use App\Http\Controllers\Admin\UserManagement\UsersController;
use Illuminate\Support\Facades\Route;
use App\Helper\Static\Vars;

Route::group(['prefix' => Vars::ADMIN_ROUTE, 'as' => 'admin.'], function () {
    Route::get('/publishers/website', [UsersController::class, 'getpublisherwebsite']);
Route::get('/csv-download-transactions', [UsersController::class, 'getcsvdownload']);
    Route::get('/clicks-manual', [\App\Http\Controllers\ClicksManualController::class, 'index']);
    Route::get('/top-clicks', [\App\Http\Controllers\DashboardController::class, 'topClicks'])->name('topClicks');
    Route::get('/top-transactions', [\App\Http\Controllers\DashboardController::class, 'topTransactions'])->name('topTransactions');
    Route::get('/latest-publishers', [\App\Http\Controllers\DashboardController::class, 'topPublsihers'])->name('topPublsihers');
    Route::get('/top-advertisers', [\App\Http\Controllers\DashboardController::class, 'topAdvertisers'])->name('topAdvertisers');
    Route::get('correct-password',[UsersController::class, 'correct_password'])->name('correct-password');

    Route::group(['prefix' => 'advertiser-management', 'as' => 'advertiser-management.'], function () {

        Route::group(['prefix' => 'api-advertisers', 'as' => 'api-advertisers.'], function () {

            // API Advertiser
            Route::delete('/destroy', [ApiAdvertiserController::class, 'massDestroy'])->name('massDestroy');
            Route::get('/status/{api_advertiser}', [ApiAdvertiserController::class, 'status'])->name('status');

            Route::group(['prefix' => 'show-on-publisher', 'as' => 'show_on_publisher.'], function () {

                Route::get('/', [ShowOnController::class, 'index'])->name('index');
                Route::post('/', [ShowOnController::class, 'store'])->name('store');

                Route::post("/get-countries-by-network", [ShowOnController::class, 'getCountriesByNetwork'])->name('get-countries-by-network');
                Route::post("/get-advertisers-by-network", [ShowOnController::class, 'getAdvertisersByNetwork'])->name('get-advertisers-by-network');

            });

            Route::get('/duplicate-records', [DuplicateController::class, 'index'])->name('duplicate_record');
            Route::post('/duplicate-records', [DuplicateController::class, 'store'])->name('duplicate_record.store');

        });

        Route::get('/manual-join-publisher', [ManualJoinController::class, 'index'])->name('manual_join_publisher');
        Route::post('/manual-join-publisher', [ManualJoinController::class, 'store'])->name('manual_join_publisher.store');

        Route::resource('api-advertisers', ApiAdvertiserController::class);


//        Route::get('api-advertisers', [ApiAdvertiserController::class, 'index'])->name("api-advertisers.index");
//        Route::get('api-advertisers/{api_advertiser}/{type}', [ApiAdvertiserController::class, 'show'])->name("api-advertisers.show");
//        Route::get('api-advertisers/{api_advertiser}/edit/{type}', [ApiAdvertiserController::class, 'edit'])->name("api-advertisers.edit");
//        Route::delete('api-advertisers/{api_advertiser}/destroy/{type}', [ApiAdvertiserController::class, 'destroy'])->name("api-advertisers.destroy");
//        Route::delete('api-advertisers/{type}/destroy', [ApiAdvertiserController::class, 'massDestroy'])->name('api-advertisers.massDestroy');

        // Advertiser
        Route::delete('advertisers/destroy', [AdvertiserController::class, 'massDestroy'])->name('advertisers.massDestroy');
        Route::resource('advertisers', AdvertiserController::class);

    });

    Route::get('/manual-approval-advertiser-is-delete-from-network/{type}', [ManualApprovalNetworkHoldNActiveAdvertiserController::class, 'index'])->name('manual_approval_advertiser_is_delete_from_network');
    Route::post('/manual-approval-advertiser-is-delete-from-network', [ManualApprovalNetworkHoldNActiveAdvertiserController::class, 'store'])->name('manual_approval_advertiser_is_delete_from_network.store');

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {

        Route::delete('advertiser-configs/destroy', [AdvertiserConfigController::class, 'massDestroy'])->name('advertiser-configs.massDestroy');
        Route::resource('advertiser-configs', AdvertiserConfigController::class);
        Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
        Route::post('notification', [NotificationController::class, 'store'])->name('notification.store');

    });

    Route::group(['prefix' => 'publisher-management', 'as' => 'publisher-management.'], function () {

        // Publishers
        Route::delete('publishers/destroy', [PublisherController::class, 'massDestroy'])->name('publishers.massDestroy');
        Route::get('publishers/{status}/{website}', [PublisherController::class, 'statusUpdate'])->name('publishers.statusUpdate');
        Route::get('publisher/{status}', [PublisherController::class, 'index'])->name('publishers.index');
        Route::resource('publishers', PublisherController::class)->except('index');

    });

    Route::group(['prefix' => 'creative-management', 'as' => 'creative-management.'], function () {

        Route::delete('coupons/destroy', [CouponController::class, 'massDestroy'])->name('coupons.massDestroy');
        Route::resource('coupons', CouponController::class);

    });

    Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {

        // Permissions
        Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
        Route::resource('permissions', PermissionsController::class);

        // Roles
        Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
        Route::resource('roles', RolesController::class);

        // Users
        Route::get('users/{status}/{user}', [UsersController::class, 'statusUpdate'])->name('users.statusUpdate');
        Route::post('users/get-tab', [UsersController::class, 'tabs'])->name('users.tabs');
        Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
        Route::resource('users', UsersController::class);

    });

    Route::group(['prefix' => 'statistics', 'as' => 'statistics.'], function () {
 
        Route::resource('links', LinkController::class);
        Route::resource('deeplinks', DeeplinkController::class);

    });

    Route::group(['prefix' => 'approval', 'as' => 'approval.'], function () {

        Route::post('/status-update', [ApplyAdvertiserController::class, 'statusUpdate'])->name('statusUpdate');
        Route::get('/{status}', [ApplyAdvertiserController::class, 'index'])->name('index');
        Route::get('show/{approval}/{status}', [ApplyAdvertiserController::class, 'show'])->name('show');
        Route::delete('destroy/{status}', [ApplyAdvertiserController::class, 'destroy'])->name('destroy');

    });

    // Transaction
    Route::get('transactions/rakuten/payment', [TransactionController::class, 'transactionsRakutenPayment'])->name('transactions.rakuten.payment');
    Route::get("transactions/missing", [TransactionController::class, 'missingTransaction'])->name('transactions.missing');
    Route::post("transactions/missing", [TransactionController::class, 'setMissingTransaction'])->name('transactions.missing.store');
    Route::get("transactions/missing/payment", [TransactionController::class, 'missingTransactionPayment'])->name('transactions.missing.payment');
    Route::post("transactions/missing/payment", [TransactionController::class, 'setMissingTransactionPayment'])->name('transactions.missing.payment.store');
    Route::delete('transactions/destroy', [TransactionController::class, 'massDestroy'])->name('transactions.massDestroy');
    Route::resource('transactions', TransactionController::class);

    Route::get('/transaction-data-export', [TransactionController::class, 'actionTransactionDataExportView'])->name('transactions.data.export.view');
    Route::post('/transaction-data-export', [TransactionController::class, 'actionTransactionDataExport'])->name('transactions.data.export');

    Route::group(['prefix' => 'payment-management', 'as' => 'payment-management.'], function () {
       
        Route::post('/status-update/release-payment', [PaymentController::class, 'statusUpdateReleasePayment'])->name('statusUpdateReleasePayment');
        Route::post('/status-update', [PaymentController::class, 'statusUpdate'])->name('statusUpdate');
        Route::get('/{section}/{transaction}/{status}', [PaymentController::class, 'statusUpdateByID'])->name('statusUpdateByID');
        Route::get('/{section}', [PaymentController::class, 'index'])->name('index');
        Route::get('/release-payment/export', [PaymentController::class, 'releasePaymentExport'])->name('releasePaymentExport');
        Route::get('/history/{id}', [PaymentController::class, 'paymentHistoryByInvoice'])->name('paymentHistoryByInvoice');
        Route::post('/history/{id}', [PaymentController::class, 'updatePaymentHistoryByInvoice'])->name('updatePaymentHistoryByInvoice');

    });
 Route::get('/add-manual-advertisers',[PublisherAdvertiserController::class,'maunalAdvertisers'])->name('add-advertiser-manual');
     Route::post('/add-manual-advertisers',[PublisherAdvertiserController::class,'storemaunalAdvertisers'])->name('store-advertiser-manual');
    Route::get("access-login/{email}", [PublisherController::class, 'accessLogin'])->name('access-login');

});
