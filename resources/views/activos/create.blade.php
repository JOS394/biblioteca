@extends('layouth')
@section('title','Home')
@section('contenido')
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">

@if (Auth::user()->hasPermissionTo('crear activos')) 
<div class="main main-raised">



  @if (session('agregado')=='ok')
  <script>
  Swal.fire(
      'agregado!',
      'La categoria ha sido agregada con exito.',
      'success' 
    )
  
  </script>
  @endif 


  <div class="container">
    <div class="container py-5">
    <div class="section">
      <div class="col-sm-2"> <button  type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#addcategoria">
        <i class="fas fa-plus"> Nueva categoria</i>
      </button>
    </div>
      <div class="card">
  
       
        <div class="card-header">
          <h4 class="title text-center">Ingresar nuevo activo</h4>
        </div>

        <div class="card-body">
          
          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
                @error('categoria_activo')
                <li>
               {{ $errors->first('categoria_activo') }}
              </li>
                @enderror
          
                @error('nom_activo')
                <li>
               {{ $errors->first('nom_activo') }}
              </li>
                @enderror
            
                @error('marca_act')
                <li>
              {{ $errors->first('marca_act') }}
              </li>
                @enderror
        
                @error('ubicacion_act')
                <li>
               {{ $errors->first('ubicacion_act') }}
              </li>
                @enderror

                @error('encargado_act')
                <li>
              {{ $errors->first('encargado_act') }}
              </li>
                @enderror

                @error('codigo_activo')
                <li>
                {{ $errors->first('codigo_activo') }}
              </li>
                @enderror

                @error('area')
                <li>
           {{ $errors->first('area') }}
              </li>
                @enderror
                @error('estado_activo')
                <li>
          {{ $errors->first('estado_activo') }}
              </li>
                @enderror
                @error('foto')
                <li>
          {{ $errors->first('foto') }}
              </li>
                @enderror
            </ul>
          
          </div> 
          @endif
          <form action="{{url('/activos')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar form-horizontal" name="form1">
            @csrf
         <div class="row">
          <div class="col-sm-12">
            <br> <br>
            <h5 class="text-center">Datos del Activo: </h5>
            <hr>
            
        </div>
        <br> <br> <br> <br>
                         <div class="col-sm-4">
                             <div class="form-group label-floating">
                                 <label class="control-label">Usuario:</label>
                                  <select name="id_usuario"  id="id_usuario" class="form-control"  value="{{ old('id_usuario') }}"  autofocus readonly="readonly" >
                                    <option value="{{auth()->user()->id}}"  >{{auth()->user()->username}}</option>
                                  </select>
                                 </select>
                             </div>
                         </div>

                         <div class="col-sm-4">
                          <div class="form-group label-floating">
                              <label class="control-label">Categoria:</label>
                              <select name="categoria_activo"  id="categoria_activo" class="form-select"  required autocomplete="categoria_activo"  >
                                <option value=""  >{{'Seleccione la categoria'}}</option>
                                @foreach ($categorias as $categoria)                              
                                <option value="{{$categoria->nom_categoria}}" {{ old('categoria_activo') == $categoria->nom_categoria ? 'selected' : '' }}  >{{$categoria->nom_categoria}}</option>
                                @endforeach
                              </select>
                        
                          </div>
                      </div>
                      <div class="col-sm-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Fecha de adquisicion:</label><br>
                        <input type="date" id="date" name="date" class="form-control" value="" min="1982-04-13" max="2045-12-12">
                      </div>
                    </div>
                    <br> <br> <br> <br>
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre del activo:</label>
             <input type="text" class="form-control" id="nom_activo" name="nom_activo" aria-describedby="nom_activo" placeholder="Nombre Activo" title="Nombre del activo a ingresar" required maxlength="50" value="{{ old('nom_activo') }}">
            </div>
          </div>
                      <div class="col-sm-3">
            <div class="form-group label-floating">
              <label class="control-label">Marca:</label>
              <input type="text" class="form-control" id="marca_act" name="marca_act" aria-describedby="marca_act" placeholder="Marca" required title="Marca del activo" maxlength="15" value="{{ old('marca_act') }}">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group label-floating">
              <label class="control-label">Valor adquisicion:</label>
             <input type="text" class="form-control" id="valor_adquisicion" name="valor_adquisicion" aria-describedby="valor_adquisicion" placeholder="Valor de adquisicion" title="Valor del articulo adquirido"  value="{{ old('valor_adquisicion)') }}">
            </div>
          </div>
          <br> <br>
          <br> <br>
                      <div class="col-sm-4">
            <div class="form-group label-floating">
              <label class="control-label">Ubicacion del Activo:</label>
            <input type="text" class="form-control" id="ubicacion_act" aria-describedby="ubicacion_act" name="ubicacion_act"  placeholder="Ubicacion del activo" required  title="La ubicacion actual del activo, ejemplo:centro de computo" maxlength="60" value="{{ old('ubicacion_act') }}">
            </div>
          </div>
                      <div class="col-sm-4">
            <div class="form-group label-floating">
              <label class="control-label">Encargado del activo:</label>
              <input type="text" class="form-control" id="encargado_act" aria-describedby="encargado_act" name="encargado_act"  placeholder="Encargado del activo" required  title="Cada activo tiene un encargado, se necesita especificar quien esta encargado del activo" maxlength="75" value="{{ old('encargado_act') }}">
            </div>
          </div>

          
          <div class="col-sm-4">
            <div class="form-group label-floating">
              <label class="control-label">Codigo Activo:</label>
              <input type="text" class="form-control" id="codigo_activo" aria-describedby="codigo_activo" name="codigo_activo"  placeholder="Codigo del activo"  title="Cada  activo tiene un codigo unico pegado  en el, si hay etiqueta en el activo,Numeros" maxlength="20" value="{{ old('codigo_activo') }}">
            </div>
          </div>
          <br> <br> <br> <br>

          <div class="col-sm-4 ">
            <div class="form-group label-floating">
              <label class="control-label">Estado actual del activo:</label>
              <select name="estado_activo"  id="estado_activo" class="form-select"  required autocomplete="estado_activo" title="Estado del activo se refiere al estado del activo(préstamo, disponible)"  onchange="habilitarCombo(this.value);" >
                <option selected value="" >Estado actual del activo</option>
                <option  value="{{ __('En uso') }}" {{ old('estado_activo') == 'En uso' ? 'selected' : '' }}>En uso</option>
                  <option value="{{ __('Prestado a') }}"{{ old('estado_activo') == 'Prestado a' ? 'selected' : '' }}>Prestado a</option>
                  <option value="{{ __('Prestado por') }}"{{ old('estado_activo') == 'Prestado por' ? 'selected' : '' }}>Prestado por</option>
                  <option value="{{ __('Donado a') }}" {{ old('estado_activo') == 'Donado a' ? 'selected' : '' }}>Donado a</option>
                  <option value="{{ __('Donado por') }}" {{ old('estado_activo') == 'Donado por' ? 'selected' : '' }}>Donado por</option>
                  <option value="{{ __('Transferido a') }}" {{ old('estado_activo') == 'Transferido a' ? 'selected' : '' }}>Transferido a</option>
                  <option value="{{ __('Transferido por') }}" {{ old('estado_activo') == 'Transferido por' ? 'selected' : '' }}>Transferido por</option>
                  <option value="{{ __('Vendido a') }}" {{ old('estado_activo') == 'Vendido a' ? 'selected' : '' }}>Vendido a</option>
                  <option value="{{ __('Vendido por') }}" {{ old('estado_activo') == 'Vendido por' ? 'selected' : '' }}>Vendido por</option>
                  <option value="{{ __('Descartado') }}" {{ old('estado_activo') == 'Descartado' ? 'selected' : '' }}>Descartado</option>
                </select>

              </div> </div>
       

                      <div class="col-sm-3">
                          <div class="form-group label-floating">
                              <label class="control-label">Destino:</label>
                              <input type="text" class="form-control" id="destino" aria-describedby="destino" name="destino"  placeholder="Destino"  title="Hacia adonde sera movido el articulo/origen del articulo" maxlength="40" value="{{ old('destino') }}" disabled>
                          </div>
                      </div>
 
                      <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Estado fisico del activo:</label>
                            <select name="estado_fisico_activo"  id="estado_fisico_activo" class="form-select"  required autocomplete="estado_fisico_activo" >
                              <option selected >Seleccionar  estado fisico del activo</option>
                              <option  value="{{ __('Buen Estado') }}" {{ old('estado_activo') == 'Buen Estado' ? 'selected' : '' }}>Buen Estado</option>
                                <option value="{{ __('Mal Estado') }}"{{ old('estado_activo') == 'Mal Estado' ? 'selected' : '' }}>Mal Estado</option>
                                <option value="{{ __('Buen Funcionamiento') }}" {{ old('estado_activo') == 'Buen Funcionamiento' ? 'selected' : '' }}>Buen Funcionamiento</option>
                                <option value="{{ __('Mal Funcionamiento') }}" {{ old('estado_activo') == 'Mal Funcionamiento' ? 'selected' : '' }}>Mal Funcionamiento</option>
                                <option value="{{ __('Con averías') }}" {{ old('estado_activo') == 'Con averías' ? 'selected' : '' }}>Con Averias</option>
                                <option value="{{ __('Averiado') }}" {{ old('estado_activo') == 'Averiado' ? 'selected' : '' }}>Averiado</option>
                              </select>
                        </div>
                    </div>
                    <br> <br> <br> <br>
                     
          <div class="col-sm-12">
      
            <h5 class="text-center">Inventario por area: </h5>
            <hr>
          </div>

            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="area1" value="biblioteca">
                <label class="form-check-label" for="area1">
                  Biblioteca
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="area2" value="contabilidad">
                <label class="form-check-label" for="area2">
                  Contabilidad
                </label>
              </div>
              <div class="form-check"> 
                <input class="form-check-input" type="radio" name="area" id="area3" value="compartido">
                <label class="form-check-label" for="area3">
                  Compartido(ambos)
                </label>
              </div>
        </div>



                      <div class="container">
                              <hr>
                             <div class="form-group label-floating">
                   <label class="control-label">Foto del activo:</label>
                   <input type="file" class="form-control"  id="foto" aria-describedby="foto" name="foto" value="{{ old('foto') }}">
                 </div>
                 <br> <br> 
                 <label class="control-label">Descripcion:</label>
                 <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripcion"  title="Trate de hacer una descripcion especificando cualquier detalle relevante" value="{{ old('descripcion') }}"></textarea>
                <br>
                <br>     
                </div>
            
               <input class="btn btn-success btn-lg btn-block " id="crear" type="submit" value="Agregar">
             
 
      </form>
   </div>
 </div>
</div>
</div>

</div>
  </div> 
  
  
  <div class="modal fade" id="addcategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url ('crearCategoria')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar" name="form1">
            @csrf
      
              <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" aria-describedby="nom_categoria" placeholder="Categoria"  required >
 
              <br>  

               
             
              <label class="form-label">Descripcion:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripcion"  title="Trate de hacer una descripcion especificando cualquier detalle relevante" value="{{ old('descripcion') }}"></textarea>
        
     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
<!-- Modal -->
<div class="modal fade" id="addcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
        <form action="{{url ('crearCategoria')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar" name="form1">
          @csrf

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{'Nombre de categoria'}} </span>
            </div>
              <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" aria-describedby="nom_categoria" placeholder="Categoria"  required >
    
            </div>

            <br>  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
      
    </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</div>
<Script>
  $(document).ready(function(){
  $('#codigo_activo').mask('000000000000-000-00', {reverse: false});
  $('#valor_adquisicion').mask('000.000', {reverse: false});
 
});
</Script>
<script> 
  function habilitarCombo(valor){

  if(valor=='En uso' || valor=='Descartado'){
  document.getElementById("destino").disabled = true;
  document.getElementById("destino").value = null;
  }
  else {
  document.getElementById("destino").disabled = false;
  }
  }
  </script>
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