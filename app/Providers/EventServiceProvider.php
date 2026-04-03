<?php

namespace App\Providers;

use App\Models\Advertiser;
use App\Models\CouponTrackingDetail;
use App\Models\DeeplinkTrackingDetail;
use App\Models\PaymentHistory;
use App\Models\TrackingDetail;
use App\Models\User;
use App\Models\Website;
use App\Observers\CouponTrackingDetailObserver;
use App\Observers\DeeplinkTrackingDetailObserver;
use App\Observers\PaymentHistoryObserver;
use App\Observers\TrackingDetailObserver;
use App\Observers\UserObserver;
use App\Observers\WebsiteObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Advertiser::observe(UserObserver::class);
        Website::observe(WebsiteObserver::class);
        PaymentHistory::observe(PaymentHistoryObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
