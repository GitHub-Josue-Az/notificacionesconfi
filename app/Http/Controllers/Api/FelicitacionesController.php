<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comfelicitado;
use App\Models\Felicitadore;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JwtAuth;

class FelicitacionesController extends Controller
{

   function __construct(){
         Carbon::setLocale('es');
    } 


    public function felicitadoreslist()
    {
        
		$users = Auth::guard('api')->user();

      //desc
      	 $felicitadores = Comfelicitado::where('users_id',$users->id)->where('deleted',1)
          ->orderByRaw('DATE_FORMAT(created_at, "%m-%d") ASC')->get();

        $moldeado = [];

        foreach ($felicitadores as $key => $felici) {
                $tiempo = $felici->created_at->diffForHumans(['parts' => 2]);
                $name = $felici->felicitadore->user->nombres;
                $felici->felicitador = $name;
                $felici->time = $tiempo;
                $moldeado[$key] = $felici->only(['id','descripcion','felicitador','time']);
            }


        return response()->json($moldeado, 200);
    }



    public function sendfelicitacion(Request $request){

     $usuario = Auth::guard('api')->user();

       $nanci = User::where('id',16)->where('deleted',1)->first();
         
        $descripcion =  $request->input('descripcion');
        $felicitado =  $request->input('felicitado');
        
        $usefeli = User::where('id',$felicitado)->where('deleted',1)->first();
        $felicitador = Felicitadore::where('users_id',$usuario->id)->where('delete',1)->first();
        $felici = $felicitador->user->nombres;

        if (!is_null($usefeli) && !is_null($felicitador)) {
               Comfelicitado::create(['users_id' => $felicitado,'felicitadores_id' => $felicitador->id,'descripcion' => $descripcion ]);  

            if (!is_null($usefeli->device_token)) {
                     fcm()
                    ->to([$usefeli->device_token]) 
                    ->notification([
                        'title' => 'Felicitaciones  ⭐ ',
                        'body' => "Recibiste una felicitacion de ".$felici,
                     ])->send();
                 }

            if (!is_null($nanci->device_token)) {
                     fcm()
                    ->to([$nanci->device_token]) 
                    ->notification([
                        'title' => 'Felicitaciones  ⭐ ',
                        'body' => "El usuario ".$usefeli->nombres." recibió una felicitacion de ".$felici,
                     ])->send();
              }


      return response()->json(['succes' => 'Validado correctamente'], 200);
             }     

      return response()->json(['error' => 'Invalido'], 401);
    }



}
