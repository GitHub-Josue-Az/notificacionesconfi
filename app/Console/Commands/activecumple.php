<?php

namespace App\Console\Commands;

use App\Models\Cumple;
use Carbon\Carbon;
use Illuminate\Console\Command;

class activecumple extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'active:cumples';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activar los cumpleaños pasado los 5 meses';

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
        $hacetiemp = $diassone->subMonths(5);
      
       $meshoy = $hacetiemp->month;        

       $cumplesone  = Cumple::where('deleted',1)
                            ->whereRaw('month(fecahcumples) = '.$meshoy)
                            ->where('estado',0)->get(); 

    if ($cumplesone->count() > 0) {
                        
                 foreach ($cumplesone as $key => $value) {
                    
                          $value->update([
                                "estado" => 1,
                        ]);
                    }    
                    return;
            }                 
           return ;

    }
}
