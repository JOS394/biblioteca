@extends('layouth')
@section('title','editar')
@section('contenido')
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">


@if (Auth::user()->hasPermissionTo('editar activos')) 

<div class="main main-raised">
  <div class="container">
    <div class="container py-5">
    <div class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="title text-center">Editar Activo</h4>
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

                @error('dominio')
                <li>
           {{ $errors->first('dominio') }}
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
          <form action="{{url('/activos/'.$activo->id)}}" method="POST" enctype="multipart/form-data" class="formulario-agregar form-horizontal" name="form1">
            @csrf
            @method('PATCH')
            <div class="row">
             <div class="col-sm-12">
              
               <h5 class="text-center">Datos del Activo: </h5>
               <hr>
               
           </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Usuario</label>
                                     <select name="id_usuario"  id="id_usuario" class="form-control"  value="{{ old('id_usuario') }}"  autofocus readonly="readonly" >
                                       <option value="{{auth()->user()->id}}"  >{{auth()->user()->username}}</option>
                                     </select>
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-sm-4">
                             <div class="form-group label-floating">
                                 <label class="control-label">Categoria</label>
                                 <select name="categoria_activo"  id="categoria_activo" class="form-select"  required autocomplete="categoria_activo" value="{{$activo->categoria_activo}}">
                                   <option value=""  >{{'Seleccione la categoria'}}</option>
                                   @foreach ($categorias as $categoria)         
                                
                                   @if ($categoria->nom_categoria==$activo->categoria_activo)
                                   <option value="{{$categoria->nom_categoria}}"  selected>{{$categoria->nom_categoria}}</option>
                                 @else
                                     <option value="{{$categoria->nom_categoria}}"  >{{$categoria->nom_categoria}}</option>
                                     @endif
                                     @endforeach
                                 </select>
                           
                             </div>
                         </div>
                         <div class="col-sm-3">
                         <div class="form-group label-floating">
                           <label class="control-label">Fecha de adquisicion</label><br>
                           <input type="date" id="date" name="date" class="form-control"  min="1982-04-13" max="2045-12-12"  value="{{$activo->fechaadquisicion}}">
                         </div>
                         <br>
                       </div>
    
             <div class="col-sm-6">
               <div class="form-group label-floating">
                 <label class="control-label">Nombre del activo</label>
                <input type="text" class="form-control" id="nom_activo" name="nom_activo" aria-describedby="nom_activo" placeholder="Nombre Activo" title="Nombre del activo a ingresar" required maxlength="50" value="{{$activo->nom_activo}}">
               </div>
             </div>

             <div class="col-sm-3">
              <div class="form-group label-floating">
                <label class="control-label">Valor adquisicion</label>
               <input type="text" class="form-control" id="valor_adquisicion" name="valor_adquisicion" aria-describedby="valor_adquisicion" placeholder="Valor de adquisicion" title="Valor del articulo adquirido"  value="{{ $activo->valor_adquisicion }}">
              </div>
            </div>
                         <div class="col-sm-3">
               <div class="form-group label-floating">
                 <label class="control-label">Marca</label>
                 <input type="text" class="form-control" id="marca_act" name="marca_act" aria-describedby="marca_act" placeholder="Marca" required title="Marca del activo" maxlength="15" value="{{$activo->marca_act}}">
               </div>
               <br>
             </div>
                         <div class="col-sm-4">
               <div class="form-group label-floating">
                 <label class="control-label">Ubicacion del Activo</label>
               <input type="text" class="form-control" id="ubicacion_act" aria-describedby="ubicacion_act" name="ubicacion_act"  placeholder="Ubicacion del activo" required  title="La ubicacion actual del activo, ejemplo:centro de computo" maxlength="60" value="{{$activo->ubicacion_act}}">
               </div>
             </div>
                         <div class="col-sm-4">
               <div class="form-group label-floating">
                 <label class="control-label">Encargado del activo</label>
                 <input type="text" class="form-control" id="encargado_act" aria-describedby="encargado_act" name="encargado_act"  placeholder="Encargado del activo" required  title="Cada activo tiene un encargado, se necesita especificar quien esta encargado del activo" maxlength="75" value="{{$activo->encargado_act}}">
               </div>
             </div>
   
             
             <div class="col-sm-4">
               <div class="form-group label-floating">
                 <label class="control-label">Codigo Activo</label>
                 <input type="text" class="form-control" id="codigo_activo" aria-describedby="codigo_activo" name="codigo_activo"  placeholder="Codigo del activo" required  title="Cada  activo tiene un codigo unico pegado  en el, si hay etiqueta en el activo,Numeros" maxlength="20" value="{{$activo->codigo_activo}}">
               </div>
               <br>
             </div>
   
   
             <div class="col-sm-4 ">
               <div class="form-group label-floating">
                 <label class="control-label">Estado actual del activo</label>
                 <select name="estado_activo"  id="estado_activo" class="form-select"  required autocomplete="estado_activo" title="Estado del activo se refiere al estado del activo(préstamo, disponible)" value="{{$activo->estado_actual}}"  onchange="habilitarCombo(this.value);" >
                  <option {{ $activo->estado_activo == "" ? 'selected' : '' }} value="">Estado actual del activo</option>
                <option  {{ $activo->estado_activo == "En uso" ? 'selected' : '' }} value="{{ __('En uso') }}">En uso</option>
                  <option {{ $activo->estado_activo == "Prestado a" ? 'selected' : '' }} value="{{ __('Prestado a') }}">Prestado a</option>
                  <option {{ $activo->estado_activo == "Prestado por" ? 'selected' : '' }} value="{{ __('Prestado por') }}">Prestado por</option>
                  <option {{ $activo->estado_activo == "Donado a" ? 'selected' : '' }} value="{{ __('Donado a') }}">Donado a</option>
                  <option {{ $activo->estado_activo == "Donado por" ? 'selected' : '' }} value="{{ __('Donado por') }}">Donado por</option>
                  <option {{ $activo->estado_activo == "Transferido a" ? 'selected' : '' }} value="{{ __('Transferido a') }}">Transferido a</option>
                  <option {{ $activo->estado_activo == "Transferido por" ? 'selected' : '' }} value="{{ __('Transferido por') }}">Transferido por</option>
                  <option {{ $activo->estado_activo == "Vendido a" ? 'selected' : '' }} value="{{ __('Vendido a') }}">Vendido a</option>
                  <option {{ $activo->estado_activo == "Vendido por" ? 'selected' : '' }} value="{{ __('Vendido por') }}">Vendido por</option>
                  <option {{ $activo->estado_activo == "Descartado" ? 'selected' : '' }} value="{{ __('Descartado') }}">Descartado</option>
                   </select>
   
               </div>
             </div>
  

                      <div class="col-sm-3">
                          <div class="form-group label-floating">
                              <label class="control-label">Destino</label>
                              <input type="text" class="form-control" id="destino" aria-describedby="destino" name="destino"  placeholder="Destino"  title="Hacia adonde sera movido el articulo/origen del articulo" maxlength="40" value="{{$activo->destinatario}}">
                          </div>
                      </div>
    
                         <div class="col-sm-4">
                          <div class="form-group label-floating">
                              <label class="control-label">Estado fisico del activo</label>
                              <select name="estado_fisico_activo"  id="estado_fisico_activo" class="form-select"  required autocomplete="estado_fisico_activo" value="{{$activo->estado_fisico_activo}}">
                                <option {{ $activo->estado_fisico_activo == "" ? 'selected' : '' }} value="">Seleccionar estado del activo</option>
                                <option {{ $activo->estado_fisico_activo == "Buen Estado" ? 'selected' : '' }} value="{{ __('Buen Estado') }}">Buen estado</option>
                               <option  {{ $activo->estado_fisico_activo == "Mal estado" ? 'selected' : '' }}  value="{{ __('Mal estado') }}">Mal estado</option> 
                               <option  {{ $activo->estado_fisico_activo == "Buen Funcionamiento" ? 'selected' : '' }}  value="{{ __('Buen Funcionamiento') }}">Buen Funcionamiento</option>
                               <option  {{ $activo->estado_fisico_activo == "Mal Funcionamiento" ? 'selected' : '' }}  value="{{ __('Mal Funcionamiento') }}">Mal Funcionamiento</option> 
                               <option  {{ $activo->estado_fisico_activo == "Con averías" ? 'selected' : '' }}  value="{{ __('Con averías') }}" >Con Averias</option> 
                               <option  {{ $activo->estado_fisico_activo == "Averiado" ? 'selected' : '' }} value="{{ __('Averiado') }}" >Averiado</option> 
                                </select>
                          </div>
                          <br>
                      </div>
   
                        
             <div class="col-sm-12">
         
               <h5 class="text-center">Inventario por area: </h5>
               <hr>
             </div>
   
               <div class="col-sm-4">
                 <div class="form-check">
                   <input class="form-check-input" type="radio" name="area" id="area1"  value="biblioteca" {{ old('area',$activo->area) == 'biblioteca' ? 'checked' : 'true' }}>
                   <label class="form-check-label" for="area1">
                     Biblioteca
                   </label>
                 </div>
                 <div class="form-check">
                   <input class="form-check-input" type="radio" name="area" id="area2" value="contabilidad" {{ old('area',$activo->area) == 'contabilidad' ? 'checked' : 'true' }}>
                   <label class="form-check-label" for="area2">
                     Contabilidad
                   </label>
                 </div>
                 <div class="form-check"> 
                   <input class="form-check-input" type="radio" name="area" id="area3" value="compartido" {{ old('area',$activo->area) == 'compartido' ? 'checked' : 'true' }}>
                   <label class="form-check-label" for="area3">
                     Compartido(ambos)
                   </label>
                 </div>
           </div>
           
          
       
   
                         <div class="container">
                                 <hr>
                                <div class="form-group label-floating">
                      <label class="control-label">Foto del activo</label>
                      <input type="file" class="form-control"  id="foto" aria-describedby="foto" name="foto" value="{{ old('foto') }}">
                    </div>
                    <br>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripcion"  title="Trate de hacer una descripcion especificando cualquier detalle relevante" >{{$activo->descripcion}}</textarea>
                   <br>
                   <br>     
                   </div>
                
                  <input class="btn btn-success btn-lg btn-block " id="crear" type="submit" value="Editar">
                
      </form>
   </div>
 </div>
</div>
</div>

</div>
  </div> 
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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