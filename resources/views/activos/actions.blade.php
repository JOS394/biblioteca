<a  class='btn btn-success btn-sm btn-circle ' name="edit" id="edit" onclick="eliminar()" href="{{ route('activos.edit',$id)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar activo "><i class="fas fa-edit  "></i></a><br><br>
<a  class='btn btn-primary btn-sm btn-circle' name="show-" id="show"   href="{{ route('registros.show',$id)}}"   data-bs-toggle="tooltip" data-bs-placement="left" title="ver registros del activo " ><i class="fas fa-server"></i></a> </button>
<br>
<br>
<form action="{{route('activos.destroy',$id)}}" method="post" class="formulario-eliminar">
@csrf
    {{method_field('DELETE')}}
    <button  class='btn btn-danger btn-circle' name="delete"  data-id="{{$id}}" type="submit" data-bs-toggle="tooltip" data-bs-placement="right" title="Eliminar  activo " ><i class="far fa-trash-alt "></i></button></form>

    