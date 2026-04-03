<?php

use App\Http\Controllers\Publisher\Advertisers\AdvertiserController;
use App\Http\Controllers\Publisher\Advertisers\DeeplinkController;
use App\Http\Controllers\Publisher\Creatives\CouponController;
use App\Http\Controllers\Publisher\Creatives\TextLinkController;
use App\Http\Controllers\Publisher\Misc\AjaxRequestController;
use App\Http\Controllers\Publisher\Reports\PerformanceController;
use App\Http\Controllers\Publisher\Reports\TransactionController;
use App\Http\Controllers\Publisher\Settings\BasicInfoController;
use App\Http\Controllers\Publisher\Settings\CompanyInfoController;
use App\Http\Controllers\Publisher\Settings\LoginInfoController;
use App\Http\Controllers\Publisher\Settings\APIInfoController;
use App\Http\Controllers\Publisher\Settings\BillingInfoController;
use App\Http\Controllers\Publisher\Payments\PaymentController;
use App\Http\Controllers\Publisher\Settings\PaymentSettingController;
use App\Http\Controllers\Publisher\Settings\WebsiteController;
use App\Http\Controllers\Publisher\Notifications\NotificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;


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

Route::group(['middleware' => 'publisher.status', 'prefix' => 'partner', 'as' => 'publisher.'], function () {


    Route::get('/all-brands', [AdvertiserController::class, 'actionFindAdvertiser'])->name('find-advertisers');
    Route::get('/advertiser-types', [AdvertiserController::class, 'actionAdvertiserTypes'])->name('advertiser-types');
    Route::get('/export-advertisers/{type}', [AdvertiserController::class, 'actionExportAdvertisers'])->name('export-advertisers');
    Route::get('/approved-brands', [AdvertiserController::class, 'actionOwnAdvertiser'])->name('own-advertisers');
    Route::get('/advertiser-detail/{sid}', [AdvertiserController::class, 'actionViewAdvertiser'])->name('view-advertiser');
    Route::post('/search-advertiser-filter', [AdvertiserController::class, 'actionSearchAdvertiserFilter'])->name('search-advertiser-filter');
    Route::post('/apply-advertiser', [AdvertiserController::class, 'actionApplyNetwork'])->name('apply-advertiser');
    Route::post('/send-msg-to-advertiser', [AdvertiserController::class, 'actionSendMsgToAdvertiser'])->name('send-msg-to-advertiser');

    Route::group(['prefix' => 'compaign-materials', 'as' => 'creatives.'], function () {

        Route::group(['prefix' => '/special-offers', 'as' => 'coupons.'], function () {

            Route::get('/', [CouponController::class, 'actionCoupon'])->name('list');
            Route::get('/{coupon}', [CouponController::class, 'actionShow'])->name('show');
            Route::get('/export/{type}', [CouponController::class, 'actionExport'])->name('export');

        });

        Route::group(['prefix' => '/tracking-links', 'as' => 'text-links.'], function () {

            Route::get('/', [TextLinkController::class, 'actionTextLink'])->name('list');
            Route::get('/export/{type}', [TextLinkController::class, 'actionExport'])->name('export');

        });

        Route::group(['prefix' => 'deep-links', 'as' => 'deep-links.'], function () {

            Route::get('/', [DeeplinkController::class, 'actionDeeplinkSection'])->name('list');
            Route::get('/export/{type}', [DeeplinkController::class, 'actionExport'])->name('export');

        });

    });

    Route::group(['prefix' => 'compaign-materials', 'as' => 'tools.'], function () {

        Route::group(['prefix' => 'deep-links', 'as' => 'deep-links.'], function () {

            Route::get('/generator', [DeeplinkController::class, 'actionDeeplinkGenerate'])->name('generate');

        });

        Route::group(['prefix' => 'api-info', 'as' => 'api-info.'], function () {

            Route::get('/', [APIInfoController::class, 'actionApiInfo'])->name('index');
            Route::post('/regenerate-token', [APIInfoController::class, 'actionApiTokenRegenerate'])->name('regenerate-token');

        });

    });

    Route::group(['prefix' => 'analytics', 'as' => 'reports.'], function () {

        Route::group(['prefix' => '/analytical-reports', 'as' => 'performance-by-transactions.'], function () {

            Route::get('/', [PerformanceController::class, 'actionPerformanceTransaction'])->name('list');
            Route::get('/export/{type}', [PerformanceController::class, 'actionPerformanceTransactionExport'])->name('export');

        });

        Route::group(['prefix' => '/performance-by-clicks', 'as' => 'performance-by-clicks.'], function () {

            Route::get('/', [PerformanceController::class, 'actionPerformanceClick'])->name('list');
            Route::get('/export/{type}', [PerformanceController::class, 'actionPerformanceClickExport'])->name('export');

        });

        Route::group(['prefix' => '/conversions', 'as' => 'transactions.'], function () {

            Route::get('/', [TransactionController::class, 'actionTransaction'])->name('list');
            Route::get('/export/{type}', [TransactionController::class, 'actionTransactionExport'])->name('export');

        });

    });


    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

        Route::group(['prefix' => 'basic-information', 'as' => 'basic-information.'], function () {

            Route::get('/', [BasicInfoController::class, 'actionBasicInfo'])->name('index');
            Route::patch('/', [BasicInfoController::class, 'actionBasicInfoUpdate'])->name('update');
            Route::get('/media-kits/{mediakit}', [BasicInfoController::class, 'actionMediaKitsDelete'])->name('media-kits.delete');

        });

        Route::group(['prefix' => 'company', 'as' => 'company.'], function () {

            Route::get('/', [CompanyInfoController::class, 'actionCompanyInfo'])->name('index');
            Route::patch('/', [CompanyInfoController::class, 'actionCompanyInfoUpdate'])->name('update');

        });

        Route::group(['prefix' => 'websites', 'as' => 'websites.'], function () {

            Route::get('/', [WebsiteController::class, 'actionWebsites'])->name('index');
            Route::get('/{website}', [WebsiteController::class, 'actionGetWebsiteById'])->name('show');
            Route::post('/', [WebsiteController::class, 'actionWebsiteStore'])->name('store');
            Route::patch('/', [WebsiteController::class, 'actionWebsiteUpdate'])->name('update');
            Route::post('/verification', [WebsiteController::class, 'actionWebsiteVerification'])->name('verification');

        });

    });

    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {

        Route::group(['prefix' => 'login-info', 'as' => 'login-info.'], function () {

            Route::get('/', [LoginInfoController::class, 'actionLoginInfo'])->name('index');
            Route::get('/change-email', [LoginInfoController::class, 'actionChangeEmail'])->name('change-email');
            Route::get('/change-password', [LoginInfoController::class, 'actionChangePassword'])->name('change-password');

        });

    });

    Route::group(['prefix' => 'payouts', 'as' => 'payments.'], function () {

        Route::get('/', [PaymentController::class, 'actionPayment'])->name('index');

        Route::group(['prefix' => 'billing-information', 'as' => 'billing-information.'], function () {

            Route::get('/', [BillingInfoController::class, 'actionBillingInfo'])->name('index');
            Route::patch('/', [BillingInfoController::class, 'actionBillingInfoUpdate'])->name('update');

        });

        Route::group(['prefix' => 'payment-settings', 'as' => 'payment-settings.'], function () {

            Route::get('/', [PaymentSettingController::class, 'actionPaymentSettings'])->name('index');
            Route::patch('/', [PaymentSettingController::class, 'actionPaymentSettingsUpdate'])->name('update');

            Route::get("/verify-identity", [PaymentSettingController::class, 'actionVerifyIdentity'])->name('verify-identity');
            Route::get("/verify-identity-code/{identity}", [PaymentSettingController::class, 'actionVerifyIdentityCode'])->name('verify-identity-code');

        });

    });

    Route::group(['prefix' => 'changes', 'as' => 'changes.'], function () {

        Route::patch('/email', [LoginInfoController::class, 'actionChangeEmailUpdate'])->name('email-update');
        Route::get('verify-to-change-email/{url}', [LoginInfoController::class, 'actionVerifyEmail'])->name('verify-email');
        Route::patch('/username', [LoginInfoController::class, 'actionLoginInfoUpdate'])->name('username-update');
        Route::patch('/password', [LoginInfoController::class, 'actionChangePasswordUpdate'])->name('password-update');

    });

    Route::group(['prefix' => 'deeplink', 'as' => 'deeplink.'], function () {

        Route::post ('/check-availability', [DeeplinkController::class, 'actionCheckAvailability'])->name('check-availability');

    });

    Route::group(['prefix' => 'tracking', 'as' => 'tracking.'], function () {

        Route::post ('/check-availability', [DeeplinkController::class, 'actionTrackingURLCheckAvailability'])->name('check-availability');

    });

    Route::group(['prefix' => 'notification-center', 'as' => 'notification-center.'], function () {

        Route::get ('notification/{notification}', [NotificationController::class, 'actionNotificationView'])->name('show');
        Route::get ('/{category?}', [NotificationController::class, 'actionNotificationCenter'])->name('index');

    });

    Route::get('get-month-last-day', [AjaxRequestController::class, 'actionGetMonthLastDay'])->name('get-month-last-day');
    Route::post('upload-profile-image', [AjaxRequestController::class, 'actionUploadProfileImage'])->name('upload-profile-image');
    Route::get('set-limit', [AjaxRequestController::class, 'actionSetPaginationLimit'])->name('set-limit');
    Route::get('set-advertiser-view', [AjaxRequestController::class, 'actionSetAdvertiserView'])->name('set-advertiser-view');
    Route::get('set-website/{website}', [AjaxRequestController::class, 'actionSetWebsite'])->name('set-website');

});
