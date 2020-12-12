<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Cupone;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{
    


    public function index()
    {
        
        $productos= Cupone::with('campo')->where('estado',1)->where('deleted',1)->get();
	    
	    return $productos;
    }



    public function show($id){
        try
        {
            $producto= Cupone::with('campo')->findOrFail($id);
            
            if($producto == null)
                throw new \Exception('Registro no encontrado');
    		
            return $producto;
    	    
        }catch(\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
    }



}
