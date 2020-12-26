<!DOCTYPE html>
<html>
    <body>
        
         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->    
		<a href="{{route('confe.image',[31]) }}" download>
        	<img  src="{{route('confe.image',[31]) }}" width="130px" height="120px" >
		</a>
         <br><br>
    </body>
</html>