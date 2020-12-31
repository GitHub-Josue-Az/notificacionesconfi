<?php

namespace App\Console;

use App\Console\Commands\activecumple;
use App\Console\Commands\deletedcomcumple;
use App\Console\Commands\deletedtarjeta;
use App\Console\Commands\estadoconferencia;
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
        estadocumples::class,
        estadoconferencia::class,
        activecumple::class,
        deletedcomcumple::class,
        deletedtarjeta::class
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
        $schedule->command('usuarios:cumples')->timezone('America/Lima')->at('12:37');

        $schedule->command('estado:cumples')->timezone('America/Lima')->at('08:00');
        $schedule->command('active:cumples')->timezone('America/Lima')->monthly(); 
        
        $schedule->command('deleted:comcumple')->timezone('America/Lima')->monthly(); 
        $schedule->command('deleted:tarjeta')->timezone('America/Lima')->monthly(); 


        $schedule->command('estado:conferencias')->timezone('America/Lima')->hourly();

         
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
