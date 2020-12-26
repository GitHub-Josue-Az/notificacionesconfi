<!DOCTYPE html>
<html>
    <body>
        
         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->    
		<a href="{{route('conference.download',[31]) }}">
        	<img  src="{{route('confe.image',[31]) }}" width="130px" height="120px" >
		</a>
         <br><br>
    </body>
</html>