<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conferencia;
use Auth;
use Illuminate\Http\Request;
use JwtAuth;
use Carbon\Carbon;

class ConferenciasController extends Controller
{
    
function __construct(){
         Carbon::setLocale('es');
    }
   

    public function conferenciaslist()
    {
        
            $conf = Conferencia::where('deleted',1)->where('estado',1)->orderByRaw('DATE_FORMAT(created_at, "%m-%d") DESC')->get();

             $conferencia = [];

        foreach ($conf as $key => $confe) {
                $tiempo = $confe->limithour->addDays(2);
                $confe->horac = $tiempo->format('Y-m-d H:i');   
                $confe->fechalimite =  $confe->limithour->format('Y-m-d H:i');  
                $conferencia[$key] = $confe->only(['id','descripcion','fechalimite','nombre','entidad','horac']);

            }

           /*  dd($conferencia);*/

               return response()->json($conferencia, 200);
    }

    public function historial()
    {
        
            $conf = Conferencia::where('deleted',1)->where('estado',0)->orderByRaw('DATE_FORMAT(created_at, "%m-%d") DESC')->get();

            $conferencia = [];

        foreach ($conf as $key => $confe) { 
                $confe->fechalimite =  $confe->limithour->format('Y-m-d H:i');  
                $conferencia[$key] = $confe->only(['id','descripcion','fechalimite','nombre','entidad']);

            }

               return response()->json($conferencia, 200);
    }


   /* public function solicitudes(Request $request){

    	$usuario = Auth::guard('api')->user();
    	$conferencia =  $request->input('conferencia');

    	$idconferencia = Conferencia::findOrFail($conferencia);
    	$limit = $idconferencia->limite;
    	$capaci = $idconferencia->capacidad;

    	$pivote  = $usuario->conferencias()->where('conferencias_id',$conferencia)->first();

         HACER UN SYNC 
        if (!is_null($pivote)) {
            if ($pivote->estado == 2 && $limit < $capaci ) {
                
            }
        }

         AL SER UN OBJETO DEVUELVE NULO MAS NO [] CUANDO ES UN  GET 
    	if  ($pivote == null ) {
    		if ($idconferencia->estado == 1 && $limit < $capaci ) {
				$usuario->conferencias()->attach($idconferencia->id);
    			$idconferencia->limite++;
    			$idconferencia->save();
    			return response()->json(['succes' => 'Validado correctamente'],200);    			
    		}
    	}	

    	return response()->json(['error' => 'Usuario y/o clave inválido'],401);
    }*/



}
