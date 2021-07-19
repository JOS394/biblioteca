
<meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css">
<link href="{{ asset('/fontawesome/css/all.css') }}"  rel="stylesheet" type="text/css">
<link href="{{ asset('/css/sidebar.css')}}" rel="stylesheet" type="text/css">

@if (session('cambiada')=='ok')
<script>
Swal.fire(
	'Cambiado!',
	'la foto fue actualizada con exito.',
	'success' 
  )

</script>
@endif 

@if (session('nocambiada')=='ok')
<script>
Swal.fire(
	'No cambiada!',
	'la foto no se actualizo.',
	'warning' 
  )

</script>
@endif 

<div class="page-wrapper chiller-theme">
<a id="show-sidebar" class="btn btn-md btn-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Mostrar menu de opciones">
<i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
<div class="sidebar-content">
  <div class="sidebar-brand">
	<a>Inventario de Activos</a>
	<div id="close-sidebar">
	  <i class="fas fa-times"></i>
	</div>
  </div>
  <div class="sidebar-header">
	<div class="user-pic" width="150">
	@if (auth()->user()->foto==null)
	
	<img class="img-rounded" src="{{ asset('images/userside.jpg')}}" width="150"
	alt="User picture">
		@else

		<img class="img-rounded" src="{{ asset('storage').'/'.auth()->user()->foto}}" width="150" alt="User picture">

		@endif
	</div>
	<div class="user-info">
	  <span class="user-name">
		<strong>{{ auth()->user()->username}}</strong><br>
        <small>{{ auth()->user()->nom_completo}}</small>
	  </span>
	  <span class="user-role">
        @if ( auth()->user()->tipo_usuario == 1 )
      {{'Administrador'}}
        @endif  
        @if ( auth()->user()->tipo_usuario == 2 )
        {{'Editor'}}
          @endif  
          @if ( auth()->user()->tipo_usuario == 3 )
          {{'Espectador'}}
            @endif  
        </span>
	  <span class="user-status">
		<i class="fa fa-circle"></i>
		<span>Online</span>
	  </span>
	</div>
  </div>
  <!-- sidebar-header  -->
  
  <!-- sidebar-search  -->
  <div class="sidebar-menu">
	<ul>
	  <li class="header-menu">
		<span>General</span>
	  </li>
      <li>
		<a href="{{url('home')}}">
            <i class="fas fa-home"></i>
		  <span title="Redirecciona a la pagina principal">Home</span>
	
		</a>
	  </li>
	  
	  <li class="sidebar-dropdown">
		<a href="#">
			<i class="fas fa-boxes"></i>
		  <span>Activos</span>
		  <span class="badge rounded-pill bg-warning text-dark">{{ conteoActivos() }}</span>
		</a>
		<div class="sidebar-submenu">
		  <ul>
			<li>
				@if (Auth::user()->hasPermissionTo('ver activos')) 
			  <a href="{{url('/activos')}}"  title="Redirecciona al listado de activos">Listado de activos
				
			  </a>
			</li>
			@endif
			@if (Auth::user()->hasPermissionTo('crear activos')) 
			<li>
			  <a href="{{url('/activos/create')}}"  title="Click aqui para agregar activo">Agregar Activo</a>
			</li>
		  </ul>
		  @endif
		</div>
		
		
	  </li>
	  
     @if (Auth::user()->hasPermissionTo('ver categorias')) 
	  <li class="sidebar-dropdown">
		<a href="#">
			<i class="fas fa-tags"></i>
		  <span>Categorias</span>
		  <span class="badge rounded-pill bg-info text-dark" >{{ conteoCategorias() }}</span>
		</a>
		<div class="sidebar-submenu">
		  <ul>
			
			<li>
			  <a href="{{url('/categorias')}}" title="Redirecciona al listado de categorias">Listado de categorias</a>
			</li>
		
			@if (Auth::user()->hasPermissionTo('crear categorias')) 
			<li>
			  <a href="{{url('/categorias/create')}}"  title="Click aqui para agregar una nueva categoria">Agregar Categoria</a>
			</li>
			@endif
		  </ul>
		</div>
	  </li>
	@endif

	  @if (Auth::user()->hasPermissionTo('ver usuarios')) 
	  <li class="sidebar-dropdown">
		<a href="#">
		  <i class="far fa-user"></i>
		  <span>Usuarios</span>  <span class="badge rounded-pill bg-primary">{{ conteoUsuarios() }}</span>
		</a>
		<div class="sidebar-submenu">
		  <ul>
			@if (Auth::user()->hasPermissionTo('ver usuarios')) 
			<li>
			  <a href="{{url('/usuarios')}}" title="Redirecciona al listado de usuarios">Lista de usuarios</a>
			</li>
			@endif
			@if (Auth::user()->hasPermissionTo('crear usuarios')) 
			<li>
			  <a href="{{url('/usuarios/create')}}" title="Click aqui para agregar un nuevo usuario">Agregar nuevo usuario</a>
			</li>
			@endif
		  </ul>
		</div>
	  </li>
      @endif
	  @if (Auth::user()->hasPermissionTo('ver registros')) 
	  <li class="sidebar-dropdown">
		<a href="#">
		  <i class="fa fa-chart-line"></i>
		  <span>Registros</span>
<span class="badge rounded-pill bg-success">{{ conteoRegistros() }}</span>
		</a>
		<div class="sidebar-submenu">
		  <ul>
			@if (Auth::user()->hasPermissionTo('ver registros')) 
			<li>
			  <a href="{{url('/registros')}}">Listado de Registros</a>
			</li>
			@endif
		  </ul>
		</div>
	  </li>
      @endif
      @if (Auth::user()->hasPermissionTo('ver trashActivos')) 
	  <li class="sidebar-dropdown">
		<a href="#">
		 <i class="far fa-trash-alt"></i>
		  <span>Papelera</span> <span class="badge rounded-pill bg-danger">{{ conteoPapelera() }}</span>
		</a>
		<div class="sidebar-submenu">
		  <ul>
			@if (Auth::user()->hasPermissionTo('ver trashActivos')) 
			<li>
			  <a href="{{url('/papelera/activos')}}">Activos   <span style="display: inline;" class="badge rounded-pill bg-success ">Pro</span></a>
			
			</li>
			@endif

			@if (Auth::user()->hasPermissionTo('ver trashRegistros')) 
			<li>
			  <a href="{{url('/papelera/registros')}}">Registros</a>

			</li>
			@endif
		  </ul> 
		</div>
	  </li>
      @endif
	  <li class="header-menu">
		<span>Extra</span>
	  </li>
	  @if (Auth::user()->hasPermissionTo('ver massive')) 
	  <li>
		<a href="{{url('/importacion')}}">
		  <i class="fa fa-book"></i>
		  <span>Importacion</span>
		  <span class="badge rounded-pill bg-primary">Beta</span>
		</a>
	  </li>
	  @endif
<br>
	</ul>
  </div>
  <!-- sidebar-menu  -->
</div>
<!-- sidebar-content  -->
    <div class="sidebar-footer">
        <form action="{{route('logout')}}" method="POST" class="navbar-brand">
            @method('put')
          @csrf
  <a  href="{{url('/papelera/activos')}}">
	<button type="button" class="btn btn-secondary"  data-bs-toggle="tooltip" data-bs-placement="top"  data-html="true" title="Papelera de Activos" ><i class="fas fa-trash-alt"></i></button>
  </a>
  <a  href="{{url('/papelera/registros')}}">
	<button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"  data-html="true" title="Papelera de Registros" ><i class="fas fa-trash"></i></button>
  </a>
	<button type="button" class="btn btn-secondary" title="Cambiar Foto del usuario"  data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa fa-cog fa-lg" data-bs-toggle="tooltip" data-html="true" title="Cambiar foto del usuario" ></i></button>
  </a>
  <a>
    <button type="button" class="btn btn-secondary" title="Informacion del usuario"  id="info" data-bs-toggle="tooltip"  data-html="true" title="informacion del usuario" ><i class="fas fa-info"></i></button>
  </a>
<a>
  <button type="submit" class="btn btn-secondary" title="Cerrar Sesion" id="exit" data-bs-toggle="tooltip" data-placement="top" ><i class="fa fa-power-off fa-lg">	<span class="badge-sonar"></i></button>
  </a>
  </form>
</div>

</nav>
<!-- sidebar-wrapper  -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Datos de usuario</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{url('foto')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar form-horizontal" name="form1">
				@csrf
			<table class="table">
				<tbody>
			   <tr><th scope="row">Nombre Usuario:</th>		<td>{{ auth()->user()->username}}</td>
			   <tr><th scope="row">Nombre Completo </th>		<td>{{ auth()->user()->username}}</td>
			   <tr><th scope="row">Fecha de registro </th>	<td>{{ auth()->user()->created_at}}</td>
			   </tr>
			   <tr><th scope="row">Cambiar foto</th>	<td>    <input type="file" class="form-control"  id="foto" aria-describedby="foto" name="foto">
				</td>
			   </tr>
			</tbody></table>
	
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" name="addfoto" id="addfoto">Save changes</button>
		  </div>
	  </form>
	  </div>
	</div>
  </div>
<!-- Button trigger modal --> 
  
<script>
  $(function () {
	$('[data-bs-toggle="tooltip"]').tooltip()
  })
</script>

<script src="{{ asset('/js/sidebar.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>


    <script>

        var button = document.getElementById("exit");
        
        button.onclick = function()
        {
            let timerInterval
        Swal.fire({
          title: 'Estamos cerrando sesion<br>',
          icon: 'info',
          text: 'por favor espere',
          timer: 1800,
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
              button.onclick('entrarSistema');
            
          }
        })

            }
        
          </script>
	  <script>
        var button = document.getElementById("info");
        
        button.onclick = function()
        {
    Swal.fire({
        title: '<b>Datos del usuario:</b>',
        html:
    
        '<table class="table">'+
     ' <tbody>'+ 
    '<tr><th scope="row">Nombre Usuario:</th>		<td>{{ auth()->user()->username}}</td>'+
    '<tr><th scope="row">Nombre Completo </th>		<td>{{ auth()->user()->username}}</td>'+
    '<tr><th scope="row">Fecha de registro </th>	<td>{{ auth()->user()->created_at}}</td>'+
    '</tr></tbody></table>',
    
    })	
        }
          </script>
    

    