  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.cuponera.store') }}" method="post" enctype="multipart/form-data" >
                                 <!--Middleware-->
                                    {!! csrf_field() !!}

              <div class="row">
                  <div class="col-12">
                      <h1>Registro de cupones</h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.cuponera.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>  

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">
               <div class="col-12 col-lg-6">
              
                <div class="card mb-4">
                        <div class="card-body">

                          <div class="form-group has-float-label">
                                   <input type="file" value="{{old('logo')}}" class="form-control @error('logo') is-invalid @enderror" maxlength="50"  id="logo" name="logo" placeholder="">
                                    <span> Imagen del cupón</span>
                           {!! $errors->first('logo','<span class=error>:message</span>') !!}
                       </div> 

                      <div class="form-group has-float-label">
                                   <input type="text" value="{{old('nombre')}}" class="form-control @error('nombre') is-invalid @enderror" maxlength="150"  id="nombre" name="nombre" placeholder="">
                                    <span>Nombre</span>
                           {!! $errors->first('nombre','<span class=error>:message</span>') !!}
                     </div>   

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{old('direccion')}}" class="form-control @error('direccion') is-invalid @enderror" maxlength="200"  id="direccion" name="direccion" placeholder="">
                                    <span>Dirección</span>
                                     {!! $errors->first('direccion','<span class=error>:message</span>') !!}
                                </div>
                                
                                <div class="form-group has-float-label">
                                   <input type="text" value="{{old('contacto')}}" class="form-control @error('contacto') is-invalid @enderror" maxlength="200"  id="contacto" name="contacto" placeholder="">
                                   <span>Contacto</span>
                                 {!! $errors->first('contacto','<span class=error>:message</span>') !!}
                                </div>

                                 <div class="form-group has-float-label">
                                   <input type="text" value="{{old('aplicable')}}" class="form-control @error('aplicable') is-invalid @enderror" maxlength="300"  id="aplicable" name="aplicable" placeholder="">
                                   <span>Aplicable</span>
                                 {!! $errors->first('aplicable','<span class=error>:message</span>') !!}
                                </div>

                                 <div class="form-group has-float-label">
                                   <input type="text" value="{{old('detalles')}}" class="form-control @error('detalles') is-invalid @enderror" maxlength="500"  id="detalles" name="detalles" placeholder="">
                                   <span>Detalles</span>
                                 {!! $errors->first('detalles','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="number" value="{{old('telefono')}}" class="form-control @error('telefono') is-invalid @enderror" maxlength="500"  id="telefono" name="telefono" placeholder="">
                                   <span>Telefono</span>
                                 {!! $errors->first('telefono','<span class=error>:message</span>') !!}
                                </div>

                                   <div class="form-group has-float-label">
                              <select class="form-control" id="campos_id" name="campos_id">
                                @foreach ($campos as $campo)
                                     <option value={{$campo->id}}> {{$campo->nombres}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('campos_id','<span class=error>:message</span>') !!}
                                    <span> Campo </span>
                                </div>

                     <button class="btn btn-success" type="submit">Registrar</button>
                                
                        </div>
                    </div>

              </div>
             </div>

             </form>
             
          </div>
      
  @stop