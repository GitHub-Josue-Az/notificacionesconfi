<!DOCTYPE html>
<html>
    <body>
        
         Feliz Cumpleaños {{ $usuario->nombres }}  !!!!!
             <br> <br>
    
    
         <!--  Listado de tarjetas -->    <img  src="{{route('confe.image',[31]) }}" width="130px" height="120px" >
		<a href="{{route('conference.download',[31]) }}">
		</a>
         <br><br>
    </body>
</html>