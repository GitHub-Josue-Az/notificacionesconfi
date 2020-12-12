<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use JwtAuth;

class FirebaseController extends Controller
{
   

	public function postToken(Request $request){


		$usuario = Auth::guard('api')->user();


		if ($request->has('device_token')) {
			
			$usuario->device_token = $request->input('device_token');
			$usuario->save();
		}

	}




}
