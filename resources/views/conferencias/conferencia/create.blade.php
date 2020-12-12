  @extends('layouts.app')

  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.conferencias.store') }}" method="post" enctype="multipart/form-data" >
                                 <!--Middleware-->
                                    {!! csrf_field() !!}

              <div class="row">
                  <div class="col-12">
                      <h1>Registro de una conferencia</h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.conferencias.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>  

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">

               <div class="col-12 col-lg-6">
                  <div class="card mb-4">
                        <div class="card-body">
                          <div class="form-group has-float-label">
                            
                                   <input type="file" value="{{old('logo')}}" class="form-control @error('logo') is-invalid @enderror" maxlength="50"  id="logo" name="logo" placeholder="">
                                    <span> Imagen de la conferencia</span>
                           {!! $errors->first('logo','<span class=error>:message</span>') !!}
                       </div> 

                        <div class="form-group has-float-label">
                                   <input type="text" value="{{old('entidad')}}" class="form-control @error('entidad') is-invalid @enderror" maxlength="150"  id="entidad" name="entidad" placeholder="">
                                    <span>Entidad</span>
                           {!! $errors->first('entidad','<span class=error>:message</span>') !!}
                     </div> 

                      <div class="form-group has-float-label">
                                   <input type="text" value="{{old('nombre')}}" class="form-control @error('nombre') is-invalid @enderror" maxlength="150"  id="nombre" name="nombre" placeholder="">
                                    <span>Nombre</span>
                           {!! $errors->first('nombre','<span class=error>:message</span>') !!}
                     </div>   

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{old('descripcion')}}" class="form-control @error('  descripcion') is-invalid @enderror" maxlength="500"  id="  descripcion" name="  descripcion" placeholder="">
                                    <span>Descripción</span>
                                     {!! $errors->first('  descripcion','<span class=error>:message</span>') !!}
                                </div>
                                
                                {{-- <div class="form-group has-float-label">
                                   <input type="number" value="{{old('capacidad',2)}}" class="form-control @error('capacidad') is-invalid @enderror" min="2" id="capacidad" name="capacidad" placeholder="">
                                   <span>Capacidad</span>
                                 {!! $errors->first('capacidad','<span class=error>:message</span>') !!}
                                </div> --}}


                                    <div class="form-group row mb-1">
                                        <label class="col-12 col-form-label"> Estado </label>
                                        <div class="col-12">
                                            <div class="custom-switch custom-switch-primary mb-2">
                  <input class="custom-switch-input" id="act" name="act" type="checkbox" checked>
                                                <label class="custom-switch-btn" for="act"></label>
                                            </div>
                                        </div>
                                    </div>

                          </div>
                                {{-- @if($workDay->active) checked @endif --}}

                      <button class="btn btn-success" type="submit" style="margin: 2em;">Registrar</button>
                                
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                      <div class="card mb-4">
                       <div class="card-body">

                                <div class="form-group has-float-label">
                                       <div class="input-group date">
                                        <label>Fecha limite</label>
                                            <input type="text" value="{{old('limit')}}" class="form-control @error('limit') is-invalid @enderror" maxlength="50"  id="limit" name="limit" placeholder="">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                {!! $errors->first('limit','<span class=error>:message</span>') !!}
                                </div>
                          
                          <h3> Se puede personalizar el dia, hora y minuto una vez dado click en un fecha para ser mas especifico </h3>

                        </div>
                      </div>
                    </div>


              </div>
            </form>
        </div>
             


  @endsection

