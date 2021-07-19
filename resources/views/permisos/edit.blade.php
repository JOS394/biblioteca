@extends('layouth')
@section('title','creacion')
@section('contenido')
<link href="{{ asset('/css/forms.css')}}" rel="stylesheet" type="text/css">
@if (Auth::user()->hasPermissionTo('ver permisos')) 
<link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<div class="container">


    <div class="alert alert-danger" role="alert">
      Puedes otorgarle todos los permisos que desees a un usuario, ten mucho cuidado.
  
  </div>

  <div class="card col-md-10 mx-auto">


    <div class="card-header">
     <center><h4>Administracion de permisos</h4></center> 
    </div>
    <div class="card-body">
     


      <form action="{{url('/permisos/'.$usuario->id)}}" method="POST" enctype="multipart/form-data" class="formulario-editar">
        @csrf
        {{method_field('PATCH')}}
        <div class="row">
            <div class="col-sm-14">
             
              <h5 class="text-center">Datos usuario: </h5>
              <hr>
              
          </div>

        
                           <div class="col-sm-6">
                            <center><i class="far fa-user fa-5x"></i>
                               <div class="form-group label-floating">
                                <h5> <label class="control-label "><b> Usuario:</b> {{$usuario->username}}</label></h5>
                                   
                                    </select>
                                   </select>
                               </div>
                              </center>
                           </div>
                    
   
                           <div class="col-sm-6">
                            <center><i class="fas fa-user-shield fa-5x"></i> 
                            <div class="form-group label-floating">
                            
                             @if ($usuario->tipo_usuario=='1') <h5> <label class="control-label"><b> Tipo usuario:</b> {{'Administrador'}}</label></h5>@endif
                             @if ($usuario->tipo_usuario=='2') <h5> <label class="control-label"><b> Tipo usuario:</b> {{'Editor'}}</label></h5>@endif
                             @if ($usuario->tipo_usuario=='3') <h5> <label class="control-label"><b> Tipo usuario:</b> {{'Espectador'}}</label></h5>@endif
                            </div>
                          </center> 
                        </div>
                        <div class="col-sm-12">
             
                         
                          <hr>
                          
                      </div>
                      <div class="col-sm-12">
                        <h5 class="text-center">Permisos actuales del usuario:  </h5>    
                        
                        <br>
                        <div class="col-sm-12">
                        <ul class="list-group">
                          <li class="list-group-item">
                          @foreach ($permisos as $permiso)
                          <label> <span class="badge bg-primary ">{{$permiso->name}}</label>&nbsp; 
                          @endforeach
                        </li>
                        </div>
                
                        </ul>
                        <BR>
                    </div>
                    <div class="col-sm-12">
            
                      <h5 class="text-center"> Todos los Permisos:  </h5>
                      <br>
                      <div class="alert alert-success" role="alert">
                        Los permisos que aparezcan con un <i style="color: green" class="fas fa-check-circle"></i> y se encuentra seleccionado
                           son los permisos que tiene actualmente el usuario, de igual forma se encuentran agrupados en la parte de arriba.
                      </div>
                      </div>
                      <BR>
          
                       
                        <div class="col-sm-6">
        
                          <h5>Permisos activos:</h5>
                          
                          <ul class="list-group">
                            
                            @if ($usuario->can('ver activos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="veractivos" name="veractivos" value="ver activos" checked >
                                <label class="form-check-label" for="veractivos"> Ver activos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="veractivos"  name="veractivos" value="ver activos">
                              <label class="form-check-label" for="veractivos"> Ver activos</label>
                            </div>
                            </li>
                            @endif   
    
                            @if ($usuario->can('crear activos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crearactivos"  name="crearactivos" value="crear activos" checked>
                                <label class="form-check-label" for="crearactivos"> Crear activos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                  
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crearactivos" name="crearactivos" value="crear activos">
                                <label class="form-check-label" for="crearactivos"> Crear activos</label>
                              </div>
                              </li>
                            @endif   
    
                            @if ($usuario->can('editar activos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editaractivos"  name="editaractivos" value="crear activos"checked>
                                <label class="form-check-label" for="editaractivos"> Editar activos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                  
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editaractivos"  name="editaractivos" value="crear activos">
                                <label class="form-check-label" for="editaractivos"> Editar activos</label>
                              </div>
                              </li>
                            @endif   
    
                            @if ($usuario->can('eliminar activos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="eliminaractivos"  name="eliminaractivos" value="eliminar activos" checked>
                                <label class="form-check-label" for="eliminaractivos"> Eliminar activos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="eliminaractivos"  name="eliminaractivos" value="eliminar activos">
                                <label class="form-check-label" for="eliminaractivos"> Eliminar activos</label>
                              </div>
                              </li>
                            @endif   
    
                          
                          </ul>
                        </div>
                        <div class="col-sm-6">
                          <h5>Permisos categorias:</h5>
                          <ul class="list-group">
                            @if ($usuario->can('ver categorias'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="vercategorias" checked   name="vercategorias" value="ver categorias">
                                <label class="form-check-label" for="vercategorias"> Ver Categorias<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="vercategorias" name="vercategorias" value="ver categorias">
                                <label class="form-check-label" for="vercategorias"> Ver Categorias</label>
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('crear categorias'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crearcategoria" name="crearcategorias" value="crear categorias" checked >
                                <label class="form-check-label" for="crearcategoria"> Crear Categoria<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crearcategoria" name="crearcategorias" value="crear categorias" >
                                <label class="form-check-label" for="crearcategoria"> Crear Categorias</label>
                              </div>
                              </li>
                            @endif   
                            
                            @if ($usuario->can('editar categorias'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editarcategorias" name="editarcategorias" value="editar categorias"  checked>
                                <label class="form-check-label" for="editarcategoria"> Editar Categorias<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editarcategorias" name="editarcategorias" value="editar categorias">
                                <label class="form-check-label" for="editarcategoria"> Editar Categorias</label>
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('eliminar categorias'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="eliminarcategorias" name="eliminarcategorias" value="eliminar categorias" checked>
                                <label class="form-check-label" for="eliminarcategoria"> Eliminar Categorias<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="eliminarcategorias" name="eliminarcategorias" value="eliminar categorias" >
                                <label class="form-check-label" for="eliminarcategoria"> Eliminar Categorias</label>
                              </div>
                              </li>
                            @endif   
                          </ul>
                        </div>
                        <div class="col-sm-12">
                          <hr>
                        </div>

                 

                        <div class="col-sm-6">
                          
                          <h5>Permisos :</h5>

                          @if (Auth::user()->username==$usuario->username)
                          <div class="alert alert-danger" role="alert">
                          
                           <small> por motivos de seguridad se han deshabilitado los cambios de permisos.</small>
                          </div>
                          <ul class="list-group">
                            @if ($usuario->can('ver permisos'))
                            <li class="list-group-item">
                              
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"   checked disabled>
                                <label class="form-check-label" for="verpermisos"> Ver permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                                <input type="hidden"  id="verpermisos" name="verpermisos"  value="ver permisos" >
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"  disabled>
                                <label class="form-check-label" for="verpermisos"> Ver permisos</label>
                                <input type="hidden"  id="verpermisos" name="verpermisos"  value="ver permisos" >
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('asignar permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"  checked disabled>
                                <label class="form-check-label" for="asignarpermisos"> Asignar permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                                <input type="hidden"  id="asignarpermisos" name="asignarpermisos" value="asignar permisos" >
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" disabled>
                                <label class="form-check-label" for="asignarpermisos"> Asignar permisos</label>
                                <input type="hidden"  id="asignarpermisos" name="asignarpermisos" value="asignar permisos" >
                              </div>
                              </li>
                            @endif   
                            
                            @if ($usuario->can('editar permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <label class="form-check-label" for="editarpermisos"> Editar permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                                <input type="hidden"  id="editarpermisos" name="editarpermisos" value="editar permisos"   >
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" disabled>
                                <label class="form-check-label" for="editarpermisos"> Editar permisos</label>
                                <input type="hidden"  id="editarpermisos" name="editarpermisos" value="editar permisos"   >
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('quitar permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="quitarpermisos" name="quitarpermisos" value="quitar permisos"   checked disabled>
                                <label class="form-check-label" for="quitarpermisos"> Quitar permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                                <input type="hidden"  id="quitarpermisos" name="quitarpermisos" value="quitar permisos"   >
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" disabled>
                                <label class="form-check-label" for="quitarpermisos"> Quitar permisos</label>
                                <input type="hidden"  id="quitarpermisos" name="quitarpermisos" value="quitar permisos"   >
                              </div>
                              </li>
                            @endif   
                          </ul>

                          @else
                          

                          <ul class="list-group">
                            @if ($usuario->can('ver permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="verpermisos" name="verpermisos" value="ver permisos"  checked>
                                <label class="form-check-label" for="verpermisos"> Ver permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="verpermisos" name="verpermisos" value="ver permisos" >
                                <label class="form-check-label" for="verpermisos"> Ver permisos</label>
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('asignar permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="asignarpermisos" name="asignarpermisos" value="asignar permisos"  checked>
                                <label class="form-check-label" for="asignarpermisos"> Asignar permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="asignarpermisos" name="asignarpermisos" value="asignar permisos" >
                                <label class="form-check-label" for="asignarpermisos"> Asignar permisos</label>
                              </div>
                              </li>
                            @endif   
                            
                            @if ($usuario->can('editar permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editarpermisos" name="editarpermisos" value="editar permisos"  checked>
                                <label class="form-check-label" for="editarpermisos"> Editar permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editarpermisos" name="editarpermisos" value="editar permisos" >
                                <label class="form-check-label" for="editarpermisos"> Editar permisos</label>
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('quitar permisos'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="quitarpermisos" name="quitarpermisos" value="quitar permisos"   checked>
                                <label class="form-check-label" for="quitarpermisos"> Quitar permisos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="quitarpermisos" name="quitarpermisos" value="quitar permisos" >
                                <label class="form-check-label" for="quitarpermisos"> Quitar permisos</label>
                              </div>
                              </li>
                            @endif   
                          </ul>
                          @endif
                        </div>
                       
                      

                        <div class="col-sm-6">
                          <h5>Permisos usuarios:</h5>
                          
                          @if (Auth::user()->username==$usuario->username)
                          <div class="alert alert-danger" role="alert">
                           <small> por motivos de seguridad se han deshabilitado algunos cambios de usuarios.</small>
                          </div>
                          <ul class="list-group">
                            @if ($usuario->can('ver usuarios'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"  checked disabled>
                                <label class="form-check-label" for="verusuarios"> Ver usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                                <input type="hidden"  id="verusuarios"  name="verusuarios" value="ver usuarios"  >
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" disabled >
                                <label class="form-check-label" for="verusuarios"> Ver usuarios</label>
                                <input type="hidden"  id="verusuarios"  name="verusuarios" value="ver usuarios"  >
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('crear usuarios'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crearusuarios" name="crearusuarios" value="crear usuarios"  checked>
                                <label class="form-check-label" for="crearusuarios"> Crear usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crearusuarios" name="crearusuarios" value="crear usuarios"  >
                                <label class="form-check-label" for="crearusuarios"> Crear usuarios</label>
                              </div>
                              </li>
                            @endif   
                            
                            @if ($usuario->can('editar usuarios'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editarusuarios"  name="editarusuarios" value="editar usuarios" checked>
                                <label class="form-check-label" for="editarusuarios"> Editar usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editarusuarios" name="editarusuarios" value="editar usuarios" >
                                <label class="form-check-label" for="editarusuarios"> Editar usuarios</label>
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('eliminar usuarios'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="eliminarusuarios" name="eliminarusuarios" value="eliminar usuarios"  checked>
                                <label class="form-check-label" for="eliminarusuarios"> Eliminar usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="eliminarusuarios" name="eliminarusuarios" value="eliminar usuarios"  >
                                <label class="form-check-label" for="eliminarusuarios"> Eliminar usuarios</label>
                              </div>
                              </li>
                            @endif   
                          </ul>
                        </div>
                 @else

                 <ul class="list-group">
                  @if ($usuario->can('ver usuarios'))
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="verusuarios"  name="verusuarios" value="ver usuarios" checked>
                      <label class="form-check-label" for="verusuarios"> Ver usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                    </div>
                    </li>
                  @else
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="verusuarios" name="verusuarios" value="ver usuarios" >
                      <label class="form-check-label" for="verusuarios"> Ver usuarios</label>
                    </div>
                    </li>
                  @endif   
    
                  @if ($usuario->can('crear usuarios'))
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="crearusuarios" name="crearusuarios" value="crear usuarios"  checked>
                      <label class="form-check-label" for="crearusuarios"> Crear usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                    </div>
                    </li>
                  @else
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="crearusuarios" name="crearusuarios" value="crear usuarios"  >
                      <label class="form-check-label" for="crearusuarios"> Crear usuarios</label>
                    </div>
                    </li>
                  @endif   
                  
                  @if ($usuario->can('editar usuarios'))
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="editarusuarios"  name="editarusuarios" value="editar usuarios" checked>
                      <label class="form-check-label" for="editarusuarios"> Editar usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                    </div>
                    </li>
                  @else
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="editarusuarios" name="editarusuarios" value="editar usuarios" >
                      <label class="form-check-label" for="editarusuarios"> Editar usuarios</label>
                    </div>
                    </li>
                  @endif   
    
                  @if ($usuario->can('eliminar usuarios'))
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="eliminarusuarios" name="eliminarusuarios" value="eliminar usuarios"  checked>
                      <label class="form-check-label" for="eliminarusuarios"> Eliminar usuarios<i style="color: green" class="fas fa-check-circle"></i></label>
                    </div>
                    </li>
                  @else
                  <li class="list-group-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="eliminarusuarios" name="eliminarusuarios" value="eliminar usuarios"  >
                      <label class="form-check-label" for="eliminarusuarios"> Eliminar usuarios</label>
                    </div>
                    </li>
                  @endif   
                </ul>
                
              </div>
              @endif   

                      <div class="col-sm-12">
                        <hr>
                      </div>
                        
                      <div class="col-sm-6">
                        <h5>Permisos registros:</h5>
                        <ul class="list-group">
                          @if ($usuario->can('ver registros'))
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="verregistros" name="verregistros" value="ver registros"  checked>
                              <label class="form-check-label" for="verregistros"> Ver registros<i style="color: green" class="fas fa-check-circle"></i></label>
                            </div>
                            </li>
                          @else
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="verregistros" name="verregistros" value="ver registros">
                              <label class="form-check-label" for="verregistros"> Ver registros</label>
                            </div>
                            </li>
                          @endif   
            
             
                          
                          @if ($usuario->can('eliminar registros'))
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="eliminarregistros" name="eliminarregistros" value="eliminar registros"  checked>
                              <label class="form-check-label" for="eliminarregistros"> Eliminar registros<i style="color: green" class="fas fa-check-circle"></i></label>
                            </div>
                            </li>
                          @else
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="eliminarregistros"  name="eliminarregistros" value="eliminar registros">
                              <label class="form-check-label" for="eliminarregistros"> Eliminar registros</label>
                            </div>
                            </li>
                          @endif   
            
                      
                        </ul>
                      </div>


                       
            
                        <div class="col-sm-6">
                          <h5>Permisos de insercion masiva de datos:</h5>
                          <ul class="list-group">
                            
                            @if ($usuario->can('ver massive'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="vermassive" name="vermassive" value="ver massive"  checked>
                                <label class="form-check-label" for="vermassive"> ver insercion masiva de datos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="vermassive" name="vermassive" value="ver massive"  >
                                <label class="form-check-label" for="vermassive">  ver insercion masiva de datos</label>
                              </div>
                              </li>
                            @endif   
              
                            @if ($usuario->can('run massive'))
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="runmassive" name="runmassive" value="run massive" checked  >
                                <label class="form-check-label" for="runmassive"> Ejecutar insercion masiva de datos<i style="color: green" class="fas fa-check-circle"></i></label>
                              </div>
                              </li>
                            @else
                            <li class="list-group-item">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="runmassive" name="runmassive" value="run massive" >
                                <label class="form-check-label" for="runmassive"> Ejecutar insercion masiva de datos</label>
                              </div>
                              </li>
                            @endif   
                             
                          </ul>
                        </div>
                        <div class="col-sm-12">
             
                         
                          <hr>
                          
                      </div>
                      <div class="col-sm-3 "></div>
                      <div class="col-sm-6 ">
                        <h5>Permisos de papelera:</h5>
                        <ul class="list-group">

                          @if ($usuario->can('ver trashActivos'))
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="vertrashactivos"  name="vertrashactivos" value="ver trashactivos" checked>
                              <label class="form-check-label" for="vertrashactivos"> Ver papelera de activos<i style="color: green" class="fas fa-check-circle"></i></label>
                            </div>
                            </li>
                          @else
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="vertrashactivos" name="vertrashactivos" value="ver trashactivos">
                              <label class="form-check-label" for="vertrashactivos"> Ver papelera de activos</label>
                            </div>
                            </li>
                          @endif  


                          @if ($usuario->can('ver trashRegistros'))
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="vertrashregistros"  name="vertrashregistros" value="ver trashRegistros" checked>
                              <label class="form-check-label" for="vertrashregistros"> Ver papelera de registros<i style="color: green" class="fas fa-check-circle"></i></label>
                            </div>
                            </li>
                          @else
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="vertrashregistros" name="vertrashregistros" value="ver trashRegistros">
                              <label class="form-check-label" for="vertrashregistros"> Ver papelera de registros</label>
                            </div>
                            </li>
                          @endif  
                          
                          @if ($usuario->can('restaurar activos'))
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="restauraractivos"  name="restauraractivos" value="restaurar activos" checked>
                              <label class="form-check-label" for="restauraractivos"> Restaurar activos<i style="color: green" class="fas fa-check-circle"></i></label>
                            </div>
                            </li>
                          @else
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="restauraractivos" name="restauraractivos" value="restaurar activos">
                              <label class="form-check-label" for="restauraractivos"> Restaurar activos</label>
                            </div>
                            </li>
                          @endif  


                          @if ($usuario->can('restaurar registros'))
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="restaurarregistros"  name="restaurarregistros" value="restaurar registros" checked>
                              <label class="form-check-label" for="restaurarregistros"> Restaurar registros<i style="color: green" class="fas fa-check-circle"></i></label>
                            </div>
                            </li>
                          @else
                          <li class="list-group-item">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="restaurarregistros" name="restaurarregistros" value="restaurar registros">
                              <label class="form-check-label" for="restaurarregistros"> Restaurar registros</label>
                            </div>
                            </li>
                          @endif  
                           
                          
                        </ul>
                      </div>
                      <div class="col-sm-12">
           
                       
                        <hr>
                 
                    </div>
            
                    
                    <div class="col-sm-4 "></div>
                      <center><div class="col-sm-4">
                        @if (Auth::user()->hasPermissionTo('editar permisos') 
                          && Auth::user()->hasPermissionTo('asignar permisos')
                          && Auth::user()->hasPermissionTo('quitar permisos'))
                 <input class="btn btn-success btn-lg btn-block " id="crear" type="submit" value="Cambiar permisos">
                 @endif
                </div>
              </center>
            </form>
           
          </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

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