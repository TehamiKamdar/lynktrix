<?php

namespace App\Providers;

use App\Models\AdvertiserApply;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\ServiceProvider;

class PublisherProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('checkAdvertiserApplyCount', function ($app) {
            return AdvertiserApply::select('id')->where("publisher_id", auth()->user()->id)->count();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
