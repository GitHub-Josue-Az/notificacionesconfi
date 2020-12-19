<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comcumple;
use App\Models\Conferencia;
use App\Models\Cumple;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JwtAuth;


class CumpleanosController extends Controller
{

function __construct(){
         Carbon::setLocale('es');
    } 


 public function cumpleslist()
    {

       $diassone = Carbon::now('America/Lima');  
       $diahoy = $diassone->day;       
       $meshoy = $diassone->month;      
      /* $diasdelmes = $diassone->daysInMonth; */     

       $cumplesone  = Cumple::with('user')->whereRaw('month(fechacumples) = '.$meshoy)             
                            ->whereRaw('day(fechacumples) ='.$diahoy)
                            ->where('deleted',1)
                            ->where('estado',1)->get(); 

          if (count($cumplesone) > 0 ){
            foreach ($cumplesone as $key => $cumples) {
                $cumples->dia = "Hoy ";
            }
         }

       // TRAE LOS USUARIOS DEL PRIMER DIA DEL MES, EN CASO ESTEMOS FIN DE MES
       /*if ($diahoy == $diasdelmes) {*/


            $diaAdelantadot = $diassone->addDay();    
            $mesAdelantadot = $diaAdelantadot->month;  

          $cumpletwo  = Cumple::with('user')->whereRaw('month(fechacumples) = '.$mesAdelantadot)            
                            ->whereRaw('day(fechacumples) ='.$diaAdelantadot->day)
                            ->where('deleted',1)
                            ->where('estado',1)->get(); 

         if (count($cumpletwo) > 0 ){
            foreach ($cumpletwo as $key => $cumpleso) {
                $cumpleso->dia = "Mañana ";
            }
         }

      $uniontwo = $cumplesone->mergeRecursive($cumpletwo);
         //ARRAY VACIA SI NO HAY NADA
         return response()->json($uniontwo, 200);

       /*}

       $diasstwo = Carbon::now('America/Lima');  
       $diaAdelantado = $diasstwo->addDay();       
       $mesAdelantado = $diaAdelantado->month;      

       $cumpletwo  = Cumple::with('user')->whereRaw('month(fechacumples) = '.$mesAdelantado)             
                            ->whereRaw('day(fechacumples) ='.$diaAdelantado->day)
                            ->where('deleted',1)
                            ->where('estado',1)->get();                             

         $uniontwo = $cumplesone->mergeRecursive($cumpletwo);
          return response()->json($uniontwo, 200);*/
    }
    

      public function cumplesfelicitar(Request $request){

        $usuario = Auth::guard('api')->user();
         
        $descripcion =  $request->input('descripcion');
        $cumple =  $request->input('cumple');
             

        $objec = Cumple::where('id',$cumple)->where('estado',1)->where('deleted',1)->first();

             if (!is_null($objec)) {
              
               $comentario = Comcumple::where('users_id',$usuario->id)->where('cumples_id',$cumple)
                          ->where('deleted',1)
                          ->where('estado',1)->first();

                if (is_null($comentario)) {
                     Comcumple::create(['users_id' => $usuario->id,'cumples_id' => $cumple,'descripcion' => $descripcion ]);  
                      return response()->json(['succes' => 'Validado correctamente'], 200);
                 }
              }      

              return response()->json(['error' => 'Ya se realizo una felicitación'],401);
        }


       


}
