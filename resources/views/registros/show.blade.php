
{{-- <script src="{{asset('js/app.js')}}"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet"> --}}
@extends('layouth')
@section('contenido')
@if (Auth::user()->hasPermissionTo('ver registros')) 
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"/>
<div class="main main-raised ">
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
<center> <span class="badge badge-light"><h4 class="card-title">Listado Registros del activo</h4></span></center>
<div class="card">
  <div class="card-body">
    <a  class='btn btn-success' href="{{ url('activos')}}" ><i class="fas fa-arrow-left"></i>Regresar</a>
    <br><br>
    <div class="table-responsive">

      <table class="table table-striped nowrap" id="registrofiltrado">
          
          <thead class="thead">
        <th>  </th>
                  <th scope="col">#</th>
                  <th scope="col">Eliminar</th>
                  <th scope="col">Tipo de registro</th>
                  <th scope="col">Nombre activo (<span class="badge badge-pill badge-light">ID</span>)</th>    
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
            @foreach ($registros as $registro)     
            <tr>
              <td></td>
                <td scope="row">{{$loop->iteration}}</td>  
                <td scope="row">
                  @if (Auth::user()->hasPermissionTo('eliminar registros')) 
                  <form style="display:inline;" action="{{url ('/registros/'.$registro->id)}}" method="post" class="formulario-eliminar">
                  @csrf
                  {{method_field('DELETE')}}
                  <button  class='btn btn-danger btn-sm btn-circle' type="submit" ><i class="far fa-trash-alt"></i></button></form>
              @endif        
  
              </td>
                @if ($registro->tipo_registro=='Ingresado')       <td scope="row"> <span class="badge badge-success">{{$registro->tipo_registro}}</span></td>
                @elseif ($registro->tipo_registro=='Cambiado')    <td scope="row"> <span class="badge badge-warning">{{$registro->tipo_registro}}</span></td>
                @elseif ($registro->tipo_registro=='Eliminado')   <td scope="row"> <span class="badge badge-danger">{{$registro->tipo_registro}}</span></td>
                @endif      
                <td scope="row">{{$registro->nom_activo}} (<span class="badge badge-pill badge-light">{{$registro->id}}</span>)</td>
                <td scope="row">{{$registro->codigo_activo}}</td>
                <td scope="row">{{$registro->ubicacion_act}}</td>
                <td scope="row">{{$registro->area}}</td>
                <td scope="row">{{$registro->estado_activo}}</td>
                <td scope="row">{{$registro->destinatario}}</td>
                <td scope="row">{{$registro->encargado_act}}</td>
                <td scope="row">{{$registro->categoria_activo}}</td>
                <td scope="row">{{$registro->marca_act}}</td>
                <td scope="row">{{$registro->usuario}}</td>
                <td scope="row">{{$registro->estado_fisico_activo}}</td>
                <td scope="row">{{$registro->valor_adquisicion}}</td>
                <td scope="row">{{$registro->descripcion}}</td>
                <td scope="row">{{$registro->fechaadquisicion}}</td>
                <td scope="row">{{$registro->created_at}}</td>
             
              
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/sl-1.3.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
  <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
  
@include('librerias.datatable')
<script>

  window.$('#registrofiltrado').DataTable(
    {
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
  responsive:true,
  autoWidth:true,
  dom:  "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
  responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'dtr-control',
            orderable: false,
            targets:   0
        } ],
        
        order: [ 1, 'asc' ]

}
  
  );
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