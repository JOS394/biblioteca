
@extends('layouth')
@section('contenido')
@if (Auth::user()->hasPermissionTo('ver registros')) 
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"/>


{{-- condicional para mandar la notificacion despues de la accion --}}
<style>
  .child td {word-wrap:break-word; white-space: normal !important;}
 
 
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
@if (session('eliminar')=='ok')
<script>
  Swal.fire(
    'Dado de baja!',
    'Tu registro se ha movido a la papelera.',
    
    'warning'

  )

</script>
@endif 


<div class="main main-raised ">
  <div class="container-fluid">
        <div class="card">
  <div class="card-body">
    
         <center>   <h4 class="card-title">Listado de Registros</h4></center>
        
          <a  class='btn btn-success' href="{{ url('activos')}}" ><i class="fas fa-boxes"></i>Activos</a>
        
         <br>
         <div class="table-responsive-lg">

      <table class="table table-striped display nowrap" id="registros" style="width:100%">
        
          <thead class="thead table-light ">
              <tr>
                <th></th>
                  <th scope="col">#</th>
                  <th scope="col">Eliminar</th>
                  <th scope="col">Tipo de registro</th>
                  <th scope="col">Nombre activo (<span class="badge rounded-pill bg-light text-dark">ID</span>)</th>    
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
              </tr>
          </thead>
      
          <tbody>
          </tbody>
          <tfoot>
            <tr>
                <td></td>
                <th scope="col">#</th>
                <th scope="col">Eliminar</th>
                <th scope="col" class="col-sm-2">Tipo de registro</th>
                <th scope="col">Nombre activo (<span class="badge rounded-pill bg-light text-dark">ID</span>)</th>    
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
            </tr>
          </tfoot>

      </table>
    </div>
  </div>
  </div>
  </div>
  


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/sl-1.3.3/datatables.min.js"></script>


  <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
  
@include('librerias.datatable')





  <!-- UI JS file -->
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>



<script>

  $(document).ready(function() {
    
  
      $('#registros').DataTable( {
      
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
                    title: 'Registros',
                    filename: 'Registros',
                },  {
                    extend: 'excel',
                    text: 'Exportar a Excel',
                    title: 'Registros',
                    filename: 'Registros',
                    columns: ':visible',
                   rows: ':visible'
                }, {
                    extend: 'pdfHtml5',
                    text: 'Exportar a pdf',
                    orientation: 'landscape',
                    title: ' lista de Registros',
                    pageSize: 'LEGAL',
                    filename: 'Registros',                   
                    exportOptions: {
                   autoprint:false,
                   page: 'current',
                   columns: [0,1, 3, 4 ,5, 6, 7,8,9,10,15,17]
                }
                
                   
                },{
                    extend: 'print',
                    title: 'Listado de registros',
                    text: 'Imprimir',
                   exportOptions: {
                   autoprint:false,
                   page: 'current',
                   columns: [0,1, 3, 4 ,5, 6, 7,8,9,10,15,17]
                },   
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
      
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }

                }
            ],
          
      pageLength: 10,
      lengthMenu: [[5,10,25,50, 100, -1], [5,10,25,50, 100, "All"]],
      fixedColumns: true,
      responsive:true,
      autoWidth:true,
      Serverside:true,
        ajax: "{{ route('registros.index') }}",
        dom:  "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        columns:[
          {
                  class:          "dtr-control",
                  orderable:      true,
                  data:           null,
                  defaultContent: ""
              },          
    {data:'id',name:'id'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    {data:'tipo_registro',name:'tipo_registro'},
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