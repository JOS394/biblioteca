@extends('layouth')
@section('title','creacion')
@section('contenido')
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('crear usuarios')) 
<div class="container">
  <div class="card col-md-6 mx-auto">
    <div class="card-header">
     <center><h4> Agregar nuevo usuario</h4></center> 
    </div>
    <div class="card-body">
      @if ($errors->any())
        
    
      <div class="alert alert-danger" role="alert">
   
 
        <ul>
            @error('username')
            <li>
              <h6>{{ $errors->first('username') }}</h6>
          </li>
            @enderror
      
            @error('password')
            <li>
              <h6>{{ $errors->first('password') }}</h6>
          </li>
            @enderror
        
            @error('repassword')
            <li>
              <h6>{{ $errors->first('repassword') }}</h6>
          </li>
            @enderror
    
            @error('nom_completo')
            <li>
              <h6>{{ $errors->first('nom_completo') }}</h6>
          </li>
            @enderror
        </ul>
      
      </div> 
      @endif
      <form action="{{url('/usuarios')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar" name="form1">
        @csrf
    
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">{{'Usuario'}}</span>
          </div>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Usuario"  required maxlength="40" value="{{ old('username') }}">
         
          </div>
       
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Password'}}</span>
            </div>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contrase&ntilde;a" required maxlength="50" value="{{ old('password') }}">
          
          </div>
         
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Re-Password'}}</span>
            </div>
            <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Verificacion de Contrase&ntilde;a" required required autocomplete="password" maxlength="14" value="{{ old('password') }}">
          
          </div>
   
    <div ></div>
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Nombre Completo'}}</span>
            </div>
            <input type="text" class="form-control" id="nom_completo" aria-describedby="nom_completo" name="nom_completo"  placeholder="Nombre completo" required value="{{ old('nom_completo') }}">
          </div>
    
    <div ></div>
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Tipo usuario'}}</span>
            </div>
            <select name="tipo_usuario"  id="tipo_usuario" class="form-select"  value="{{ old('tipo_usuario') }}" required autocomplete="tipo_usuario" autofocus>
              <option selected value="">Seleccionar el tipo  de usuario </option>  
              <option value="{{ __('1') }}" {{ old('tipo_usuario') == 1 ? 'selected' : '' }}>Administrador</option>
                <option value="{{ __('2') }}" {{ old('tipo_usuario') == 2 ? 'selected' : '' }}>Editor</option>
                <option value="{{ __('3') }}" {{ old('tipo_usuario') == 3 ? 'selected' : '' }}>Espectador</option>
              </select>
          </div>
            <br><br>
           <center> <input class="btn btn-success btn-lg col-md-12" id="crear" type="submit" onclick="miFunc()" value="Agregar"></center>
     
            </form>
                    
          </div>

    </div>
  </div>
@if ($errors->any())
<script>
  Swal.fire({
  icon: 'error',
  title: 'has ingresado datos incorrectamente',
  text: 'verifica los errores '
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