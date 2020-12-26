  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Datos de la conferencia</h1>

                 <a class="btn btn-primary float-right"  href="{{ route('admin.conferencias.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>
                   
                    <div class="separator mb-5"></div>
                  </div>
              </div>

              

             <div class="row">
               <div class="col-12 col-lg-6">  
              
                     <div class="card mb-4">
                         <div class="card-body">

                                            <h2 class="list-item-heading pt-2 text-center ">Datos Generales </h2>

                                            <hr>

                                             <p class="text-muted text-small mb-2">Imagen</p>
                      <img  src="{{route('confe.image', [$conferencia->id])}}" width="230px" height="250px" >

<br><br>
                                            <p class="text-muted text-small mb-2">Entidad</p>
                                            <p class="mb-3"> {{ $conferencia->entidad }} </p>

                                             <p class="text-muted text-small mb-2">Nombre</p>
                                            <p class="mb-3"> {{ $conferencia->nombre }} </p>

                                            <p class="text-muted text-small mb-2">Descripción</p>
                                            <p class="mb-3"> {{ $conferencia->descripcion }} </p>

                                          {{--   <p class="text-muted text-small mb-2">Capacidad</p>
                                            <p class="mb-3"> {{ $conferencia->capacidad }} </p> --}}

                                            {{-- <p class="text-muted text-small mb-2"> Cupos disponibles </p>
                                            <p class="mb-3"> {{ $conferencia->capacidad - $conferencia->limite }} </p>  
 --}}
                                            <p class="text-muted text-small mb-2">Hora limite</p>
                                            <p class="mb-3"> {{ $conferencia->limithour }} </p>

                                            <p class="text-muted text-small mb-2">Fecha creación</p>
                                            <p class="mb-3"> {{ $conferencia->created_at->diffForHumans() }} </p>

                                            <p class="text-muted text-small mb-2">Estado</p>
                                            <p class="mb-3"> {!! $conferencia->estadoTag !!} </p>
                                            

                         </div>
                     </div>
                </div>



             </div>



      </div>   
      
  @stop