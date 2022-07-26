<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];
    protected $middlewareGroups = [
    'web' => [
        
        \RenatoMarinho\LaravelPageSpeed\Middleware\InlineCss::class,
    \RenatoMarinho\LaravelPageSpeed\Middleware\ElideAttributes::class,
    \RenatoMarinho\LaravelPageSpeed\Middleware\InsertDNSPrefetch::class,
    \RenatoMarinho\LaravelPageSpeed\Middleware\RemoveComments::class,
    \RenatoMarinho\LaravelPageSpeed\Middleware\TrimUrls::class,
    \RenatoMarinho\LaravelPageSpeed\Middleware\RemoveQuotes::class,
    \RenatoMarinho\LaravelPageSpeed\Middleware\CollapseWhitespace::class,
   ]
];
 

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
