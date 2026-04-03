<?php

namespace App\Console;

use App\Models\FetchDailyData;
use App\Models\GenerateLink;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('app:stuck-job-check-command')->everyTenMinutes()->withoutOverlapping();
        $schedule->command('app:fix-tracking-link')->everyTenMinutes()->withoutOverlapping();
        $schedule->command('app:fix-deep-link')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('generate:link')->everyMinute();
        $schedule->command('app:emptytackingurl')->everyMinute();
        $schedule->command('check-deeplink-landing-url')->everyThreeMinutes()->withoutOverlapping();
        $schedule->command('sync:data')->everyTenMinutes();
        $schedule->command('sync-payment-total')->everyFourHours()->withoutOverlapping();
        $schedule->command('sync:transaction')->everyTenMinutes();
        $schedule->command('daily-data-transaction-fetch')->everyMinute();
        $schedule->command('daily-data-fetch')->everyTwoMinutes();
        $schedule->command('daily-make-history')->everyMinute();
        $schedule->command('daily-clicks-history')->everyMinute();
        $schedule->command('send:email')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('checker-tracking-url')->everyFourHours()->withoutOverlapping();
        $schedule->command('remove:data')->dailyAt('12:01');
        
        $schedule->command('clear-notifications')->monthlyOn(1, '12:00');
        $schedule->command('clean:links')->everyTwoMinutes();

        $schedule->command('app:fetch-and-store-logo')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('links:delete')->daily()->withoutOverlapping();
        $schedule->command('make-custom-domain')->daily()->withoutOverlapping();
        $schedule->command('advertiser-link-transaction')->daily()->withoutOverlapping();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
