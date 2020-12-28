  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

 <form  action="{{ route('admin.felicitaciones.update',$feliciedit->id) }}" method="post" enctype="multipart/form-data" >
                                 
                {!! method_field('PUT') !!}
                <!--Middleware-->
               {!! csrf_field() !!}


              <div class="row">
                  <div class="col-12">
                      <h1>Editar comentario de {{ $feliciedit->felicitadore->user->nombres }}</h1>

                      <a class="btn btn-primary float-right"  href="{{ route('admin.felicitaciones.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>

                      <div class="separator mb-5"></div>
                  </div>
              </div>

             <div class="row">
               <div class="col-12 col-lg-6">
                   <div class="card mb-4">
                        <div class="card-body">

                      <div class="form-group ">

                        <label > Descripción del comentario  </label>

    <textarea type="textarea"  class="form-control @error('descripcion') is-invalid @enderror" maxlength="490" name="descripcion" id="descripcion" placeholder="" > {{ old('descripcion',$feliciedit->descripcion) }} </textarea>
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