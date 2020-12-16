<?php

namespace App\Console\Commands;

use App\Models\Cumple;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class listadocumples extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuarios:cumples';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listado de cumpleaños para mañana';

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
        
         $number = 1;

        if ($number == 1) {
            
            fcm()
                ->to(['fxwGGqMqRIKXF4EtiHIcTf:APA91bHYQbCgsgzDEiUc07aVw3GllGHvkyKcSivUKUSOF_bboPgd9I1MIz67zRJUQf4BiFTsMbSgCuCDhyeYYvX7KxRs2txb8gXReHCHWZwJbmtqkcUd7vr1NyPwgANsIef1rR-yyTrs']) 
                ->notification([
                    'title' => 'Cumpleaños para mañana 🎊🎊🎊',
                    'body' =>  'ones',
                ])->send();

            return;
        }
         fcm()
                 ->to(['fxwGGqMqRIKXF4EtiHIcTf:APA91bHYQbCgsgzDEiUc07aVw3GllGHvkyKcSivUKUSOF_bboPgd9I1MIz67zRJUQf4BiFTsMbSgCuCDhyeYYvX7KxRs2txb8gXReHCHWZwJbmtqkcUd7vr1NyPwgANsIef1rR-yyTrs']) 
                ->notification([
                    'title' => 'Cumpleaños para mañana 🎊🎊🎊',
                    'body' =>  'two',
                ])->send();

        return;


        
        /* $diassone = Carbon::now('America/Lima');  
       $diahoy = $diassone->day;          
       $diasdelmes = $diassone->daysInMonth;      

       if ($diahoy == $diasdelmes) {

            $diaAdelantadot = $diassone->addDay();    
            $mesAdelantadot = $diaAdelantadot->month;  

          $cumpletwo  = Cumple::with('user')->whereRaw('month(fechacumples) = '.$mesAdelantadot)            
                            ->whereRaw('day(fechacumples) ='.$diaAdelantadot->day)
                            ->where('deleted',1)->get(); 

            if ($cumpletwo->count() > 0) {
                        
            $cumpleanero = "";

                foreach ($cumpletwo as $key => $value) {
                   
             $recipients = User::whereNotNull('device_token')->pluck('device_token')->toArray();     
            $cumpleanero .= "🎉".$value->user->nombres."\n";

                }

                fcm()
                ->to($recipients) 
                ->notification([
                    'title' => 'Cumpleaños para mañana 🎊🎊🎊',
                    'body' =>  $cumpleanero,
                ])->send();
            }                  
    

           return ;
        }

       $diasstwo = Carbon::now('America/Lima');  
       $diaAdelantado = $diasstwo->addDay();       
       $mesAdelantado = $diaAdelantado->month;      

       $cumpletwo  = Cumple::with('user')->whereRaw('month(fechacumples) = '.$mesAdelantado)             
                            ->whereRaw('day(fechacumples) ='.$diaAdelantado->day)
                            ->where('deleted',1)->get();                             

         if ($cumpletwo->count() > 0) {
                        
            $cumpleanero = "";

                foreach ($cumpletwo as $key => $value) {
                   
             $recipients = User::whereNotNull('device_token')->pluck('device_token')->toArray();     
            $cumpleanero .= "🎉".$value->user->nombres."\n";

                }

                fcm()
                ->to($recipients) 
                ->notification([
                    'title' => 'Cumpleaños para mañana 🎊🎊🎊',
                    'body' =>  $cumpleanero,
                ])->send();


            } 

          return;*/

    }



}
