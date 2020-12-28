  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Tarjetas de este cumpleaño</h1>

                
     <a class="btn btn-primary float-right"  href="{{ route('admin.cumples.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>


                    <div class="separator mb-5"></div>
                  </div>
              </div>

              

            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                           


                           <table class="data-table data-table-feature">

                                <thead>
                                   <tr>
                            <th width="150">Tarjeta</th>
                            <th></th>
                            <th width="80">Modificar</th>
                            <th width="80">Eliminar</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($image as $com)
                             <tr>
                            <td><img  src="{{route('tarjeta.image', [$com->id])}}" width="130px" height="120px" ></td>
                            <td></td>
                           <td><a href="{{ route('admin.images.edit', [$com->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.images.update2',[$com->id]) }}">
                                      {!! method_field('PUT') !!}
                                         {!! csrf_field() !!}
                                 <button class="btn btn-danger" type="submit" >Eliminar</button>
                            </form></td>
                            

                        </tr>
                        @endforeach
                         </tbody>

                            </table>


      <form  action="{{ route('admin.images.store') }}" method="post" enctype="multipart/form-data" >
                                 <!--Middleware-->
                                    {!! csrf_field() !!}

        <div class="form-group">
          <input type="file" style="width: 400px" class="form-control" name="logo[]" id="logos[]" multiple>
          <input type="number" style="visibility: hidden" name="users_id" id="users_id" value="{{ $iduser}}">

         </div>

                <button type="submit" class="btn btn-primary">Cargar</button>
       </form>

                        </div>


                    </div>
                    <br>


                </div>
            </div>



      </div>   
      
  @stop