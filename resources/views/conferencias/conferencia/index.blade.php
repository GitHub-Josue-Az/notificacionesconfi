@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1> Conferencias disponibles </h1>

                   <a  class="btn btn-success float-right text-white" href="{{ route('admin.conferencias.create') }}">Crear Conferencia</a>  
                   
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
                            <th>Imagen</th>
                            <th>Entidad</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Fecha Limite</th><th></th><th></th>
                            {{--  <th>Disponibles</th> --}}
                           {{--  <th width="80">Solicitudes</th> --}}
                            <th width="80">Mostrar</th>
                            <th width="80">Editar</th>
                            <th width="80">Eliminar</th>
                            
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($conferencia as $confe)
                             <tr>
                    <td><img  src="{{route('confe.image', [$confe->id])}}" width="130px" height="120px" ></td>
                             <td>{{ $confe->entidad }}</td>
                            <td>{{ $confe->nombre }}</td>
                            <td>{!! $confe->estadoTag !!}</td>
                            {{-- <td>{{ $confe->capacidad }}</td> --}}
                            <td>{{ $confe->limithour->format('Y-m-d H:i') }}</td><td></td><td></td>
                            {{-- <td> {{ $confe->capacidad - $confe->limite  }} </td> --}}
                            {{-- <td><a href="{{ route('admin.confe.soli', [$confe->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Solicitudes</a></td> --}}
                            <td><a href="{{ route('admin.conferencias.show', [$confe->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i> Mostrar</a></td>
                            <td><a href="{{ route('admin.conferencias.edit', [$confe->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.confe.update2',[$confe->id]) }}">
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
