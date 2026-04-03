<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        LogViewer::auth(function ($request) {

            return $request->user()
                && (auth()->user()->type == User::SUPER_ADMIN || auth()->user()->type == User::ADMIN || auth()->user()->type == User::STAFF || auth()->user()->type == User::INTERN);

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->environment('production')) {
            $this->preventDestructiveCommands();
        }
        Schema::defaultStringLength(191);
        Paginator::defaultView('vendor.pagination.default');
        Paginator::defaultSimpleView('vendor.pagination.simple-default');
        Queue::failing(function (JobFailed $event) {
            Log::error($event->connectionName);
            Log::error(json_encode($event->job));
            Log::error($event->exception);
        });
    }

    protected function preventDestructiveCommands()
    {
        $prohibitedCommands = [
            'migrate:fresh',
            'migrate:reset',
            'migrate:rollback',
            'db:seed',
            'db:wipe',
        ];

        $this->app->terminating(function () use ($prohibitedCommands) {
            $command = implode(' ', $_SERVER['argv'] ?? []);
            foreach ($prohibitedCommands as $prohibitedCommand) {
                if (str_contains($command, $prohibitedCommand)) {
                    throw new \RuntimeException("The `{$prohibitedCommand}` command is prohibited in production.");
                }
            }
        });
    }
}
