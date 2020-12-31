<?php

namespace App\Http\Controllers\Conferencias;

use App\Http\Controllers\Controller;
use App\Models\Conferencia;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ConferenciasController extends Controller
{


    function __construct(){
        $this->middleware('admin',['except' => ['image']]);
         Carbon::setLocale('es');
    }

    

    public function index()
    {
     

  $conferencia = Conferencia::where('deleted',1)->orderByRaw('DATE_FORMAT(created_at, "%m-%d") DESC')->get();

            return view('conferencias.conferencia.index',compact('conferencia'));
    }

    
    public function create()
    {
        return view('conferencias.conferencia.create');
    }

    
    public function store(Request $request)
    {
     
         $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:800|dimensions:min_width=100,min_height=100,max_width=750,max_height=800',
            'nombre' => 'required|max:100',
            /*'descripcion' => 'required|max:100',*/
           /* 'capacidad' => 'required',*/
            'limit' => 'required|max:100',
            'entidad' =>'required|max:100', 
        ]);

         $dt = new Carbon($request->limit);
        $request->request->add(['limithour' => $dt]);
         /*$estadi = $request->exists('act') ? 1:0 ;*/


        /* if ($estadi == 1) {
            $recipients = User::whereNotNull('device_token')->where('deleted',1)->pluck('device_token')->toArray();

                fcm()
                ->to($recipients) 
                ->notification([
                    'title' => $request->nombre.' 👩‍💼',
                    'body' =>  'La conferencia esta dirigida por'. $request->entidad,
                ])->send();
         }*/

        /* $request->request->add(['estado' => $estadi]);*/

         if($request->hasFile('logo') ){
               $imager = $request->file('logo')->store('conferencias');
            $request->merge(['imagen' => $imager]);

            Conferencia::create($request->all());      

             $recipients = User::whereNotNull('device_token')->where('deleted',1)->pluck('device_token')->toArray();

             /*.$request->entidad*/

                fcm()
                ->to($recipients) 
                ->notification([
                    'title' => $request->nombre." 💼",
                    'body' => "La conferencia esta dirigida por ".$request->entidad,
                ])->send();       
        }

        return redirect()->route('admin.conferencias.index');
    }

   
    public function show($id)
    {
       $conferencia = Conferencia::findOrFail($id);

       return view('conferencias.conferencia.show',compact('conferencia'));
    }


    public function edit($id)
    {
      $conferencia = Conferencia::findOrFail($id);

       return view('conferencias.conferencia.edit',compact('conferencia'));
    }


    /*public function solicitudes($idsoli)
    {

       $comconfe = Conferencia::findOrFail($idsoli);

       ARRAY DE USUARIOS DE LA CONFERENCIA CON PIVOT
       $jeje = $comconfe->users()
              ->orderByRaw('conferencias_users.estado ASC')
              ->orderByRaw('DATE_FORMAT(conferencias_users.created_at, "%m-%d") DESC')->get();

       return view('conferencias.conferencia.solicitudes',compact('jeje','comconfe'));
    }*/

    
   public function aceptado(Request $request, $idconfe,$idusu)
    {
        // 0-Pendiente   1-Aceptado  2-Rechazado
         $confer = Conferencia::findOrFail($idconfe);
         $confer->users()->updateExistingPivot( $idusu , ['estado' => 1]);
         return back();
    }

    public function rechazado(Request $request, $idconfe,$idusu)
    {
         $confer = Conferencia::findOrFail($idconfe);
         $confer->limite--;
         $confer->save();
         $confer->users()->updateExistingPivot( $idusu , ['estado' => 2]);

         return back();
    }

    public function update(Request $request, $id)
    {

        $request->validate([
           'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100',
            'limit' => 'required|max:100',
            'entidad' =>'required|max:100', 
        ]);

         $dt = new Carbon($request->limit);
        $request->request->add(['limithour' => $dt]);

        if (!is_null($request->logo)) {

         $validator = Validator::make($request->all(),[
    'logo' => 'mimes:jpeg,png,jpg,gif,svg|max:800|dimensions:min_width=100,min_height=100,max_width=750,max_height=800',
        ]);

        if ($validator->fails()) {
               return back()->withErrors($validator);
            }

           $confe = Conferencia::findOrFail($id);
            $imager = $request->file('logo')->store('conferencias');
            $request->merge(['imagen' => $imager]);


          $confe->update($request->all());
      
         return redirect()->route('admin.conferencias.index');
        }

          $request->request->remove('logo');
          $confe = Conferencia::findOrFail($id);
          $confe->update($request->all());

         return redirect()->route('admin.conferencias.index');
    }


  /*  public function updatestate(Request $request, $id)
    { 
         $comconfe = Conferencia::findOrFail($id);

       $kii = array_keys($request->correct);      
       $estaditos = $request->correct;
           
           for ($i=0; $i < count($kii); $i++) { 
                $est = $estaditos[$kii[$i]]; 
                $comconfe->users()->updateExistingPivot( $kii[$i] , ['estado' => $est]);
           }
       return redirect()->route('admin.conferencias.index');
    }*/

     public function update2($idconfe)
    {
      
         $conferencia = Conferencia::findOrFail($idconfe); 

         $conferencia->update(['deleted' => 0]);

         return redirect()->route('admin.conferencias.index');
    }


    public function destroy($id)
    {
       
    }

     public function image($id) {
        
            $confe = Conferencia::findOrFail($id);
        /* No olvidar exportar el storage*/
            $content = Storage::get($confe->imagen);
            $mimetype = Storage::mimeType($confe->imagen);
            $size = Storage::size($confe->imagen);
        
        return response($content)   // https://laravel.com/docs/5.4/responses
                ->header('Content-Type', $mimetype)
               ->header('Content-Length', $size);
    }


    /*public function downloadima($id){

        $confe = Conferencia::findOrFail($id);

        return Storage::download($confe->imagen,'Tarjeta.jpg');
    }
*/

}
