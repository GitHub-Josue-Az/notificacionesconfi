<!DOCTYPE html>
<html>
	

    <body>

         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->
         <div>
         	
         	<img  src="{{route('confe.image',[31]) }}" width="130px" height="120px"><br>
		<a class="btn-primary" style="background-color: green; box-shadow: 0 5px 0 darkgreen; color: white; padding: 8px 15px; text-decoration: none; text-transform: uppercase; display: inline-block;" href="{{route('conference.download',[31]) }}"> Descargar</a>


         </div>             


         <br><br>
    </body>
</html>