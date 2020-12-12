  @extends('layouts.app')


  @section('content')

          <div class="container-fluid">
            

              <div class="row">
                  <div class="col-12">
                      <h1>Comentarios de este cumpleaño</h1>

                
     <a class="btn btn-primary float-right"  href="{{ route('admin.cumple.index2') }}"><i class="iconsminds-to-left  "></i>Regresar</a>



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
                            <th>Descripción</th>
                        </tr>

                                </thead>

                                <tbody>
                        @foreach ($comentarios as $com)
                             <tr>
                            <td>{{ $com->user->nombres }}</td>
                            <td>{{ $com->user->jefe->nombres }}</td>
                            <td>{!! $com->descripcion !!}</td>

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