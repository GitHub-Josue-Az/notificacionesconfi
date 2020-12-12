{{--   @extends('layouts.app')


  @section('content')

          <div class="container-fluid">

              <div class="row">
                  <div class="col-12">
                      <h1>Solicitudes para la conferencia {{ $comconfe->nombre }} </h1>

                
     <a class="btn btn-primary float-right"  href="{{ route('admin.conferencias.index') }}"><i class="iconsminds-to-left  "></i>Regresar</a>



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
                            <th width="150">Fecha</th>
                            <th width="80">Estado </th>
                            <th width="80">Aceptar</th>
                            <th width="80">Rechazar</th>

                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($jeje as $clave => $com)
                             <tr>
                            <td>{{ $com->nombres }}</td>
                            <td>{{ $com->jefe->nombres }}</td>
                           
                            <td>{{ $com->confer_user->created_at->diffForHumans(['parts' => 2,]) }}</td>

                             <td>{!! $com->estadopivotTag !!}</td>

                             @if ( $com->confer_user->estado == 0)
                <td>
               <form style="display:inline" method='POST' action="{{ route('admin.confe.aceptar',[$comconfe->id , $com->id]) }}">
                       {!! method_field('PUT') !!}
                      {!! csrf_field() !!}
                       <button class="btn btn-primary" type="submit" >Aceptar</button>
                   </form>
                </td>
                <td>
               <form style="display:inline" method='POST' action="{{ route('admin.confe.rechazar',[$comconfe->id, $com->id]) }}">
                       {!! method_field('PUT') !!}
                      {!! csrf_field() !!}
                       <button class="btn btn-danger" type="submit" >Rechazar</button>
                   </form>
                </td>
                             @endif

                        {{-- @for ($i = 0; $i < 3; $i++)        
                <td><input type="radio" name="correct[{{ $com->id }}]" value="{{ $i }}" {{ $i == $com->pivot->estado?'checked' : '' }}></td>
                        @endfor --}}

                            </tr>
                        @endforeach
                                </tbody>

                            </table>   
                        </div>

                    </div>
                    <br>

                </div>
            </div>

  </form>

      </div>   
      
  @stop --}}