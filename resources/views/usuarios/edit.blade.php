@extends('layouth')
@section('contenido')
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('editar usuarios')) 
<div class="container">
  <div class="card col-md-6 mx-auto">

    <div class="card-header">
     <center><h4> Editar usuario</h4></center> 
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



      <form action="{{url('/usuarios/'.$usuario->id)}}" method="POST" enctype="multipart/form-data" class="formulario-editar">
        @csrf
        {{method_field('PATCH')}}
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">{{'Usuario'}}</span>
          </div>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Usuario" 
            title="solo se permiten letras Mayusculas,minusculas y numeros" required maxlength="40" value="{{$usuario->username}}">
    
          </div>
       
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Password'}}</span>
            </div>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contrase&ntilde;a" required maxlength="50" value="{{$usuario->password}}">
  
        
          </div>
         
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Re-Password'}}</span>
            </div>
            <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Verificacion de Contrase&ntilde;a" required required autocomplete="password" maxlength="14" value="{{$usuario->password}}" >
          
          </div>
   
 
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Nombre Completo'}}</span>
            </div>
            <input type="text" class="form-control" id="nom_completo" aria-describedby="nom_completo" name="nom_completo"  placeholder="Nombre completo" required maxlength="40"  value="{{$usuario->nom_completo}}" >
          </div>
    
 
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Tipo usuario'}}</span>
            </div>
            <select name="tipo_usuario"  id="tipo_usuario" class="form-select"  value="{{ old('tipo_usuario') }}" required autocomplete="tipo_usuario" autofocus value="{{$usuario->tipo_usuario}}">
               @if ($usuario->tipo_usuario == '1') <option selected value="{{ __('1') }}">Administrador</option> @endif
               @if ($usuario->tipo_usuario == '2')   <option selected value="{{ __('2') }}" >Editor</option> @endif
               @if ($usuario->tipo_usuario == '3')   <option  selected value="{{ __('3') }}">Espectador</option> @endif
              </select>
          </div>
            <br>
            <input class="btn btn-success btn-lg btn-block mb-10" id="editar" type="submit" value="editar">
              
                
            </form>
           
          </div>
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