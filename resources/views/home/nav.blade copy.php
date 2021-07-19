@extends('libraries')

<meta charset="utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<nav class="navbar navbar-expand-md navbar-dark bg-dark sidebarNavigation" data-sidebarClass="navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('home')}}">Home</a>

    <a class="navbar-brand" href="#">Navbar</a>
 
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
		@if(Auth::user()->hasRole('admin'))
        {{-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> --}}
        <a class="navbar-brand nav-link " href="{{url('/usuarios')}}"><b>{{'Usuarios'}}</b></a>
		@endif
      
      </div>
      <div class="navbar-nav">
        {{-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> --}}
        <a class="navbar-brand nav-link " href="{{url('/activos')}}"><b>Activos</b></a>
      </div>
	  <div class="navbar-nav">
        {{-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> --}}
        <a class="navbar-brand nav-link " href="{{url('/categorias')}}"><b>Categorias</b></a>
      </div>
    </div>
    {{-- <a class="nav-item nav-link" href="#">Usuario: {{ auth()->user()->username}}</a> --}}

    
      <ul class="nav navbar-nav navbar-right">
        
        <div class="btn-group">
          <button type="button" class="btn btn-dark" name="user" id="user" ><h5><i class="fas fa-user" ></i> {{ auth()->user()->username}}</h5></button>
          <button type="button" class="btn btn btn-dark  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          
          </button>
          <ul class="dropdown-menu">
<form action="{{route('logout')}}" method="POST" class="navbar-brand">
  @method('put')
@csrf
 <li><button class="dropdown-item " id="salir">Logout<i class="fas fa-sign-in-alt"></i></button></li>
          </form>
          </ul>
      </ul>
    </div>
  </nav>    


<script>

	var button = document.getElementById("salir");
	
	button.onclick = function()
	{
		let timerInterval
	Swal.fire({
    position: 'top-end',
	  title: 'Estamos cerrando sesion<br>',
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
	var button = document.getElementById("user");
	
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






   