@extends('layouth')
@section('contenido')
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('editar categorias')) 
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
              <div class="card-header py-1">
                <h3 class="text-center">Editar categorias</h3>
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
      

      <form action="{{url('/categorias/'.$categoria->id)}}" method="POST" enctype="multipart/form-data" class="formulario-editar">
        @csrf
        {{method_field('PATCH')}}
        <div class="form-group">
            <div class="form-group">
                <label for="nom_categoria">{{'Nombre de la Categoria'}}</label>
                <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" aria-describedby="nom_categoria" placeholder="Nombre de la Categoria" required value="{{$categoria->nom_categoria}}">
               
              </div>
    
              <div class="form-group">
                <label for="descripcion">{{'Descripcion'}}</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="2" placeholder="Descripcion" required min='3'>{{$categoria->descripcion}}</textarea>  
              </div>
    
            <br>
            <input class="btn btn-success btn-lg btn-block mb-10" id="editar" type="submit" value="editar">
                      
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
</div>
{{-- <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script> --}}

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