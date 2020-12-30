<?php

namespace App\Console\Commands;

use App\Models\Cumple;
use Carbon\Carbon;
use Illuminate\Console\Command;

class estadocumples extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'estado:cumples';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cambiar el estado de los cumpleaños, al pasar su cumpleaño';

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
   
         $mess = $diassone->month;  

          $cumpletwo  = Cumple::with('user')->whereRaw('month(fechacumples) = '.$mess)            
                            ->whereRaw('day(fechacumples) ='.$diahoy)
                            ->where('deleted',1)->get(); 

            if ($cumpletwo->count() > 0) {
                        
                 foreach ($cumpletwo as $key => $value) {
                          $value->update([
                                "estado" => 0,
                        ]);
                    }    
                    return;
            }                 
           return ;

    }


}
