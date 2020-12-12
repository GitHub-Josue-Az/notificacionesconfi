@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de jefes</h1>

                   <a  class="btn btn-success float-right text-white" href="{{ route('admin.jefes.create') }}">Crear Jefe</a>  
                   
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
                            <th>Correo</th>
                            <th>Descripción</th>
                            <th>Nombres</th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th width="80">Editar</th>
                            <th width="80">Eliminar</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($jefes as $user)
                             <tr>
                            <td>{{ $user->correo }}</td>
                            <td>{{ $user->descripcion }}</td>
                            <td>{{ $user->nombres }}</td><td></td><td></td><td></td><td></td><td></td>
                            <td><a href="{{ route('admin.jefes.edit', [$user->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.jef.update2',[$user->id]) }}">
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
                </div>
            </div>
        </div>
    

@endsection
