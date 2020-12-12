@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de usuarios felicitados</h1> 
                   
                <h4></h4>

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
                           <th></th>
                            <th>Nombres</th>
                            <th>Jefe</th>
                            <th>Numero</th>
                            <th>Última Felicitación</th>
                            <th></th><th></th><th></th><th></th>
                            <th width="80">Comentarios</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($felicitados as $felici)
                             <tr>
                                <td></td>
                            <td><strong>{{ $felici->user->nombres }}</strong></td>
                            <td>{{ $felici->user->jefe->nombres }}</td>
                            <td>{{ $felici->user->numero }}</td>
                            <td>{{ $felici->ultimo->diffForHumans(['parts' => 2,]) }}</td>
                            <td></td><td></td><td></td><td></td>
                            <td><a href="{{ route('admin.felicitaciones.show',[$felici->users_id]) }}" class="btn btn-primary"><i class="fas fa-primary"></i> Comentarios</a></td>
                            

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
@endsection
