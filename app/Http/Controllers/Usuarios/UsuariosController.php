<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Cumple;
use App\Models\Felicitadore;
use App\Models\Jefe;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{

     function __construct(){
      $this->middleware('admin',['except' => ['image']]);
    }
    
     public function index()
    {
    //Obtiene los datos y lo guarda en un objeto   //$datosM= DB::table('messages')->get();
        
         //Eloquent
          $usuarios = User::with('jefe')->where('deleted',1)->get();
        
         //Envia un objeto mediante el compact   
          return view('personas.usuarios.index',compact('usuarios'));
    }

   
    public function store(Request $request)
    {
       
           $request->validate([
            'imag' => 'mimes:jpeg,png,jpg,gif,svg|max:800|dimensions:min_width=100,min_height=100,max_width=750,max_height=800',
            'nombres' => 'required|max:100',
            'codigo' => 'required|max:100|unique:users',
            'password' => 'required|min:3|confirmed',
            'jefes_id' => 'required|max:100',
            'cargos_id' => 'required|max:100',
            'numero' => 'max:10',
            'fechacumples' => 'required|max:100',
        ]);

        $dt = new Carbon($request->fechacumples);

        /*$request->request->add(['roles_id' => $request->tipo]); */
        
        if($request->hasFile('imag') ){
               $imager = $request->file('imag')->store('usuariosimg');
            $request->merge(['perfil' => $imager]);

             $user = User::create($request->all());        
             Cumple::create(['users_id' => $user->id,'fechacumples' => $dt ]);    
             Felicitadore::create(['users_id' => $user->id]);       
        }

        return redirect()->route('admin.usuarios.index')->with('success', 'Registro guardado satisfactoriamente');
    }
   
   
    
     public function create()
    {
     
        $jefes=Jefe::all();
        $cargos=Cargo::where('id','<>',6)->get();

        return view('personas.usuarios.create',compact('jefes','cargos'));
    }
    
    
    
    public function show($id){
       
        //Eloquent
       $usuarios=User::findOrFail($id);
       return view('personas.usuarios.show',compact('usuarios'));
    }


     public function edit($id){
       
         $usuarios=User::findOrFail($id);
         $jefes=Jefe::all();
        $cargos=Cargo::where('id','<>',6)->get();
        $rol = Role::all();
         return view('personas.usuarios.edit',compact('usuarios','jefes','cargos','rol'));
    }
    
    
     public function update(Request $request, $id)
    {
     
         $request->validate([
            'imag' => 'mimes:jpeg,png,jpg,gif,svg|max:800|dimensions:min_width=100,min_height=100,max_width=750,max_height=800',
            'nombres' => 'required|max:100',
            'codigo' => 'max:100|unique:users',
            'jefes_id' => 'required|max:100',
            'cargos_id' => 'required|max:100',
            'numero' => 'max:10',
            /*'fechacumples' => 'required|max:100',*/
        ]);

        $user = User::findOrFail($id);

        if($request->hasFile('imag') ){
               $imager = $request->file('imag')->store('cupones');
            $request->merge(['perfil' => $imager]); 
        }
        
        if (is_null($request->imag)) {
            $request->request->remove('imag');
        }


        if($request->get('codigo') == ''){
             $request->request->remove('codigo');
        }

        if ($request->get('password') == '') {
            $request->request->remove('password');
        }

        $user->update($request->all());
        
        /* VALIDANDO SI YA PASO SU CUMPLEAÑOS */
        if (!is_null($request->fechacumples)) {
          $dtone = new Carbon($request->fechacumples);
          $dttwo = new Carbon($request->fechacumples);
          $diassone = Carbon::now('America/Lima');  
       
        $est = 0;
        if ($dtone->format('m-d') >= $diassone->format('m-d')) {
            $est = 1;
        }
          
         Cumple::where('users_id',$id)->update([
          "fechacumples"=> $dttwo,
            "estado" => $est,
         ]);

         }

         return redirect()->route('admin.usuarios.index');
    }
    
    
     public function update2($idusu)    
    {
      
        $user = User::findOrFail($idusu);

         //ACTUALIZAR
         $user->update([
          "deleted"=> 0,
         ]); 
        
        //CUMPLE Y FELICITADORE TAMBIEN
         Cumple::where('users_id',$idusu)->update(["deleted"=>0]);
         Felicitadore::where('users_id',$idusu)->update(["delete"=>0]);
       
         return redirect()->route('admin.usuarios.index');
    }
    
    
    public function destroy($idcupones)
    {
       /*  Usuario::findOrFail($idcupones)->delete();
        return redirect()->route('usuarios.index'); */   
        
    }

    
     public function image($id) {
        
                $usuario = User::findOrFail($id);
        
                 $content = Storage::get($usuario->perfil);
                 $mimetype = Storage::mimeType($usuario->perfil);
                    $size = Storage::size($usuario->perfil);
        
                return response($content)   // https://laravel.com/docs/5.4/responses
                         ->header('Content-Type', $mimetype)
                           ->header('Content-Length', $size);
            }



}
