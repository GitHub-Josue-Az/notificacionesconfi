  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.usuarios.store') }}" method="post" enctype="multipart/form-data" >
                                 <!--Middleware-->
                                    {!! csrf_field() !!}

              <div class="row">
                  <div class="col-12">
                      <h1>Registro de usuarios</h1>

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
                                   <input type="text" value="{{old('codigo')}}" class="form-control @error('codigo') is-invalid @enderror" maxlength="50"  id="codigo" name="codigo" placeholder="">
                                    <span>Codigo</span>
                                     {!! $errors->first('codigo','<span class=error>:message</span>') !!}
                                </div>
                                
                                <div class="form-group has-float-label">
                                   <input type="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" maxlength="50"  id="password" name="password" placeholder="">
                                   <span>Password</span>
                                 {!! $errors->first('password','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="password" value="{{old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" maxlength="50"  id="password_confirmation" name="password_confirmation" placeholder="">
                                   <span>password_confirmation</span>
                                 {!! $errors->first('password_confirmation','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                       <div class="input-group date">
                                        <label>Fecha de cumpleaños</label>
                                            <input type="text" value="{{old('fechacumples')}}" class="form-control @error('fechacumples') is-invalid @enderror" maxlength="50"  id="fechacumples" name="fechacumples" placeholder="">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                {!! $errors->first('fechacumples','<span class=error>:message</span>') !!}
                                </div>


                                <div class="form-group has-float-label">
                                   <input type="number" value="{{old('numero')}}" class="form-control @error('numero') is-invalid @enderror" maxlength="50"  id="numero" name="numero" placeholder="">
                                     <span>Celular</span>
                                {!! $errors->first('numero','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                              <select class="form-control" id="jefes_id" name="jefes_id">
                                @foreach ($jefes as $jefe)
                                     <option value={{$jefe->id}}> {{$jefe->nombres}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('jefes_id','<span class=error>:message</span>') !!}
                                    <span>Jefes</span>
                                </div>

 <button class="btn btn-success" type="submit">Registrar</button>
                                
                        </div>
                    </div>

              </div>
             </div>

             </form>
             
          </div>
      
  @stop