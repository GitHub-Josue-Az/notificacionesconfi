@extends('layouts.app')

@section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.usuarios.update',$usuarios->id) }}" method="post" enctype="multipart/form-data" >
                                 
                {!! method_field('PUT') !!}
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
                                   <input type="text" value="{{ $usuarios->nombres}}" class="form-control @error('nombres') is-invalid @enderror" maxlength="50"  id="nombres" name="nombres" placeholder="">
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
                                   <input type="number" value="{{$usuarios->numero}}" class="form-control @error('numero') is-invalid @enderror" maxlength="50"  id="numero" name="numero" placeholder="">
                                     <span>Celular</span>
                                {!! $errors->first('numero','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                              <select class="form-control" id="cargos_id" name="cargos_id">
                                @foreach ($cargos as $carg)
                                     <option value="{{$carg->id}}" {{ $usuarios->cargo->id == $carg->id ? 'selected' : '' }}>      
                                      {{$carg->nombre}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('cargos_id','<span class=error>:message</span>') !!}
                                    <span> Secciones </span>
                                </div>

                                 <div class="form-group has-float-label">
                              <select class="form-control" id="jefes_id" name="jefes_id">
                                @foreach ($jefes as $jeve)
                                     <option value="{{$jeve->id}}" {{ $usuarios->jefe->id == $jeve->id ? 'selected' : '' }}>      
                                      {{$jeve->nombres}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('jefes_id','<span class=error>:message</span>') !!}
                                    <span> Secciones </span>
                                </div>


 <button class="btn btn-success" type="submit">Editar</button>
                                
                        </div>
                    </div>

              </div>


              <div class="col-12 col-lg-6">
                      <div class="card mb-4">
                       <div class="card-body">


                            <h4> Tipo de usuario </h4>

                      <div>
                        <div class="form-group">

                            @foreach ($rol as $roles)

                              <div>
         <input type="radio" id="usuario" name="roles_id" value="{{$roles->id}}" {{ $roles->id==$usuarios->roles_id?'checked':'' }}>
                                  <label for="usuario"> {{ $roles->title }} </label>
                              </div>
                             @endforeach
                            
                                 
                        
                                <p> El administrador es un usuario pero con los privilegios de  administrador del sistema </p>
                        </div>
                    </div>


                          <br>

                               <div class="form-group has-float-label">
                                       <div class="input-group date">
                                        <label>Fecha de cumpleaños</label>

            <input type="text"  class="form-control @error('fechacumples') is-invalid @enderror " maxlength="50"  id="fechacumples" name="fechacumples" >
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                {!! $errors->first('fechacumples','<span class=error>:message</span>') !!}
                                </div>


                        </div>
                      </div>
                    </div>


             </div>
             </form>

          </div>
      

  @stop