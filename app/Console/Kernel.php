<?php

namespace App\Console;

use App\Console\Commands\estadocumples;
use App\Console\Commands\listadocumples;
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
        listadocumples::class,
        estadocumples::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
     protected function schedule(Schedule $schedule)
    {

        /* Funciona */      
        $schedule->command('usuarios:cumples')->timezone('America/Lima')->at('11:25');
        $schedule->command('estado:cumples')->timezone('America/Lima')->at('01:48');

         
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
