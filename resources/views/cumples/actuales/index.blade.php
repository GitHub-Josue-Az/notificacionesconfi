@extends('layouts.app')


@section('content')

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1>Listado de Cumpleaños</h1> 

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
                            <th>Nombres</th>
                            <th>Jefe</th>
                            <th>Numero</th>
                            <th>Estado</th>
                            <th>cumpleaños</th>
                            <th></th>
                            <th> Tarjetas </th>
                            <th> Mail </th>
                            <th >Comentarios</th>
                            <th >Eliminar</th>

                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($uniontwo as $union)
                             <tr>
                            <td>{{ $union->user->nombres }}</td>
                            <td>{{ $union->user->jefe->nombres }}</td>
                            <td>{{ $union->user->numero }}</td>
                            <td>{!! $union->estadoTag !!}</td>
                            <td>{!! $union->fechaTag !!}</td>
                            <td></td>
                            <td><a href="{{ route('admin.cumples.tarjeta', [$union->id]) }}" class="btn btn-secondary mb-1"><i class="fas fa-primary"></i> Tarjeta</a></td>
                            <td><a href="{{ route('admin.cumples.enviomail', [$union->user->id]) }}" class="btn btn-light mb-1"><i class="fas fa-primary"></i> Mail </a></td>
                            <td><a href="{{ route('admin.cumples.show', [$union->id]) }}" class="btn btn-primary"><i class="fas fa-primary"></i> Comentarios</a></td>
                            <td><form style="display:inline" method='POST' action="{{ route('admin.cum.update2',[$union->id]) }}">
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
@endsection
