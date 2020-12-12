  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Felicitaciones para el usuario {{ $comentarios[0]->user->nombres }}</h1>

                
     <a class="btn btn-primary float-right"  href="{{ route('admin.felicitaciones.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>



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
                            <th width="150">Nombres</th>
                            <th width="120">Jefe</th>
                            <th width="150"> Fecha </th>
                            <th>Descripción</th><th></th><th></th><th></th><th></th>
                            <th width="100">Editar</th>
                            <th width="100">Eliminar</th>

                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($comentarios as $com)
                             <tr>
                            <td>{{ $com->felicitadore->user->nombres }}</td>
                            <td>{{ $com->felicitadore->user->jefe->nombres }}</td>
                            <td>{{ $com->created_at->diffForHumans(['parts' => 2,]) }}</td>
                            <td>{!! $com->descripcion !!}</td><td></td><td></td><td></td><td></td>
                             <td><a href="{{ route('admin.felicitaciones.edit', [$com->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                              <td><form style="display:inline" method='POST' action="{{ route('admin.comfelici.update2',[$com->id]) }}">
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