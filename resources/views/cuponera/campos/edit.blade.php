  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.campos.update',$campos->id) }}" method="post" enctype="multipart/form-data" >
                                 
                {!! method_field('PUT') !!}
                <!--Middleware-->
               {!! csrf_field() !!}


              <div class="row">
                  <div class="col-12">
                      <h1>Editar campo</h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.campos.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">
               <div class="col-12 col-lg-6">
              
                <div class="card mb-4">
                        <div class="card-body">

                       <div class="form-group has-float-label">
                                   <input type="text" value="{{ $campos->nombres }}" class="form-control @error('nombres') is-invalid @enderror" maxlength="50"  id="nombres" name="nombres" placeholder="">
                                    <span>Names</span>
                           {!! $errors->first('nombres','<span class=error>:message</span>') !!}
                     </div>   

                                <div class="form-group has-float-label">
                                   <input type="text" value="{{ $campos->descripcion }}" class="form-control @error('descripcion') is-invalid @enderror" maxlength="50"  id="descripcion" name="descripcion" placeholder="">
                                    <span>Descripcipon</span>
                                     {!! $errors->first('descripcion','<span class=error>:message</span>') !!}
                                </div>


                                 <button class="btn btn-success" type="submit">Editar</button>
                            
                        </div>
                    </div>
                </div>
             </div>
             </form>

          </div>
      
  @stop