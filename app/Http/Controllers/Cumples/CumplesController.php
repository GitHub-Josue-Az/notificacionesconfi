<?php

namespace App\Http\Controllers\Cumples;

use App\Http\Controllers\Controller;
use App\Models\Comcumple;
use App\Models\Cumple;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\CumpleanoMail;

class CumplesController extends Controller
{


     function __construct(){
        $this->middleware('admin');
         Carbon::setLocale('es');
    }
    
     public function index()
    {
    //Obtiene los datos y lo guarda en un objeto   //$datosM= DB::table('messages')->get();
        
       $daytoday = Carbon::now('America/Lima');  

       $diassone = Carbon::now('America/Lima');  
       $diahoy = $diassone->day;       
       $meshoy = $diassone->month;      
       $diasdelmes = $diassone->daysInMonth;      

       $cumplesone  = Cumple::whereRaw('month(fechacumples) = '.$meshoy)             
                            ->whereRaw('day(fechacumples) ='.$diahoy)
                            ->where('deleted',1)->get(); 

       // TRAE LOS USUARIOS DEL PRIMER DIA DEL MES, EN CASO ESTEMOS FIN DE MES
       if ($diahoy == $diasdelmes) {

            $diaAdelantadot = $diassone->addDay();    
            $mesAdelantadot = $diaAdelantadot->month;  

          $cumpletwo  = Cumple::whereRaw('month(fechacumples) = '.$mesAdelantadot)            
                            ->whereRaw('day(fechacumples) ='.$diaAdelantadot->day)
                            ->where('deleted',1)->get(); 
       
         $uniontwo = $cumpletwo->mergeRecursive($cumplesone);
         return view('cumples.actuales.index',compact('cumples','uniontwo'));
       }

       $diasstwo = Carbon::now('America/Lima');  
       $diaAdelantado = $diasstwo->addDay();       
       $mesAdelantado = $diaAdelantado->month;      

       $cumpletwo  = Cumple::whereRaw('month(fechacumples) = '.$mesAdelantado)             
                            ->whereRaw('day(fechacumples) ='.$diaAdelantado->day)
                            ->where('deleted',1)->get();                             

         $uniontwo = $cumpletwo->mergeRecursive($cumplesone);
         return view('cumples.actuales.index',compact('daytoday','uniontwo'));
    }

    public function index2(){

        $daytoday = Carbon::now('America/Lima');  
        
        $cumplespasados = Cumple::orderByRaw('DATE_FORMAT(fechacumples, "%m-%d") DESC')->where('estado',0)->where('deleted',1)->get();
    
        return view('cumples.pasados.index',compact('daytoday','cumplespasados'));
    }


    public function create()
    { }

    public function store(Request $request)
    {  }

    
    public function show($id)
    {
       

        $comentarios = Comcumple::where('deleted',1)->where('cumples_id',$id)->get();


        return view('cumples.actuales.show',compact('comentarios'));
    }


    public function show2($id){
       
        $comentarios = Comcumple::where('deleted',1)->where('cumples_id',$id)->get();

        return view('cumples.pasados.show',compact('comentarios'));

    }


    public function edit($id)
    {
    
        $cumpledit=Comcumple::findOrFail($id);

         return view('cumples.actuales.edit',compact('cumpledit'));
    }



    public function update(Request $request, $id)
    {

          $request->validate([
                 'descripcion' => 'required',
            ]);

       $cumpled=Comcumple::findOrFail($id);

       $cumpled->update($request->all());
    
       return redirect()->route('admin.cumples.index');
    }


    public function update2($idcumples)    
    {
      
        $cumple = Cumple::findOrFail($idcumples);

         //ACTUALIZAR
         $cumple->update([
          "deleted"=> 0,
         ]); 

         $comcum = Comcumple::where('deleted',1)->where('cumples_id',$idcumples)->get();
        
          foreach ($comcum as $key => $value) {
                  $value->update([
                     "deleted"=> 0, 
                ]); 
          }

         return redirect()->route('admin.cumples.index');
    }


     public function update3($idcomcumple){
      
        $comcumple = Comcumple::findOrFail($idcomcumple);

         //ACTUALIZAR
         $comcumple->update([
          "deleted"=> 0,
         ]); 
       
         return redirect()->route('admin.cumples.index');
    }



    public function enviomail($idcumpleanero){

      // Traer el correo del usuario correspondiente al cumpleaños y luego enviarle un email con todas las tarjetas
      $usuario   = User::where('deleted',1)->first();

        //SI en caso el usuario no tiene pues reenviar con mensaje de error
            if (!is_null($usuario)) {
                   return back()->withErrors('El usuario no posee un correo');           
          }       

           Mail::to($cumpleaneoro->email)
                    ->bcc(['ruthalva73@gmail.com'])
                    ->queue(new CumpleanoMail($usuario));

        return back()->with('success', 'Email enviado');
    }

   /* public function tarjeta($idcumple){

       return back()->with('success', 'Yaya');
    }
*/


    public function destroy($id)
    {
        //
    }



}
