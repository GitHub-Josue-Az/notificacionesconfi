  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Comentarios de este cumpleaño</h1>

                
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
                            <th width="110">Nombres</th>
                            <th width="100">Jefe</th>
                            <th>Descripción</th>
                            <th width="150">Modificar comentario</th>
                            <th width="80">Eliminar</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($comentarios as $com)
                             <tr>
                            <td>{{ $com->user->nombres }}</td>
                            <td>{{ $com->user->jefe->nombres }}</td>
                            <td>{!! $com->descripcion !!}</td>
                           <td><a href="{{ route('admin.cumples.edit', [$com->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.comcumple.update2',[$com->id]) }}">
                                      {!! method_field('PUT') !!}
                                         {!! csrf_field() !!}
                                 <button class="btn btn-danger" type="submit" >Eliminar</button>
                            </form></td>
                            

                        </tr>
                        @endforeach
                         </tbody>

                            </table>
                        </div>


                    </div>
                    <br>


                </div>
            </div>



      </div>   
      
  @stop