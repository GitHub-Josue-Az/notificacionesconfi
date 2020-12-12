<?php

namespace App\Http\Controllers\Cuponera;

use App\Http\Controllers\Controller;
use App\Models\Campo;
use App\Models\Cupone;
use Illuminate\Http\Request;

class CamposController extends Controller
{

    function __construct(){
        $this->middleware('admin');
    }
    
    
    
     public function index()
    {

          $campos = Campo::where('deleted','1')->where('id','<>',2)->get();
        
          
          return view('cuponera.campos.index',compact('campos'));
    }

   
    public function store(Request $request)
    {
       
           $request->validate([
                 'nombres' => 'required', 
                 'descripcion' => 'required',
            ]);


           Campo::create($request->all());
      
          return redirect()->route('admin.campos.index');
    }
   
   
    
     public function create()
    {
        
        return view('cuponera.campos.create');
    }
    
    
    
    public function show($id){

          $campos=Campo::findOrFail($id);
        
       return view('cuponera.campos.show',compact('campos'));
        
    }

     public function edit($id){
       
       
        $campos=Campo::findOrFail($id);
      
         return view('cuponera.campos.edit',compact('campos'));
        
    }
    
    
     public function update(Request $request, $id)
    {
    
            $request->validate([
                 'nombres' => 'required', 
                 'descripcion' => 'required',
            ]);

      
          $campo = Campo::findOrFail($id);
        
          $campo->update($request->all());
      
         return redirect()->route('admin.campos.index');
    }
    

     public function update2($idcamp)
    {

          $campo = Campo::findOrFail($idcamp); 


         $campo->update(['deleted' => 0]);

          
         Cupone::where('campos_id',$idcamp)->update([
          "campos_id"=>2,
         ]);
          
      
         return redirect()->route('admin.campos.index');
    }
    
    
    /*public function destroy($idcupones)
    {
        
         Campo::findOrFail($idcupones)->delete();
        
        return redirect()->route('campos.index');
        
    }*/


}
