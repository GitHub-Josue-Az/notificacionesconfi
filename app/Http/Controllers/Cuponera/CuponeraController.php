<?php

namespace App\Http\Controllers\Cuponera;

use App\Http\Controllers\Controller;
use App\Models\Campo;
use App\Models\Cupone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuponeraController extends Controller
{
     function __construct(){
        $this->middleware('admin',['except' => ['image']]);
    }
    
    
    
     public function index()
    {

          $cupones = Cupone::where('deleted',1)->get();
        
          return view('cuponera.cupones.index',compact('cupones'));
    }
   
   
    public function store(Request $request)
    {
       
           $request->validate([
                 'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:800|dimensions:min_width=100,min_height=100,max_width=750,max_height=800',
                 'nombre' => 'required|max:200', 
                 /*'direccion' => 'required',*/
                 'contacto' => 'required',
                 /*'aplicable' => 'required',*/
                 'detalles' => 'required',
                 'campos_id' => 'required',
            ]);



         if($request->hasFile('logo') ){
               $imager = $request->file('logo')->store('cupones');
            $request->merge(['imagen' => $imager]);

            Cupone::create($request->all());             
        }

          return redirect()->route('admin.cuponera.index');
    }
   
   
    
     public function create()
    {

        $campos = Campo::where('deleted',1)->where('id','<>',2)->get();
        
        return view('cuponera.cupones.create',compact('campos'));
    }
    
    
    
    public function show($id){
       
       
        //Eloquent
          $cupones=Cupone::findOrFail($id);
        
       return view('cuponera.cupones.show',compact('cupones'));
        
    }

     public function edit($id){
       
       
        $cupones=Cupone::findOrFail($id);
        $campos = Campo::where('deleted',1)->where('id','<>',2)->get();
      
         return view('cuponera.cupones.edit',compact('cupones','campos'));
        
    }
    
    
     public function update(Request $request, $id)
    {

        $request->validate([
                 'nombre' => 'required|max:200', 
                 /*'direccion' => 'required',*/
                 'contacto' => 'required',
                /* 'aplicable' => 'required',*/
                 'detalles' => 'required',
                 'campos_id' => 'required',
            ]);
      
         $cupone = Cupone::findOrFail($id);

         if($request->hasFile('logo') ){
               $imager = $request->file('logo')->store('cupones');
            $request->merge(['imagen' => $imager]);           
        }
        
        if (is_null($request->logo)) {
            $request->request->remove('logo');
        }

          $cupone->update($request->all());

         return redirect()->route('admin.cuponera.index');
    }
    
    
    public function update2($idcupones)
    {
      
         $cupone = Cupone::findOrFail($idcupones); 


         $cupone->update(['deleted' => 0]);

          
      
         return redirect()->route('admin.cuponera.index');
    }


     public function image($id) {
        
                $cupon = Cupone::findOrFail($id);
        
                 $content = Storage::get($cupon->imagen);
                 $mimetype = Storage::mimeType($cupon->imagen);
                    $size = Storage::size($cupon->imagen);
        
                return response($content)   // https://laravel.com/docs/5.4/responses
                         ->header('Content-Type', $mimetype)
                           ->header('Content-Length', $size);
            }
    
    
   /* public function destroy($idcupones)
    {
         Cupone::findOrFail($idcupones)->delete();
        
        return redirect()->route('cupones.index');    
    }*/

}
