<!DOCTYPE html>
<html>
	

    <body>

         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->
         <div>
         	
            @foreach ($usuario->imagecumple as $imagenes)

              <div class="row">
               <div class="col-12 col-lg-6">
                   <div class="card mb-4">
                        <div class="card-body">
            
 <img  src="{{route('tarjeta.image',[$imagenes->id]) }}" width="130px" height="120px"><br>
 <a class="btn-primary" style="background-color: green; box-shadow: 0 5px 0 darkgreen; color: white; padding: 8px 15px; text-decoration: none; text-transform: uppercase; display: inline-block;" href="{{route('tarjeta.download',[$imagenes->id]) }}"> Descargar</a>

                 </div>
                    </div>
                </div>
             </div>

            @endforeach

         </div>             


         <br><br>
    </body>
</html>