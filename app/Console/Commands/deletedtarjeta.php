<?php

namespace App\Console\Commands;

use App\Models\Imagecumple;
use Carbon\Carbon;
use Illuminate\Console\Command;

class deletedtarjeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleted:tarjeta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminación de las tarjeta de hace 5 meses ';

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
       $anohoy = $hacetiemp->year;

       $tarjetas  = Imagecumple::where('deleted',1)
                            ->whereYear('created_at',$anohoy)
                            ->whereMonth('created_at',$meshoy)
                            ->where('estado',1)->get(); 

        if ($tarjetas->count() > 0) {
                        
                 foreach ($tarjetas as $key => $value) {
                    
                          $value->update([
                                "deleted" => 0,
                        ]);
                    }    
                    return;
            }                 
           return ;


    }
}
