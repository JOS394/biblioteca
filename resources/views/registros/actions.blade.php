<form action="{{route('registros.destroy',$id)}}" method="post" class="formulario-eliminar">
@csrf
    {{method_field('DELETE')}}
    <button  class='btn btn-danger btn-circle btn-xs' name="delete"  type="submit" data-toggle="tooltip" data-placement="right" title="Eliminar  activo " ><i class="far fa-trash-alt fa-xs"></i></button></form>