<!--FORMULARIO SACADO DE BOOTSTRAP-->

<!-- MENSAJES TRAIDOS DE EL CONTROLADOR Noticias -->
@if(session()->has('msjExito'))
  <div class="alert alert-success" role="alert">{{ session('msjExito') }}</div>
@endif
@if(session()->has('msjError'))
  <div class="alert alert-danger" role="alert">{{ session('msjError') }}</div>
@endif

                        <!-- ROLE='FORM', METODO='POST', ACCION = FUNCION()-->
<form class="form-horizontal" role="form" method="post" action="{{ url('noticias') }}" enctype="multipart/form-data">
  <!--SE INGRESA UN TOKEN-->
  <!--PARA QUE LA INFORMACION ENVIADA DEL FORMULARIO
  SEA ACEPTADA POR LARAVEL-->

  {{ csrf_field() }}

  <div class="form-group">
    <label for="titulo" class="col-sm-2 control-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="titulo" placeholder="titulo">

      @if($errors->has('titulo'))
      <span style="color:red">{{ $errors->first('titulo') }}</span>
      @endif

    </div>
  </div>
  <div class="form-group">
    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="descripcion" placeholder="descripcion"></textarea>

      @if($errors->has('descripcion'))
      <span style="color:red">{{ $errors->first('descripcion') }}</span>
      @endif

    </div>
  </div>
  <div class="form-group">
    <label for="urlImg" class="col-sm-2 control-label">Imagen</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="urlImg">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </div>
</form>
