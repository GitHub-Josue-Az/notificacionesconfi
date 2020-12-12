  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.usuarios.store') }}" method="post" enctype="multipart/form-data" >
                                 <!--Middleware-->
                                    {!! csrf_field() !!}

              <div class="row">
                  <div class="col-12">
                      <h1>Registro de jefe</h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.usuarios.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>  

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">
               <div class="col-12 col-lg-6">
              
                <div class="card mb-4">
                        <div class="card-body">

                      <div class="form-group has-float-label">
                                   <input type="text" value="{{old('nombres')}}" class="form-control @error('nombres') is-invalid @enderror" maxlength="50"  id="nombres" name="nombres" placeholder="">
                                    <span>Nombres y apellidos</span>
                           {!! $errors->first('nombres','<span class=error>:message</span>') !!}
                     </div>   

                      <div class="form-group has-float-label">
                                   <input type="text" value="{{old('correo')}}" class="form-control @error('correo') is-invalid @enderror" maxlength="50"  id="correo" name="correo" placeholder="">
                                    <span>Correo</span>
                           {!! $errors->first('correo','<span class=error>:message</span>') !!}
                     </div>  

                       <div class="form-group has-float-label">
                                   <input type="text" value="{{old('descripcion')}}" class="form-control @error('descripcion') is-invalid @enderror" maxlength="50"  id="descripcion" name="descripcion" placeholder="">
                                    <span>Descripción</span>
                           {!! $errors->first('descripcion','<span class=error>:message</span>') !!}
                     </div>  
                          
                      <button class="btn btn-success" type="submit">Registrar</button>
                    

                        </div>
                  </div>


              </div>
             </div>

             </form>
             
          </div>
      
  @stop