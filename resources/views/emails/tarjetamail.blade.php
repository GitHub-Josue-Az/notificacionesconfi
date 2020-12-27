<!DOCTYPE html>
<html>
    <body>
      	
      	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->
         <div>
         	
         	<img  src="{{route('confe.image',[31]) }}" width="130px" height="120px" ><br>
		<a class="btn-primary" style="padding: 4px 8px;
  text-align: center;" href="{{route('conference.download',[31]) }}"> Descargr</a>


         </div>             


         <br><br>
    </body>
</html>