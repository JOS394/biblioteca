
{{-- <script src="{{asset('js/app.js')}}"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet"> --}}
@extends('layouth')
@section('contenido')
@if (Auth::user()->hasPermissionTo('ver usuarios')) 
@if (session('agregado')=='ok')
<script>
Swal.fire(
    'Agregado!',
    'El usuario ha sido agregado con exito.',
    'success' 
  )

</script>
@endif 

@if (session('editado')=='ok')
<script>
Swal.fire(
    'Editado!',
    'El usuario ha sido editado con exito.',
    'success' 
  )

</script>
@endif 
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


<div class="main main-raised ">
  <div class="container-fluid py-5 ">
      {{-- barra de busqueda --}}
      <div class="card">
        <div class="card-body">
          <div class="text-center"> <h4 class="card-title">Listado de usuarios</h4></div>
         

      

      <div class="table-responsive-sm">
      <table class="table table-striped nowrap display" id="usuarios">
       
        <thead class="thead">
         <tr>
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              @if (Auth::user()->hasPermissionTo('crear usuarios')) 
              <a id="agregar" class="btn btn-primary" href="{{url('/usuarios/create')}}" type="submit"  data-toggle="tooltip" data-placement="bottom" title="Crear nuevo usuario">Agregar nuevo usuario</a>
            </li>
            @endif
          </ul>
         </tr>
         
          <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Tipo de Usuario</th>
                <th scope="col">Creado en</th>
                <th scope="col">Actualizado en </th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($usuarios as $usuario)     
            <tr>
                <td scope="row">{{$loop->iteration}}</td>        
                <td scope="row">{{$usuario->username}}</td>
                <td scope="row">{{$usuario->nom_completo}}</td>
                @if ($usuario->tipo_usuario)
              
            @endif
                <td scope="row">  
                    @if ($usuario->tipo_usuario=='1'){{'1-Administrador'}}@endif
                    @if ($usuario->tipo_usuario=='2'){{'2-Editor'}}@endif
                    @if ($usuario->tipo_usuario=='3'){{'3-Espectador'}}@endif
                </td>
                <td scope="row">{{$usuario->created_at}}</td>
                <td scope="row">{{$usuario->updated_at}}</td>
                <td scope="row">
                    
@if (Auth::user()->hasPermissionTo('editar usuarios')) 
                        <a  class='btn btn-success btn-sm' href="{{ url('/usuarios/'.$usuario->id.'/edit')}}"  data-toggle="tooltip" data-placement="bottom" title="Editar el usuario"><i class="fas fa-edit"></i></a>
@endif
@if (Auth::user()->hasPermissionTo('ver permisos')) 
<a  class='btn btn-warning btn-sm' href="{{ url('/permisos/'.$usuario->id)}}"  data-toggle="tooltip" data-placement="bottom" title="permisos del usuario"><i class="fas fa-list-ol "></i></a>
@endif                
                  
    @if (Auth::user()->hasPermissionTo('eliminar usuarios') && Auth::user()->username != $usuario->username)
                    <form action="{{url ('/usuarios/'.$usuario->id)}}" style="display: inline;" method="post" class="formulario-eliminar">
                    @csrf
                    {{method_field('DELETE')}}
                    <button   class='btn btn-danger btn-sm ' type="submit"  data-toggle="tooltip" data-placement="bottom" title="Eliminar usuario" ><i class="far fa-trash-alt"></i></button>
                  
                  </form>
    @endif
    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
      </div>

  
    </div>
  </div>
 
      </div>
  </div>



  <script type="text/javascript" charset="utf8" src="{{ asset('datatable/js/jquery.dataTables.js') }}"></script>

  <script>
  $(document).ready(function() {
    var table = $('#usuarios').DataTable();
  } );
      </script>
  
  
  
  
  {{-- aqui empieza las alertas para los botones --}}
  
  {{-- condicional para mandar la notificacion despues de la accion --}}
    @if (session('eliminar')=='ok')
    <script>
      Swal.fire(
        'Eliminado!',
        'Tu registro ha sido eliminado.',
        
        'warning'
  
      )
  
    </script>
  
  <script>
  
//   se detiene la accion para preguntar y luego se ejecuta segun respuesta
$('.formulario-eliminar').submit(function(e){
    e.preventDefault();
    Swal.fire({
  title: 'Seguro que quieres eliminar el registro?',
  text: "Una vez eliminado, ya no podras recuperarlo!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar registro!'
}).then((result) => {
  if (result.isConfirmed) {

    this.submit();
  }
})

})
  </script>

  <script>

var button = document.getElementById("agregar");

button.onclick = function()
{
    let timerInterval
Swal.fire({
  title: 'Redireccionando',
  timer: 1600,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
    

}
}).then((result) => {

  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
      button.onclick();
    console.log('I was closed by the timer')
  }
})




	}

  </script>
    @endif 
    @else
    <div class="main main-raised">
      <div class="container">
    <div class="container-fluid py-5 ">
    <div class="card">
      <div class="card-header">
      <center><h3> Aviso </h3> </center>
      </div>
      <div class="card-body">
        <center><img src="{{ asset('images/denegado.jpg') }}" alt=""></center>
        <center>
        <h6 class="card-title">No tienes los permisos adecuados para realizar esta accion</h6>
        <p class="card-text">Si necesitas  permisos ponte en contacto con el administrador</p>
        <a href="{{url('home')}}" class="btn btn-primary">Regresar a la pantalla de inicio</a>
      </center>
      </div>
    </div>
    </div>
      </div>
    </div>
    @endif
  @endsection