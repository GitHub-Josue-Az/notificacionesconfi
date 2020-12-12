@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de Cumpleaños pasados</h1> 

                     <a  class="float-right text-black" style="font-size: 150%">Fecha de hoy : {{ $daytoday->format('Y-m-d') }}<i class="iconsminds-clock"></i></a>
                   
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
                            <th width="150">Jefe</th>
                            <th width="80">Numero</th>
                            <th width="80">Fecha Cumpleaños</th><th  width="10"></th><th width="10"></th><th width="10">
                            </th><th width="10"></th><th width="10"></th>
                            <th width="80">Comentarios</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($cumplespasados as $cum)
                             <tr>
                            <td>{{ $cum->user->nombres }}</td>
                            <td>{{ $cum->user->jefe->nombres }}</td>
                            <td>{{ $cum->user->numero }}</td>
                            <td>{{ $cum->fechacumples }}</td><th></th><th></th><th></th><th></th><th></th>
                            <td><a href="{{ route('admin.cumple.show2', [$cum->id]) }}" class="btn btn-primary"><i class="fas fa-primary"></i> Comentarios</a></td>
                            

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
