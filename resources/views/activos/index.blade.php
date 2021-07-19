
@extends('layouth')
@section('contenido') 

<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('ver activos')) 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"/>

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

@if (session('sinpermisos')=='ok')
<script>
Swal.fire(
    'Permisos  insuficientes!',
    'No tienes permisos realizar la accion.',
    'error' 
  )

</script>
@endif 

@if (session('agregado')=='ok')
<script>
Swal.fire(
    'Agregado!',
    'El registro ha sido agregado con exito.',
    'success' 
  )

</script>
@endif 

<div class="main main-raised ">
  <div class="container-fluid">
      {{-- barra de busqueda --}}

        <div class="card" >
          <center><h4 class="card-title">Lista de activos</h4></center>
     
  <div class="card-body">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        
        <a id="agregar" class="btn btn-primary" href="{{url('/activos/create')}}" type="submit" data-bs-toggle="tooltip" data-bs-placement="right" title="creacion nuevo activo">Agregar nuevo activo</a>
      </li>
    </ul>
      <table class="table table-striped  responsive display " id="activos" style="width:100%" cellspacing="0">  
        <thead class="thead table-light ">

            <tr>
              <hr>
              <th scope="col"></th>
              <th scope="col">#</th>
              <th scope="col">&nbsp;</th>
                <th scope="col"><i class="fas fa-image fa-1x"></i></th>
                <th scope="col">Nombre</th>
                <th scope="col">Codigo</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Area</th>
                <th scope="col">Estado activo</th>
                <th scope="col">Destinatario</th>
                <th scope="col">Encargado</th>
                <th scope="col">Categoria</th>
                <th scope="col">Marca</th>
                <th scope="col">Usuario</th>           
                <th scope="col">Estado fisico</th>
                <th scope="col">Valor activo $</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha Adquisicion</th>
                <th scope="col">Fecha Ingreso</th>
                {{-- <th scope="col">Actualizado en </th> --}}
              
            </tr>
        </thead>
<tbody>
</tbody>

<tfoot>
  <tr>
    <hr>
    <th scope="col"></th>
    <th scope="col">#</th>
    <th scope="col">&nbsp;</th>
      <th scope="col"><i class="fas fa-image fa-1x"></i></th>
      <th scope="col">Nombre</th>
      <th scope="col">Codigo</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Area</th>
      <th scope="col">Estado activo</th>
      <th scope="col">Destinatario</th>
      <th scope="col">Encargado</th>
      <th scope="col">Categoria</th>
      <th scope="col">Marca</th>
      <th scope="col">Usuario</th>           
      <th scope="col">Estado fisico</th>
      <th scope="col">Valor activo $</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha Adquisicion</th>
      <th scope="col">Fecha Ingreso</th>
      {{-- <th scope="col">Actualizado en </th> --}}
    
  </tr>
</tfoot>
    </table>
  </div>
</div>
</div>
</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>


  <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
  
@include('librerias.datatable')





  <!-- UI JS file -->
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
   
<script>
  $(function () {
	$('[data-bs-toggle="tooltip"]').tooltip()
  })
</script>
  @if (session('editado')=='ok')
  <script>
  Swal.fire(
      'Editado!',
      'El registro ha sido editado con exito.',
      'success' 
    )
  
  </script>
  
  @endif 

 
 


<script>

$(document).ready(function() {

    $('#activos').DataTable( {
     
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
      columnDefs: [ {
              width: "40px",
              targets:   14
          } ], 
     
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
    lengthMenu: [[5,10,25,50, 100, -1], [5,10,25,50, 100, "All"]],
    fixedColumns: true,
    responsive:true,
    autoWidth:true,
    Serverside:true,
      ajax: "{{ route('activos.index') }}",
      
      dom:  "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      columns:[
        {
                class:          "dtr-control",
                orderable:      false,
                data:           null,
                defaultContent: ""
            },          
  {data:'id',name:'id'},
  {data: 'actions', name: 'action', orderable: false, searchable: false},
  {data:'foto',
   name:'foto',
   render:function(data,type,full,meta){
     return "<img src={{asset('storage').'/'}}"+data+" width='100' value='"+data+"'> "
   } 
  },
  {data:'nom_activo',name:'Nombre' },
  {data:'codigo_activo'},

  {data:'ubicacion_act'},
  {data:'area'},
  {data:'estado_activo'},
  {data:'destinatario'},
  {data:'encargado_act'},
  {data:'categoria_activo'}, 
  {data:'marca_act',name:'Marca'},
  {data:'username'},
  {data:'estado_fisico_activo'},
  {data:'valor_adquisicion'},
  {data:'descripcion'},
  {data:'fechaadquisicion'},
  {data:'created_at'},
 
],
    responsive: {
              details: {
                  type: 'column',
                  autoWidth: true
              }
          },
          columnDefs: [ {
              className: 'dtr-control',
              orderable: true,
              targets:   0
          } ],
          
          order: [ 1, 'asc' ]
  
  });
  
  });
    </script>



{{-- aqui empieza las alertas para los botones --}}

{{-- condicional para mandar la notificacion despues de la accion --}}
  @if (session('eliminar')=='ok')
  <script>
    Swal.fire(
      'Dado de baja!',
      'El activo se ha movido a la papelera.',
      'warning'
    )

  </script>
  @endif 
  
  {{-- <script>
  
//   se detiene la accion para preguntar y luego se ejecuta segun respuesta
$("#activos").on("click", "#delete", function (e) {
    e.preventDefault();
    let form = e.target;
    Swal.fire({
  title: 'Seguro que quieres dar de baja el registro?',
  text: "Una vez dado de baja, tendras que recuperarlo en la papelera!",
  icon: 'warning',
  popup: 'animate__animated animate__fadeInDown',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  
  confirmButtonText: 'Si, dar de baja el  registro!'
}).then((result) => {
  if (result.isConfirmed) {

    $(this).trigger('click');
  }
})

})
  </script> --}}

  <script>

var button = document.getElementById("agregar");

button.onclick = function()
{
    let timerInterval
Swal.fire({
  title: 'Redireccionando',
  text: 'por favor espere.',
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
    
  }
})
	}

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
  @endsection