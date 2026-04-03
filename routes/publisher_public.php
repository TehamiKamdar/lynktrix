<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publisher\Payments\PaymentController;

Route::group(['prefix' => 'publisher/payments', 'as' => 'publisher.payments.'], function () {
    Route::get('/invoice/{payment_history}', [PaymentController::class, 'actionInvoice'])->name('invoice');
});
