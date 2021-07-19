
{{-- <script src="{{asset('js/app.js')}}"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet"> --}}
@extends('layouth')
@section('contenido')
@if (Auth::user()->hasPermissionTo('ver permisos')) 
<style>
  .child td {word-wrap:break-word; white-space: normal !important;}
 
 .btn-circle.btn-xl {
     width: 70px;
     height: 70px;
     padding: 10px 16px;
     border-radius: 35px;
     font-size: 24px;
     line-height: 1.33;
 }
 
 .btn-circle {
     width: 30px;
     height: 30px;
     padding: 6px 0px;
     border-radius: 15px;
     text-align: center;
     font-size: 12px;
     line-height: 1.42857;
 }
    </style>




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

      <div class="container-fluid py-2 ">

        <div class="card">
          <div class="card-body">
            <div class="text-center"> <h4 class="card-title">Administracion de permisos</h4></div>
           

      <div class="table-responsive-sm">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            @if (Auth::user()->hasPermissionTo('ver usuarios')) 
            <a id="agregar" class="btn btn-primary" href="{{url('/usuarios/')}}" type="submit"  data-toggle="tooltip" data-placement="bottom" title="Crear nuevo usuario"><i class="fas fa-user-friends"></i>Volver a usuarios</a>
          </li>
          @endif
        </ul>
        <br>
        <br>
      <table class="table table-hover table-striped" id="permisos">
       
        <thead class="thead">

         
          <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Permisos de Usuario</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($usuarios as $usuario)     
            <tr>
                <td scope="row">{{$loop->iteration}}</td>        
                <td scope="row">{{$usuario->username}}</td>
                <td scope="row">  
                    @if ($usuario->tipo_usuario=='1') <span class="badge bg-success"> {{'Administrador'}}</span> @endif
                    @if ($usuario->tipo_usuario=='2')<span class="badge bg-primary"> {{'Editor'}}</span> @endif
                    @if ($usuario->tipo_usuario=='3')<span class="badge bg-secondary"> {{'Espectador'}}</span> @endif
                </td>
                <td scope="row">
                  @foreach ($permisos as $permiso) 
                  
                  <span class="badge bg-danger">{{$permiso->name}} </span> &nbsp;

                  @endforeach
                </td>
                <td scope="row">
                    
@if (Auth::user()->hasPermissionTo('editar permisos')) 
<center>
                        <a  class='btn btn-success btn-circle' href="{{ url('/permisos/'.$usuario->id.'/edit')}}" 
                           data-toggle="tooltip" data-placement="bottom" title="Administrar permisos"><i class="fas fa-unlock-alt"></i></a></center>
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


  <script type="text/javascript" charset="utf8" src="{{ asset('datatable/js/jquery.dataTables.js') }}"></script>

  <script>
    $(document).ready(function() {
      var table = $('#permisos').DataTable({
    pageLength: 10,
    lengthMenu: [[5,10,25,50, 100, -1], [5,10,25,50, 100, "All"]],
    fixedColumns: true,
    responsive:true,
    autoWidth:true,
      }


        
      );
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