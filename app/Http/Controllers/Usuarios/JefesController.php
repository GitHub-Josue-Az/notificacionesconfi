<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Jefe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JefesController extends Controller
{


    function __construct(){
        $this->middleware('admin');
    }
    
     public function index()
    {
    //Obtiene los datos y lo guarda en un objeto   //$datosM= DB::table('messages')->get();
        
         //Eloquent
          $jefes = Jefe::where('deleted',1)->get();
        
         //Envia un objeto mediante el compact   
          return view('personas.jefes.index',compact('jefes'));
    }

   
    public function store(Request $request)
    {
       
           $request->validate([
            'nombres' => 'required|max:100',
            'codigo' => 'required|max:100|unique:users',
            'password' => 'required|min:3|confirmed',
            'jefes_id' => 'required|max:100',
            'numero' => 'required|max:100',
            'fechacumples' => 'required|max:100',
        ]);
        
        $request->request->add(['roles_id' => 2]);  // Employee
        
        $user = User::create($request->all());

        /* CUMPLES */
        Cumple::create(['users_id' => $user->id,'fechacumples' => $request->fechacumples]);    

        /* FELICITADORES */
        Felicitadore::create(['users_id' => $user->id]);
        

        return redirect()->route('admin.usuarios.index')->with('success', 'Registro guardado satisfactoriamente');
    }
   
   
    
     public function create()
    {
     
        $jefes=Jefe::all();

        return view('personas.jefes.create',compact('jefes'));
    }
    
    
    
    public function show($id){
       
        //Eloquent
       $usuarios=User::findOrFail($id);
       return view('personas.usuarios.show',compact('usuarios'));
    }


     public function edit($id){
       
         $usuarios=User::findOrFail($id);
         $jefes=Jefe::all();
         return view('personas.usuarios.edit',compact('usuarios','jefes'));
    }
    
    
     public function update(Request $request, $id)
    {
     
         $request->validate([
            'nombres' => 'required|max:100',
            'codigo' => 'required|max:100|unique:users',
            'password' => 'required|min:3|confirmed',
            'jefes_id' => 'required|max:100',
            'numero' => 'required|max:100',
            'numerodos' => 'required|max:100',
        ]);
        
        $user = User::findOrFail($id);
        
        if ($request->get('password') == '') {
            $request->request->remove('password');
        }
        
         $user->update($request->all());
          
         return redirect()->route('admin.usuarios.index');
    }
    
    
     public function update2($idjef)
    {
      
         //ACTUALIZAR
         Jefe::where('id',$idjef)->update([
          "deleted"=> 0,
         ]);
        
        /*User::where('jefes_id',$idjef)->update([
            "jefes_id"=>1
        ]);*/
       
         return redirect()->route('admin.jefes.index');
    }
    
    
    public function destroy($idcupones)
    {
       /*  Usuario::findOrFail($idcupones)->delete();
        return redirect()->route('usuarios.index'); */   
        
    }


}
