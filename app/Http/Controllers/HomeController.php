<?php

namespace App\Http\Controllers;

use App\Models\Comfelicitado;
use App\Models\Conferencia;
use App\Models\Cumple;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        Carbon::setLocale('es');
       /* $this->middleware('auth');*/
    }


    public function prucarbon() {

        $dt = Carbon::now()->subDay(); ;
        $alumno = User::where('id',3)->first();

        return view('carbon',compact('alumno','dt'));
    }

    public function index()
    {
          $hoy = Carbon::now('America/Lima');

        return view('home',compact('hoy'));
    }

 public function welcome()
    {
        return view('welcome');
    }


     // ESTO ENCRIPTA LA COLUMNA PASSWOR DE LA BASE DE DATOS DE USER
    public function pruebita2()
    {

        $i=1;
        for ($i=1; $i < 2; $i++) { 
           $cupones=User::findOrFail($i);
           $jeje = $cupones->password;
           $data = User::where('id', $i)->update(array("password" => bcrypt($jeje)));
        }


        return $jeje;
    }

    public function prutrue(){
            $hoy = Carbon::now('America/Lima');
            $maña = Carbon::now('America/Lima');
            $mañana = $maña->addDay()->format('Y-m-d'); 
            $hoynew = $hoy->format('m-d');


            $cumple = Cumple::findOrFail(6);
            $fecha = new Carbon($cumple->fechacumples); 
            $fechanew = $fecha->format('m-d');

            if ($hoynew == $fechanew) {
                return 1;
            }


        /*var_dump($fechanew);    */   

            return 2;
    }

    public function inicio(){

        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }


    public function conferenciamuchos(){

        $confer = User::findOrFail(1);
         $gaa = $confer->conferencias()->get();

         return $gaa;
    }

    /*public function conferencias(){

        $usuario =User::findOrFail(1);
        $conferenci = Conferencia::findOrFail(6);

    dd($usuario->conferencias()->where('conferencias_id',3)->first());   

        return $confes;

    }*/



    public function cumpless(){

         $gaa = Cumple::with('user')->findOrFail(1);
         return $gaa;
    }

    public function cumplesmanana(){

       $diassone = Carbon::now('America/Lima');  
       $diahoy = $diassone->day;          
       $diasdelmes = $diassone->daysInMonth;      

       // TRAE LOS USUARIOS DEL PRIMER DIA DEL MES, EN CASO ESTEMOS FIN DE MES
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
    

           return response()->json(["succes"=>"aea"], 200);
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

          return response()->json(["succes"=>"aea"], 200);
    }


    public function changestate(){
        

        $diassone = Carbon::now('America/Lima');  
       $diahoy = $diassone->day;       
       $meshoy = $diassone->month;       

       $cumplesone  = Cumple::whereRaw('month(fechacumples) = '.$meshoy)             
                            ->whereRaw('day(fechacumples) ='.$diahoy)
                            ->where('deleted',1)->get(); 

            foreach ($cumplesone as $key => $value) {
                  $value->update([
                        "estado" => 0,
                   ]);
           }                        

        return $cumplesone;
    }



   /* public function felicitadores()
    {
        
    
        $felicitadores = Comfelicitado::where('users_id',1)
             ->where('deleted',1)->get();


        foreach ($felicitadores as $key => $felici) {
                $tiempo = $felici->created_at->diffForHumans(['parts' => 2]);
                $name = $felici->felicitadore->user->nombres;
                $felici->felicitador = $name;
                $felici->time = $tiempo;
                $moldeado[$key] = $felici->only(['id','descripcion','felicitador','time']);
            }


        return response()->json($moldeado, 200);
    
    }*/






}
