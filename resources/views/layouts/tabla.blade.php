<table class="table table-hover">
  @if(isset($noticias))
  <thead>
    <th>Titulo</th>
    <th>Descripción</th>
    <th>Imagen</th>
  </thead>
  <tbody>
    @foreach($noticias as $n)
      <tr>
        <td>{{ $n->titulo }}</td>
        <td>{{ $n->descripcion }}</td>
        <td>
          <img src="imgNoticias/{{ $n->urlImg }}" class="img-responsive" alt="Responsive image">
        </td>
        <td>
          <!--BOTON DE MODIFICAR-->
          <a href="noticias/{{ $n->id }}/edit" class="btn btn-warning btn-xs">Modificar</a>
          <!--BOTON DE ELIMINAR-->
          <form action="{{ route('noticias.destroy', $n->id )}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-danger btn-xs" value="Eliminar">
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
  @endif
</table>
