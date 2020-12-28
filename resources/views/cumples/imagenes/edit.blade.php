  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.images.update',$imagen->id) }}" method="post" enctype="multipart/form-data" >
                                 
                {!! method_field('PUT') !!}
                <!--Middleware-->
               {!! csrf_field() !!}


              <div class="row">
                  <div class="col-12">
                      <h1>Editar tarjeta de felicitacion </h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.cumples.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">
               <div class="col-12 col-lg-6">
              
                <div class="card mb-4">
                        <div class="card-body">

                      <div class="form-group ">

                        <label > Tarjeta </label>

                    <td><img  src="{{route('tarjeta.image', [$imagen->id])}}" width="130px" height="120px" ></td>
                    
                                   <input type="file" value="{{old('logo')}}" class="form-control @error('logo') is-invalid @enderror"  id="logo" name="logo" placeholder="">
                              {!! $errors->first('logo','<span class=error>:message</span>') !!}
                       
                     </div>

                     {{-- <script>
                            CKEDITOR.replace( 'descripcion' );
                        </script> --}}
                            
                        <button class="btn btn-success" type="submit">Editar</button>
                            
                        </div>
                    </div>

                </div>
              
             </div>


             </form>

          </div>
      
  @stop