<nav class="navbar fixed-top">


    <!-- PARA QUE SIRVE : RAYITAS PARA ABRIR Y CERRAR xd -->    
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
        </div>




    <!-- PARA QUE SIRVE : LOGO CENTRAL -->

    


    
    <!-- PARA QUE SIRVE : LO DE LA DERECHA P -->
        <div class="navbar-right">

                    <div class="container">
                     <div class="row">
                        <div class="col">
                        </div><div class="col">
                        </div><div class="col">
                        </div>
                        <div class="col">
                        </div>

                          <form action="{{ route('logout') }}" method="POST">
                                            {!! csrf_field() !!}
                                           
 <button type="submit"  tabindex="0" class="dropdown-item" style='width:200px; height:70px'>Cerrar sesión
  <span><i class="iconsminds-power-3"  ></i></span></button>

                             </form>
                      </div>
                    </div>

        </div>







    </nav>