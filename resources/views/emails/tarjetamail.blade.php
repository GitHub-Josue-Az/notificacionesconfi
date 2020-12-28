<!DOCTYPE html>
<html>
	

    <body>
        
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 10px;
}

.grid-item {
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>

         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->
         <div class="grid-container">
         	
            @foreach ($usuario->imagecumple as $imagenes)

              <div class="grid-item">
            
 <img  src="{{route('tarjeta.image',[$imagenes->id]) }}" width="130px" height="120px"><br>
 <a class="btn-primary" style="background-color: #3374FF; color: white; padding: 8px 15px;" href="{{route('tarjeta.download',[$imagenes->id]) }}"> Descargar</a>

             </div>

            @endforeach

         </div>             


         <br><br>
    </body>
</html>