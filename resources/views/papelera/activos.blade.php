
@extends('layouth')
@section('contenido')


<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('ver trashActivos')) 
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
@if (session('restaurado')=='ok')
<script>
Swal.fire(
    'restaurado!',
    'El registro ha sido restaurado con exito.',
    'success' 
  )

</script>
@endif 
  </script>
<div class="main main-raised ">
      {{-- barra de busqueda --}}
      <center><h4 class="card-title">Activos dados de baja</h4></center>
      <center><div class="float-none">

      
      </div></center>
        <div class="card">
  <div class="card-body">
    <div class="table-responsive-lg">
      <table class="table table-striped display nowrap " id="activos">

        <thead class="thead table-striped">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a  class='btn btn-success' href="{{ url('activos')}}" ><i class="fas fa-arrow-left"></i>Activos</a>
              
            </li>
          </ul>

          <tr>
            <hr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">&nbsp;</th>
              <th scope="col"><i class="fas fa-image fa-1x"></i></th>
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
              <th scope="col">Valor activo</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Fecha Adquisicion</th>
              <th scope="col">Fecha Ingreso</th>
              {{-- <th scope="col">Actualizado en </th> --}}
            
          </tr>
        </thead>
    
        <tbody>
            @foreach ($activos as $activo)     
            <tr>
              <td></td>
                <td scope="row">{{$loop->iteration}}</td>  
                <td scope="row">
                 @if (Auth::user()->hasPermissionTo('restaurar activos')) 
                  <a   id="restore" class='btn btn-primary btn-sm' href="{{ url('/papelera/activos/'.$activo->id)}}"  data-toggle="tooltip" data-placement="bottom" title="Restaurar el activo" ><i class="fas fa-trash-restore"></i></a> </button>@endif
              </td>      
                <td scope="row"><img src="{{ asset('storage').'/'.$activo->foto}}" alt="" width="100" value="{{$activo->id}}"></td> 
                <td scope="row">{{$activo->nom_activo}} (<span class="badge badge-pill badge-light">{{$activo->id}}</span>)</td>
                <td scope="row">{{$activo->codigo_activo}}</td>
                <td scope="row">{{$activo->ubicacion_act}}</td>
                <td scope="row">{{$activo->area}}</td>
                <td scope="row">{{$activo->estado_activo}}</td>
                <td scope="row">{{$activo->destinatario}}</td>
                <td scope="row">{{$activo->encargado_act}}</td>
                <td scope="row">{{$activo->categoria_activo}}</td>
                <td scope="row">{{$activo->marca_act}}</td>
                <td scope="row">{{$activo->username}}</td>
                <td scope="row">{{$activo->estado_fisico_activo}}</td>
                <td scope="row">${{$activo->valor_adquisicion}}</td>
                <td scope="row">{{$activo->descripcion}}</td>
                <td scope="row">{{$activo->fechaadquisicion}}</td>
                <td scope="row">{{$activo->created_at}}</td>
             
            
            
                {{-- <td scope="row">{{$activo->updated_at}}</td> --}}
               
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

  <script>

window.$('#activos').DataTable(
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
  fixedColumns: true,
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
  popup: 'animate__animated animate__fadeInDown',
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
<!-- Button trigger modal -->


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