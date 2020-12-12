<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head    ESTILOS --> 
    @include('partials.head')
</head>
<body id="app-container" class="menu-default show-spinner">

 <!-- Header  BARRA DE ARRIBA--> 
        @include('partials.header')
        
        
            <!-- Sidebar  BARRA DE LA MANO DERECHA-->
            @include('partials.slider')
            
            <main>
                    <!-- Es un helper el cual verifica si se realizo de manera correcta alguna operacion -->
                    @if (session('success'))
                        <div class="alert alert-success rounded" role="alert">
                            <a class="close" data-dismiss="alert" href="#">×</a>{{ session('success') }}
                        </div>
                    @endif
                    
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger rounded" role="alert">
                            <ul class="list-unstyled">
                                <br>
                                @foreach($errors->all() as $error)
                                   <div class="container">
                                        <li type="circle">{{ $error }}</li>
                                   </div>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @yield('content')

                   </main> 
                <!-- End Content -->
                

                <!-- Footer BARRA DE ABAJO NO HAY NADA-->
                @include('partials.footer')
          

          </body>
</html>
