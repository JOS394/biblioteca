@extends('layouth')
@section('contenido')

<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('ver massive')) 
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header py-1">
                    <h4 class="text-center">Importacion Masiva de Datos</h4>
                </div>
                <div class="card-body">
                  @if (!Session::has('mensaje'))
                    <div class="alert alert-warning" role="alert">   
                        <h5><span class="badge bg-danger">Importante leer</span></h5>
                        <p>La insercion  masiva de datos requiere de ciertos parametros para la correcta insercion
                          , se necesita un documento de Excel valido para la importacion.<p>
                            <a href="https://www.mediafire.com/file/6tbt9pj20e60lk6/activos_renovados.xlsx/file">Descarga Ahora</a>
                        </div>
                        @endif

                    <form action="{{route('activos.import.excel')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        @if (Session::has('mensaje'))

                        <div class="alert alert-warning" role="alert">     <p>  {{Session::get('mensaje')}}</p></div>
                        @endif
                        <input  type="file" id="file" name="file">
                        @if (Auth::user()->hasPermissionTo('run massive')) 
                        <button class="btn btn-success">Importar Activos</button>
                        @endif
                        </form>
                      
            </div>
        </div>
    </div>
</div>
</div>
{{-- <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>  --}}


  @if (!Session::has('mensaje'))
<script>
  Swal.fire({
  icon: 'warning',
  title: 'Precaucion!',
  text: 'La insercion  masiva de datos requiere de ciertos parametros para la correcta insercion '+
        'si estos parametros no se respetan pueden ocurrir errores en la importacion'
})
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
    <br><br><br><br><br>
  @endsection
