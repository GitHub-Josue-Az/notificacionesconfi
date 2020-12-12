  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Datos del campo</h1>

                 <a class="btn btn-primary float-right"  href="{{ route('admin.campos.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>
                   
                    <div class="separator mb-5"></div>
                  </div>
              </div>

              

             <div class="row">
               <div class="col-12 col-lg-6">  
              
                     <div class="card mb-4">
                         <div class="card-body">
                                             
                                             <p class="text-muted text-small mb-2">Nombre</p>
                                            <p class="mb-3"> {{ $campos->nombres }} </p>

                                            @if (isset($campos->descripcion) )
                                             <p class="text-muted text-small mb-2">Descripción del campo</p>
                                            <p class="mb-3"> {{ $campos->descripcion }} </p>
                                            @endif

                         </div>

                     </div>
                </div>

             </div>

      </div>   
      
  @stop