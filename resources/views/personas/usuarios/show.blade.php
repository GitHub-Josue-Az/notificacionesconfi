  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Datos del Usuario</h1>

                 <a class="btn btn-primary float-right"  href="{{ route('admin.usuarios.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>
                   
                    <div class="separator mb-5"></div>
                  </div>
              </div>

              

             <div class="row">
               <div class="col-12 col-lg-6">  
              
                     <div class="card mb-4">
                         <div class="card-body">
                                             <p class="list-item-heading pt-2 text-center "><strong>{{ $usuarios->nombres }}</strong> <i class="simple-icon-user"></i></p>

                                            <h2>Datos Generales </h2>

                                            <hr>

                                             <p class="text-muted text-small mb-2">Nombres</p>
                                            <p class="mb-3"> {{ $usuarios->nombres }} </p>

                                            <p class="text-muted text-small mb-2">Codigo</p>
                                            <p class="mb-3"> {{ $usuarios->codigo }} </p>

                                            <p class="text-muted text-small mb-2">Jefe</p>
                                            <p class="mb-3"> {{ $usuarios->jefe->nombres }} </p>

                                            <p class="text-muted text-small mb-2">Cargo</p>
                                            <p class="mb-3"> {{ $usuarios->cargo->nombre }} </p>

                                            @if (isset($usuarios->cumple->fechacumples) )
                                             <p class="text-muted text-small mb-2">Fecha de nacimiento</p>
                                            <p class="mb-3"> {{ $usuarios->cumple->fechacumples }} </p>
                                            @endif

                                            @if (isset($usuarios->numero) )
                                             <p class="text-muted text-small mb-2"> numero </p>
                                            <p class="mb-3"> {{ $usuarios->numero }} </p>
                                            @endif  


                                            </p>
                         </div>

                     </div>
                </div>


             </div>



      </div>   
      
  @stop