@extends('layouth')
@section('contenido')
{{-- <script src="{{asset('js/app.js')}}"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('crear categorias')) 
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header py-1">
                    <h2 class="text-center">Creacion de categorias</h2>
                </div>
                <div class="card-body">
                  
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <ul>
                    @error('nom_categoria')
                    <li>
                   {{ $errors->first('nom_categoria') }}
                  </li>
                    @enderror
              
                    @error('descripcion')
                    <li>
                   {{ $errors->first('descripcion') }}
                  </li>
                    @enderror
                </ul>
              
              </div> 
              @endif
                    <div style="text-align: center;">
                    <p></p>
                </div>
                
<div class="form-label-group mb-6">
      <form action="{{url('/categorias')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar" name="form1">
        @csrf
        <div class="form-group">
          <label for="descripcion">{{'Nombre de la categoria'}}</label>
      
            <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" aria-describedby="nom_categoria" placeholder="Categoria" required value="{{ old('nom_categoria') }}">
  
          </div>
          <br>  
          <div class="form-group">
            <label for="descripcion">{{'Descripcion'}}</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2" placeholder="Descripcion" required min='3'>{{  old('descripcion') }}</textarea>
              
          </div>
    
            
          </div>

          <div class="form-group label-floating">

        </div>
            <br>
            <input class="btn btn-success btn-lg btn-block mb-4" id="crear" type="submit" value="Agregar">
                      
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>  --}}
    


@if ($errors->any())
<script>
  Swal.fire({
  icon: 'error',
  title: 'Error!',
  text: 'has ingresado datos incorrectamente '
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
  @endsection
