<!--EXTENCION AL ARCHIVO APP DE LA CARPETA LAYOUTS-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <!--SE PREGUNTA SI EDIT ES TRUE(VA A MODIFICAR LA NOTICIA)-->
                  @if(isset($edit))
                    <!--INCLUIR EL ARCHIVO MODIFICAR DE LA CARPETA LAYOUTS-->
                    @include('layouts.modificar')
                  @else
                    <!--INCLUIR EL ARCHIVO FORMULARIO DE LA CARPETA LAYOUTS-->
                    @include('layouts.formulario')
                    <!--INCLUIR EL ARCHIVO TABLA DE LA CARPETA LAYOUTS-->
                    @include('layouts.tabla')
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
