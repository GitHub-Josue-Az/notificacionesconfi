<!DOCTYPE html>
<html>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <body>

         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->
         <div>
         	
         	<img  src="{{route('confe.image',[31]) }}" width="130px" height="120px"><br>
		<a class="btn-primary" style="background-color: green; box-shadow: 0 5px 0 darkgreen; color: white; padding: 14px 25px; text-decoration: none; text-transform: uppercase; display: inline-block;" href="{{route('conference.download',[31]) }}"> Descargar</a>


         </div>             


         <br><br>
    </body>
</html>