<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use JwtAuth;

class AuthController extends Controller
{
  
	public function login(Request $request){
		
		    	$credential = [
                   'codigo' => $request->input('codigo'),
                   'password' => $request->input('password'),
            ];


            if(Auth::guard('api')->attempt($credential)) {

                $user = Auth::guard('api')->user();
                
                $jwt = JwtAuth::generateToken($user);

                $error = 1;
                $data = compact('user','jwt');

               /* return compact('error','data');*/
            return response()->json($data, 200);
                // Return successfull sign in response with the generated jwt.
        		} /*else {
        			$error = 2;
        			$message = 'invalid credentials';

        			return compact('error','message');
        		}*/
              $message = 'invalid credentials';
        return response()->json($message,401);
	   }


        public function usuario(){
              return Auth::guard('api')->user();
         }


     public function logout(){
        Auth::guard('api')->logout();
        $success= true;
        return response()->json($success, 200);
    }


    public function users(){

      $user = Auth::guard('api')->user();
      $usuarios =  User::where('deleted',1)->where('id','<>',$user->id)->get(["id","codigo"]);

      return response()->json($usuarios, 200);
    }



}
