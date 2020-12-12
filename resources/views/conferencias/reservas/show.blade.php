  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Datos del estudiante</h1>

                 <a class="btn btn-primary float-right"  href="{{ route('admin.alumnos.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>
                   
                    <div class="separator mb-5"></div>
                  </div>
              </div>

              

             <div class="row">
               <div class="col-12 col-lg-6">  
              
                     <div class="card mb-4">
                         <div class="card-body">
                                             <p class="list-item-heading pt-2 text-center "><strong>{{ $alumnos->nombres }}</strong> <i class="simple-icon-user"></i></p>

                                            <h2>Datos Generales </h2>

                                            <hr>

                                             <p class="text-muted text-small mb-2">Nombres</p>
                                            <p class="mb-3"> {{ $alumnos->nombres }} </p>

                                             <p class="text-muted text-small mb-2">Apellido materno</p>
                                            <p class="mb-3"> {{ $alumnos->apellidom }} </p>

                                             <p class="text-muted text-small mb-2">Apellido paterno</p>
                                            <p class="mb-3"> {{ $alumnos->apellidop }} </p>

                                            @if (isset($alumnos->fechanaci) )
                                             <p class="text-muted text-small mb-2">Fecha de nacimiento</p>
                                            <p class="mb-3"> {{ $alumnos->fechanaci }} </p>
                                            @endif

                                            @if (isset($alumnos->celular) )
                                             <p class="text-muted text-small mb-2"> Celular </p>
                                            <p class="mb-3"> {{ $alumnos->celular }} </p>
                                            @endif  

                                             @if (isset($alumnos->dni) )
                                            <p class="text-muted text-small mb-2"> DNI </p>
                                            <p class="mb-3"> {{ $alumnos->dni }} </p>
                                            @endif  


                                             @if (isset($alumnos->domicilio) )
                                              <p class="text-muted text-small mb-2"> Domicilio </p>
                                            <p class="mb-3"> {{ $alumnos->domicilio }} </p>
                                            @endif  

                                             @if (isset($alumnos->genero->title) )
                                              <p class="text-muted text-small mb-2"> Genero </p>
                                            <p class="mb-3"> {{ $alumnos->genero->title }} </p>
                                            @endif


                                            </p>
                         </div>

                     </div>
                </div>

                <div class="col-12 col-lg-6">  
              
                     <div class="card mb-4">
                         <div class="card-body">
                        
                                             @if (isset($alumnos->alumno[0]->padre->user->nombres ) )
                                             {{-- si no tiene datos al igual que domicilio, no mostrar --}} 
                                             <p class="text-muted text-small mb-2"> Padre </p>
                                            <p class="mb-3"> {{ $alumnos->alumno[0]->padre->user->nombres  }} </p>
                                            @endif  

                                             @if (isset($alumnos->alumno[0]->parentesco->title ) )
                                            <p class="text-muted text-small mb-2"> Parentesco </p>
                                            <p class="mb-3"> {{ $alumnos->alumno[0]->parentesco->title }} </p>
                                            @endif  


                                             @if (isset($alumnos->alumno[0]->nivel->title ) )
                                            <p class="text-muted text-small mb-2"> nivel </p>
                                            <p class="mb-3"> {{ $alumnos->alumno[0]->nivel->title }} </p>
                                            @endif    

                                             @if (isset($alumnos->alumno[0]->grado->title ) )
                                            <p class="text-muted text-small mb-2"> grado </p>
                                            <p class="mb-3"> {{ $alumnos->alumno[0]->grado->title }} </p>
                                            @endif  

                                            @if (isset($alumnos->alumno[0]->seccion->title ) )
                                            <p class="text-muted text-small mb-2"> seccion </p>
                                            <p class="mb-3"> {{ $alumnos->alumno[0]->seccion->title }} </p>
                                            @endif  

                                            @if (isset($alumnos->alumno[0]->salon ) )
                                            <p class="text-muted text-small mb-2"> Tutores </p>
                                            <p class="mb-3"> 

                                            @foreach ($alumnos->alumno[0]->salon->users[0]->get() as $tutores)
                                              {{ $tutores->nombres }}  
                                            @endforeach
                                            </p>

                                            @endif  


                         </div>
                     </div>   
                     
               </div> 


             </div>



      </div>   
      
  @stop