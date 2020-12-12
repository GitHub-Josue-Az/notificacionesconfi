  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Datos del cupón</h1>

                 <a class="btn btn-primary float-right"  href="{{ route('admin.cuponera.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>
                   
                    <div class="separator mb-5"></div>
                  </div>
              </div>

              

             <div class="row">


               <div class="col-12 col-lg-4">  
              
                     <div class="card mb-4">
                         <div class="card-body">
                                             
                                             <p class="text-muted text-small mb-2">Imagen</p>
                                         <img  src="{{route('cuponera.image', [$cupones->id])}}" width="130px" height="120px" >

                                         <br>
                                           <br>

                                             <p class="text-muted text-small mb-2">Nombre</p>
                                            <p class="mb-3"> {{ $cupones->nombre }} </p>


                                            @if (isset($cupones->direccion) )
                                             <p class="text-muted text-small mb-2">Dirección</p>
                                            <p class="mb-3"> {{ $cupones->direccion }} </p>
                                            @endif

                                              @if (isset($cupones->contacto) )
                                             <p class="text-muted text-small mb-2">Contacto</p>
                                            <p class="mb-3"> {{ $cupones->contacto }} </p>
                                            @endif

                                              @if (isset($cupones->direccion) )
                                             <p class="text-muted text-small mb-2">Dirección</p>
                                            <p class="mb-3"> {{ $cupones->direccion }} </p>
                                            @endif

                                              @if (isset($cupones->aplicable) )
                                             <p class="text-muted text-small mb-2">Aplicable</p>
                                            <p class="mb-3"> {{ $cupones->aplicable }} </p>
                                            @endif

                                              @if (isset($cupones->detalles) )
                                             <p class="text-muted text-small mb-2">Detalles</p>
                                            <p class="mb-3"> {{ $cupones->detalles }} </p>
                                            @endif

                                              @if (isset($cupones->campo->nombres) )
                                             <p class="text-muted text-small mb-2">Campo</p>
                                            <p class="mb-3"> {{ $cupones->campo->nombres }} </p>
                                            @endif
                                            

                         </div>

                     </div>
                </div>


             </div>

      </div>   
      
  @stop