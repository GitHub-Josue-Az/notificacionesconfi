 <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">


                    <li>
                       <a href="{{ route('home') }}">
                            <i class="simple-icon-home"></i> <span class="d-inline-block">Dashboard</span>
                        </a>
                    </li>

                    @if(auth()->user()->isAdmin)

                    <li>
                        <a href="#usuarios">
                            <i class="iconsminds-mens"></i>Usuarios
                        </a>
                    </li>

                    <li>
                        <a href="#cumpleaños">
                            <i class="iconsminds-birthday-cake"></i> Cumpleaños
                        </a>
                    </li>

                    <li>
                        <a href="#cuponera">
                            <i class="iconsminds-imdb"></i> Cuponera
                        </a>
                    </li>

                    <li>
                        <a href="#felicitaciones">
                            <i class="simple-icon-star"></i> Felicitaciones
                        </a>
                    </li>

                    <li>
                        <a href="#conferencias">
                            <i class="iconsminds-conference"></i> Conferencias
                        </a>
                    </li>

                    @endif

                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">

                <ul class="list-unstyled" data-link="usuarios">
                    <li>
                        <a href="{{ route('admin.usuarios.index') }}">
                            <i class="iconsminds-male-female"></i> <span class="d-inline-block">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.jefes.index') }}">
                            <i class="iconsminds-engineering"></i> <span class="d-inline-block">Jefes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.administradores.index') }}">
                            <i class="iconsminds-engineering"></i> <span class="d-inline-block">Administradores</span>
                        </a>
                    </li> 
                </ul>

                <ul class="list-unstyled" data-link="cumpleaños">
                    <li>
                        <a href="{{ route('admin.cumples.index') }}">
                            <i class="iconsminds-king-2"></i> <span class="d-inline-block">Cumpleañeros</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.cumple.index2') }}">
                            <i class="simple-icon-badge"></i> <span class="d-inline-block">Cumpleaños pasados</span>
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="cuponera">
                    <li>
                       <a href="{{ route('admin.campos.index') }}">
                            <i class="iconsminds-pie-chart-3"></i> <span class="d-inline-block">Campos</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.cuponera.index') }}">
                            <i class="iconsminds-id-card"></i> <span class="d-inline-block">Cupones</span>
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="felicitaciones">
                    <li>
                        <a href="{{ route('admin.felicitaciones.index') }}">
                            <i class="iconsminds-crown-2"></i> <span class="d-inline-block">Felicitados</span>
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="conferencias">
                    <li>
                        <a href="{{ route('admin.conferencias.index') }}">
                            <i class="iconsminds-conference"></i> <span class="d-inline-block">Conferencias</span>
                        </a>
                    </li>{{-- 
                    <li>
                        <a href="Dashboard.Default.html">
                            <i class="iconsminds-profile"></i> <span class="d-inline-block">Reservas</span>
                        </a>
                    </li> --}}
                </ul>
                
            </div>
        </div>


    </div>