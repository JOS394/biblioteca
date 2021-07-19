
{{-- <script src="{{asset('js/app.js')}}"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet"> --}}
@extends('layouth')
@section('contenido')

<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"/>
@if (Auth::user()->hasPermissionTo('ver categorias')) 


@if (session('agregado')=='ok')
<script>
Swal.fire(
    'Agregado!',
    'El registro ha sido agregado con exito.',
    'success' 
  )

</script>
@endif 


@if (session('editado')=='ok')
<script>
Swal.fire(
    'Editado!',
    'El registro ha sido editado con exito.',
    'success' 
  )

</script>
@endif 



@if (session('editado')=='ok')
<script>
Swal.fire(
    'Editado!',
    'El registro ha sido editado con exito.',
    'success' 
  )

</script>
@endif 

<div class="main main-raised ">
  <div class="container-fluid">
      
    <div class="card">
    <div class="card-body">
      {{-- barra de busqueda --}}
      <div class="card-header">
        <h4 class="card-title">Listado de categorias</h4>  </div>

      <table class="table table-striped display nowrap" id="categorias">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <a id="agregar1" class="btn btn-primary" href="{{url('/categorias/create')}}" type="submit" data-toggle="tooltip" data-html="true" title="Crear nueva categoria" >Agregar nueva categoria</a>
          </li>
    <li> &nbsp;  &nbsp; </li>
          <li>   <a id="agregar2" class="btn btn-success" href="{{url('/activos/create')}}" type="submit" data-toggle="tooltip" data-html="true" title="Agregar nuevo activo" >Agregar un nuevo activo</a></li>
    <li> &nbsp;  &nbsp; </li>
          <li>   <a id="agregar3" class="btn btn-warning" href="{{url('/activos')}}" type="submit" data-toggle="tooltip" data-html="true" title="Lista de Activos" >Activos</a></li>
        </ul>
        <br>
        <thead class="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre de categoria</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Creado en</th>
                <th scope="col">Actualizado en </th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($categorias as $categoria)     
            <tr>
                <td scope="row">{{$loop->iteration}}</td>        
                <td scope="row">{{$categoria->nom_categoria}}</td>
                <td scope="row">{{$categoria->descripcion}}</td>
                <td scope="row">{{$categoria->created_at}}</td>
                <td scope="row">{{$categoria->updated_at}}</td>
                <td scope="row">
                  @if (Auth::user()->hasPermissionTo('editar categorias')) 
                        <a  class='btn btn-success' href="{{ url('/categorias/'.$categoria->id.'/edit')}}" data-toggle="tooltip" data-html="true" title="Editar Categoria" ><i class="fas fa-edit"></i></a>
                  @endif
                        <br>
                    <br>
                    @if (Auth::user()->hasPermissionTo('eliminar categorias')) 
                    <form action="{{url ('/categorias/'.$categoria->id)}}" method="post" class="formulario-eliminar">
                    @csrf
                    {{method_field('DELETE')}}
                    <button  class='btn btn-danger ' type="submit"  data-toggle="tooltip" data-html="true" title="Eliminar Categoria" ><i class="far fa-trash-alt"></i></button></form>
                @endif        
    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('librerias.datatable')
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.js') }}">

  </div>
    </div>
  </div>
</div>
<script>
 $(document).ready(function() {

$('#categorias').DataTable( {
    
  language: {
        "sLoadingRecords": "<h5><span class='badge badge-secondary'>Cargando...</span></h5>",
           "sProcessing":     "<span class='badge badge-secondary'>Procesando...</span>",
            "lengthMenu": "Mostrar _MENU_ registros por pagina   <br>",
            "info": "Mostrando en la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "sin registros disponibles",
            "infoFiltered": "(Filtrado de from _MAX_ registros totales)",
            "search" : "Buscar:",
            "paginate" : {
              'next': 'Siguiente',
              'previous': 'Anterior'
            }
        },
      buttons: [
              {
                  extend: 'copy',
                  text: 'Copiar',
                  title: 'Activos',
                  filename: 'Activos',
              },  {
                  extend: 'excel',
                  text: 'Exportar a Excel',
                  title: 'Activos',
                  filename: 'Activos',
                  columns: ':visible',
                 rows: ':visible'
              }, {
                  extend: 'pdfHtml5',
                  text: 'Exportar a pdf',
                  orientation: 'landscape',
                  title: 'Activos',
                  pageSize: 'LEGAL',
                  filename: 'Activos',
              
                 
              },{
                  extend: 'print',
                  text: 'Imprimir',
                  exportOptions: {
                 autoprint:false,
                 page: 'current',
              
                 
              }
              }
          ],
          
    pageLength: 10,
    dom:  "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    lengthMenu: [[5,10,25,50, 100, -1], [5,10,25,50, 100, "All"]],
    fixedColumns: true,
    responsive:true,
    autoWidth:true
  } );
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
  @endif 
  
  
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
    <br>
    <br>
    <br>
    <br>

  @endsection
