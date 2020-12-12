@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

               <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="mb-4"> Enviar mensaje a todos los usuarios </h3>

                            <hr class="mb-4" />


                            <form action="{{ route('admin.general.soli') }}" method="post" enctype="multipart/form-data">

                                    {!! csrf_field() !!}

                                <div class="form-group ">

               <div class="form-group has-float-label">
                                   <input type="text" value="{{old('titulo')}}" class="form-control @error('titulo') is-invalid @enderror" maxlength="50"  id="titulo" name="titulo" placeholder="">
                                   <span>Titulo notificacion</span>
                                 {!! $errors->first('titulo','<span class=error>:message</span>') !!}
                                </div>                                    


         <textarea type="textarea"  class="form-control @error('mensaje') is-invalid @enderror" maxlength="300" name="mensaje" id="mensaje" placeholder="" > {{ old('mensaje')}} </textarea>
                     </div>



                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
