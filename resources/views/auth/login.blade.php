

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

    <!-- PARA QUE SIRVE : ICONO -->
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/perfect-scrollbar.css') }}" />
    <link  href="{{ asset('bower_components/diseno/src/css/main.css') }}" />
</head>


<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">Login</p>

                            <p class="white mb-0">
                                Ingrese sus credenciales para ingresar.
                                <br>Si no posee credenciales comunicarse <br>con el encargado
                            </p>
                        </div>
                        <div class="form-side">

                            <h6 class="mb-4">Login</h6>
                            <form method="post" action="{{ route('logii') }}">
                               {!! csrf_field() !!}
    
                               
                                <label class="form-group has-float-label mb-4">
                                    <input id="codigo" type="text" class="form-control " name="codigo" />
                                    <span>Codigo</span>
                                    {!! $errors->first('codigo','<span class=error>:message</span>') !!}

                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" id="password" name="password"/>
                                    <span>Password</span>
                            {!! $errors->first('password','<span class=error>:message</span>') !!}
                                </label>


                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="{{ asset('bower_components/diseno/src/js/vendor/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('bower_components/diseno/src/js/vendor/perfect-scrollbar.min.js') }}" defer></script>  
    <script src="{{ asset('bower_components/diseno/src/js/vendor/bootstrap.bundle.min.js') }}" defer> </script>
    <script src="{{ asset('bower_components/diseno/src/js/vendor/mousetrap.min.js') }}" defer> </script>
    <script src="{{ asset('bower_components/diseno/src/js/dore.script.js') }}" defer></script>
    <script src="{{ asset('bower_components/diseno/src/js/scripts.js') }}" defer></script>  
</body>

</html>

