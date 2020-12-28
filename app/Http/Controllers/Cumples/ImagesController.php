<?php

namespace App\Http\Controllers\Cumples;

use App\Http\Controllers\Controller;
use App\Models\Imagecumple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{

       function __construct(){
       
       		 $this->middleware('admin',['except' => ['image','downloadima']]);  
	  }


    public function index($id)
    {
        $image = Imagecumple::where('deleted',1)->where('estado',1)->where('users_id',$id)->get();

        $iduser = $id;

        return view('cumples.imagenes.index',compact('image','iduser'));
    }


    public function store(Request $request)
    {

    	 $request->validate([
            'logo.*' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);


         if($request->hasFile('logo') ){

             foreach ($request->file('logo') as $key => $archivs) {

             		$imager = $archivs->store('cumples');
            		$request->merge(['imagen' => $imager]);

      				$pro =new Imagecumple;
           			$pro->image=$request->input('imagen');
           			$pro->users_id = $request->users_id;
           			$pro->save();
      		}    
        }
            return back();
    }

   
    public function edit($id)
    {

         $imagen=Imagecumple::findOrFail($id);

         return view('cumples.imagenes.edit',compact('imagen'));
    }

   
    public function update(Request $request, $id)
    {

	if (!is_null($request->logo)) {

         $validator = Validator::make($request->all(),[
    'logo' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
               return back()->withErrors($validator);
            }

           $imag = Imagecumple::findOrFail($id);
            $imager = $request->file('logo')->store('cumples');
            $request->merge(['image' => $imager]);


          $imag->update($request->all());
      
         return redirect()->route('admin.cumples.index');
        }

          $request->request->remove('logo');
          $imag = Imagecumple::findOrFail($id);
          $imag->update($request->all());

            return redirect()->route('admin.cumples.index');
    }


    public function update2(Request $request, $idfelici)
    {

        $imaesta = Imagecumple::findOrFail($idfelici);

         //ACTUALIZAR
         $imaesta->update([
          "deleted"=> 0,
         ]); 
       
         return back();
        
    }


     public function image($id) {
        
            $tarjeta = Imagecumple::findOrFail($id);

        /* No olvidar exportar el storage*/
            $content = Storage::get($tarjeta->image);
            $mimetype = Storage::mimeType($tarjeta->image);
            $size = Storage::size($tarjeta->image);
        
        return response($content)   // https://laravel.com/docs/5.4/responses
                ->header('Content-Type', $mimetype)
               ->header('Content-Length', $size);
    }


      public function downloadima($id){

        $ima = Imagecumple::findOrFail($id);

        return Storage::download($ima->image,'Tarjeta.jpg');
    }


}
