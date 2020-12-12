@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de campos</h1>

                   <a  class="btn btn-success float-right text-white" href="{{ route('admin.campos.create') }}">Crear campo</a>  
                   
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
                            <th>Nombre</th>
                            <th>Descripcion</th><th width="10"></th><th width="10"></th><th width="10"></th><th width="10"></th><th width="10"></th><th width="10"></th>
                            <th width="80">Editar</th>
                            <th width="80">Eliminar</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($campos as $campo)
                             <tr>
                            <td>{{ $campo->nombres }}</td>
                            <td>{{ $campo->descripcion }}</td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td><a href="{{ route('admin.campos.edit', [$campo->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a></td>
                            <td><form method='POST' action="{{ route('admin.camp.update2',$campo->id) }}">
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
