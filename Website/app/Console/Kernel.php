<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('appointments:send-reminder')->dailyAt('09:00')->appendOutputTo(storage_path('logs/cronjob.log'));

        $schedule->command('auto-archive:students')->everyMinute()->appendOutputTo(storage_path('logs/cronjob.log'));

        $schedule->command('auto-archive:employees')->everyMinute()->appendOutputTo(storage_path('logs/cronjob.log'));
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
    protected $commands = [
        \App\Console\Commands\SendAppointmentNotifications::class,
        \App\Console\Commands\AutoArchiveStudents::class,
        \App\Console\Commands\AutoArchiveEmployees::class,
    ];
}
