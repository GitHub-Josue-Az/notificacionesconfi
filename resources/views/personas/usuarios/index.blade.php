@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de usuarios</h1>

                   <a  class="btn btn-success float-right text-white" href="{{ route('admin.usuarios.create') }}">Crear usuario</a>  
                   
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
                            <th>Codigo</th>
                            <th>Nombres</th>
                            <th>Jefe</th>
                            <th>Cumpleaños</th><th></th><th></th><th></th>
                            <th width="80">Mostrar</th>
                            <th width="80">Editar</th>
                            <th width="80">Eliminar</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($usuarios as $user)
                             <tr>
                            <td>{{ $user->codigo }}</td>
                            <td>{{ $user->nombres }}</td>
                            <td>{{ $user->jefe->nombres }}</td>
                            <td>{{ $user->cumple->fechacumples }}</td><td></td><td></td><td></td>
                             <td><a href="{{ route('admin.usuarios.show', [$user->id]) }}" class="btn btn-info"><i class="fas fa-info"></i> Mostrar</a></td>
                            <td><a href="{{ route('admin.usuarios.edit', [$user->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.usu.update2',[$user->id]) }}">
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
