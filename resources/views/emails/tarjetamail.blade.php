<!DOCTYPE html>
<html>
	

    <body>

         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->
         <div>
         	
            @foreach ($usuario->imagecumple as $imagenes)
            
 <img  src="{{route('tarjeta.image',[$imagenes->id]) }}" width="130px" height="120px"><br>
 <a class="btn-primary" style="background-color: green; box-shadow: 0 5px 0 darkgreen; color: white; padding: 8px 15px; text-decoration: none; text-transform: uppercase; display: inline-block;" href="{{route('tarjeta.download',[$imagenes->id]) }}"> Descargar</a>

            @endforeach

         </div>             


         <br><br>
    </body>
</html>