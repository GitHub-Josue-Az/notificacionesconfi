@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de cupones</h1>

                   <a  class="btn btn-success float-right text-white" href="{{ route('admin.cuponera.create') }}">Crear cupon</a>  
                   
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
                            <th width="80">Imagen</th>
                            <th width="30">Nombre</th>
                            <th width="30">Contacto</th>
                            <th width="30">Campo</th>
                            <th width="80">Telefono</th><th width="80"></th><th width="80"></th>
                            <th width="80">Mostrar</th>
                            <th width="80">Editar</th>
                            <th width="80">Eliminar</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($cupones as $cupon)
                             <tr>
         <td><img  src="{{route('cuponera.image', [$cupon->id])}}" width="130" height="120" ></td>
                            <td>{{ $cupon->nombre }}</td>
                            <td>{{ $cupon->contacto }}</td>
                            <td>{{ $cupon->campo->nombres }}</td>
                            <td>{{ $cupon->telefono }}</td><td></td><td></td>
                            <td><a href="{{ route('admin.cuponera.show', [$cupon->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i> Mostrar</a></td>
                            <td><a href="{{ route('admin.cuponera.edit', [$cupon->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.cup.update2',[$cupon->id]) }}">
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
