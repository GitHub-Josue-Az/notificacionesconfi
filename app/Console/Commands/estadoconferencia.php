<?php

namespace App\Console\Commands;

use App\Models\Conferencia;
use Carbon\Carbon;
use Illuminate\Console\Command;

class estadoconferencia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'estado:conferencias';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cambiar el estado de la conferencia al pasar el limite de tiempo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

         $diassone = Carbon::now('America/Lima');  
       $diahoy = $diassone->day;       
       $meshoy = $diassone->month;      
       $horahoy = $diassone->hour;      

       $confere  = Conferencia::whereRaw('month(limithour) = '.$meshoy)             
                            ->whereRaw('day(limithour) ='.$diahoy)
                            ->whereRaw('hour(limithour) ='.$horahoy)
                            ->where('deleted',1)
                            ->where('estado',1)->get(); 

       if ($confere->count() > 0) {
                        
                 foreach ($confere as $key => $value) {
                          $value->update([
                                "estado" => 0,
                        ]);
                    }    
                    return;
            }                 
           return ;


    }
}
