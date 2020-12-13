@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

        <div class="card-body">
            <div class="card-body text-center">
                <h3 class="text-bold">Bienvenido  {{Auth::user()->nombres}}!!</h3>
            </div>
        </div>

        </div>
        </div>
    </div>
</div>
@endsection
