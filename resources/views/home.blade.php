<!--EXTENCION AL ARCHIVO APP DE LA CARPETA LAYOUTS-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <!--INCLUIR EL ARCHIVO FORMULARIO DE LA CARPETA LAYOUTS-->
                    @include('layouts.formulario')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
