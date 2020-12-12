<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

		 function __construct(){
		       $this->middleware('admin');
		  }
    

		public function generalview() {  
			return view('dashboard.index');
    	}


    	public function general(Request $request){

			$request->validate([
                 'titulo' => 'required', 
                 'mensaje' => 'required',
            ]);


    	$recipients = User::whereNotNull('device_token')->where('deleted',1)->pluck('device_token')->toArray();    	

    		/*dd($recipients);*/
    		 fcm()
			    ->to($recipients) 
			    ->notification([
			        'title' => $request->input('titulo').'  📢',
			        'body' => $request->input('mensaje'),
		    	])->send();

		    	 


		$notification = 'Notificación enviada a todos los usuarios (Android).';
		return back()->with(compact('notification'));

    	}



}





