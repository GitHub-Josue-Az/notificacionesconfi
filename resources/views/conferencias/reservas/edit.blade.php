  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.alumnos.update',$alumnos->id) }}" method="post" enctype="multipart/form-data" >
                                 
                {!! method_field('PUT') !!}
                <!--Middleware-->
               {!! csrf_field() !!}


              <div class="row">
                  <div class="col-12">
                      <h1>Editar estudiante</h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.alumnos.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">
               <div class="col-12 col-lg-6">
              
                <div class="card mb-4">
                        <div class="card-body">

                      <div class="form-group has-float-label">
                                   <input type="text" value="{{ $alumnos->nombres }}" class="form-control @error('nombres') is-invalid @enderror" maxlength="50"  id="nombres" name="nombres" placeholder="">
                                    <span>Names</span>
                           {!! $errors->first('nombres','<span class=error>:message</span>') !!}
                     </div>   

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{ $alumnos->usuario }}" class="form-control @error('usuario') is-invalid @enderror" maxlength="50"  id="usuario" name="usuario" placeholder="">
                                    <span>Usuario</span>
                                     {!! $errors->first('usuario','<span class=error>:message</span>') !!}
                                </div>
                                
                                <div class="form-group has-float-label">
                                   <input type="password"  class="form-control @error('password') is-invalid @enderror" maxlength="50"  id="password" name="password" placeholder="">
                                   <span>Password</span>
                                 {!! $errors->first('password','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" maxlength="50"  id="password_confirmation" name="password_confirmation" placeholder="">
                                   <span>password_confirmation</span>
                                 {!! $errors->first('password_confirmation','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{ $alumnos->apellidop }}" class="form-control @error('apellidop') is-invalid @enderror" maxlength="50"  id="apellidop" name="apellidop" placeholder="">
                              <span>Apellido Paterno</span>
                               {!! $errors->first('apellidop','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{ $alumnos->apellidom }}" class="form-control @error('apellidom') is-invalid @enderror" maxlength="50"  id="apellidom" name="apellidom" placeholder="">
                          <span>Apellido Materno</span>
                           {!! $errors->first('apellidom','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{ $alumnos->fechanaci }}" class="form-control @error('fechanaci') is-invalid @enderror" maxlength="50"  id="fechanaci" name="fechanaci" placeholder="">
                            <span>Fecha nacimiento</span>
                                {!! $errors->first('fechanaci','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="number" value="{{ $alumnos->celular }}" class="form-control @error('celular') is-invalid @enderror" maxlength="50"  id="celular" name="celular" placeholder="">
                                     <span>celular</span>
                                {!! $errors->first('celular','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="number" value="{{ $alumnos->dni }}" class="form-control @error('dni') is-invalid @enderror" maxlength="50"  id="dni" name="dni" placeholder="">
                                  <span>DNI</span>
                                {!! $errors->first('dni','<span class=error>:message</span>') !!}
                                </div>

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{ $alumnos->domicilio }}" class="form-control @error('domicilio') is-invalid @enderror" maxlength="50"  id="domicilio" name="domicilio" placeholder="">
                                  <span>Domicilio</span>
                                {!! $errors->first('domicilio','<span class=error>:message</span>') !!}
                                </div>
                            
                        </div>
                    </div>

              </div>


              <div class="col-12 col-lg-6">  
              
                     <div class="card mb-4">
                         <div class="card-body">
                        
                             <div class="form-group has-float-label">
                              <select class="form-control" id="generos_id" name="generos_id">
                                @foreach ($generos as $gener)
                                     <option value="{{$gener->id}}" {{ $alumnos->genero->id == $gener->id ?'selected' : '' }}> 
                                      {{$gener->title}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('generos_id','<span class=error>:message</span>') !!}
                                    <span>Generos</span>
                                </div>
                               

                                <div class="form-group has-float-label">
                              <select class="form-control" id="padres_id" name="padres_id">
                                @foreach ($padres as $pad)
                                     <option value="{{$pad->id}}" {{ $alm->padre->id == $pad->id ? 'selected' : '' }}> 
                                      {{$pad->user->nombres}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('padres_id','<span class=error>:message</span>') !!}
                                    <span> Apoderado </span>
                                </div>


                                <div class="form-group has-float-label">
                              <select class="form-control" id="parentescos_id" name="parentescos_id">
                                @foreach ($parentescos as $parent)
                                     <option value="{{$parent->id}}" {{ $alm->parentesco->id == $parent->id ? 'selected' : '' }}>           {{$parent->title}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('parentescos_id','<span class=error>:message</span>') !!}
                                    <span> Parentesco </span>
                                </div>


                                <div class="form-group has-float-label">
                              <select class="form-control" id="grados_id" name="grados_id">
                                @foreach ($grados as $grad)
                                     <option value="{{$grad->id}}" {{ $alm->grado->id == $grad->id ? 'selected' : '' }}>
                                      {{$grad->title}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('grados_id','<span class=error>:message</span>') !!}
                                    <span> Grados </span>
                                </div>


                                <div class="form-group has-float-label">
                              <select class="form-control" id="seccions_id" name="seccions_id">
                                @foreach ($seccions as $secci)
                                     <option value="{{$secci->id}}" {{ $alm->seccion->id == $secci->id ? 'selected' : '' }}>      
                                      {{$secci->title}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('seccions_id','<span class=error>:message</span>') !!}
                                    <span> Secciones </span>
                                </div>


                                <div class="form-group has-float-label">
                              <select class="form-control" id="nivels_id" name="nivels_id">
                                @foreach ($nivels as $nive)
                                     <option value="{{$nive->id}}" {{ $alm->nivel->id == $nive->id ? 'selected' : '' }}> 
                                      {{$nive->title}}</option>
                                 @endforeach
                              </select> 
                            {!! $errors->first('nivels_id','<span class=error>:message</span>') !!}
                                    <span> Niveles </span>
                                </div>



                                <button class="btn btn-success" type="submit">Editar</button>

                         </div>
                     </div>   
                     
               </div> 

              
             </div>


             </form>

          </div>
      
  @stop