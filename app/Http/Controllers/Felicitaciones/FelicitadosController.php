<?php

namespace App\Http\Controllers\Felicitaciones;

use App\Http\Controllers\Controller;
use App\Models\Comfelicitado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FelicitadosController extends Controller
{
    
     function __construct(){
        $this->middleware('admin');
         Carbon::setLocale('es');
    }

    public function index()
    {
        //TRAE EL USER_ID 
        $felicitados =  Comfelicitado::select('users_id',DB::raw('MAX(created_at) as ultimo'))->where('deleted',1)
           ->groupBy('users_id')
           ->orderByRaw('max(DATE_FORMAT(created_at, "%m-%d")) DESC')->get();

         foreach ($felicitados as $llave => $valor) {
            $valor->ultimo =  Carbon::parse($valor->ultimo);
         }

       return view('felicitadores.index',compact('felicitados'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {

        $comentarios = Comfelicitado::where('deleted',1)->where('users_id',$id)
        ->orderByRaw('DATE_FORMAT(created_at, "%m-%d") DESC')->get();

        return view('felicitadores.show',compact('comentarios'));
    }

   
    public function edit($id)
    {

         $feliciedit=Comfelicitado::findOrFail($id);

         return view('felicitadores.edit',compact('feliciedit'));
    }

   
    public function update(Request $request, $id)
    {

            $request->validate([
                 'descripcion' => 'required|min:2',
            ]);

       $felici=Comfelicitado::findOrFail($id);

       $felici->update($request->all());
    
       return redirect()->route('admin.felicitaciones.index');
    }

    public function update2(Request $request, $idfelici)
    {

        $comfeli = Comfelicitado::findOrFail($idfelici);

         //ACTUALIZAR
         $comfeli->update([
          "deleted"=> 0,
         ]); 
       
         return redirect()->route('admin.felicitaciones.index');
        
    }

   
    public function destroy($id)
    {
        //   
    }



}
