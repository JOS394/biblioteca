@extends('layout')
@section('title','login')
@section('contenido')

		@if (session('entrar')=='no')
		<script>
		  Swal.fire(
			'Contraseña incorrecta!',
			'Intenta ingresar los datos nuevamente.',
			'error'
		  )
	  
		</script>
		@endif 
		@if (session('entrar')=='si')
		<script>
		  Swal.fire(
			'Inicio de sesion Exitoso!',
			'Estamos redireccionandote a la pagina principal.',
			'error'
		  )
	  
		</script>
		@endif 
		<div class="container py-3">
			<div class="col-md-6 mx-auto">
				<div class="card">
					<div class="card-header">
						<h1 class="text-center">Login</h1>
					</div>
					<div class="card-body">
						
					
						<div style="text-align: center;">
                            <img src="{{ asset('images/user.png') }}" height="90">
						<p></p>
					</div>
							<div class="form-label-group mb-4">
								@if ($errors->any())
								
								<div class="alert alert-danger" role="alert">
								  <ul>
									  @error('username')
									  <li>
										{{ $errors->first('username') }}
									</li>
									  @enderror
								
									  @error('password')
									  <li>
									 {{ $errors->first('password') }}
									</li>
									  @enderror
								  </ul>
								
								</div> 
								@endif
        <form method="post" action="{{ route('login') }}">
			@csrf
								<input type="text" name="username" id="username" class="form-control" placeholder="Usuario" value="{{old('username')}}" data-toggle="tooltip" data-placement="top" title="Ingresa tu nombre de usuario" required >
						
							</div>
							<div class="form-label-group mb-4">
								<input type="password" name="password" id="password" class="form-control" placeholder="Contrase&ntilde;a" required>
								
							</div>
					
						
							<center><button class="btn btn-danger btn-lg btn-block mb-4" id="entrarSistema">Entrar</button></center>
							<p class="text-muted text-center">
								Universidad Catolica de El Salvador&copy; 2021
							</p>
					</div>
                </form>
				</div>
			</div>
	
</div>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
{{-- <script>

	var button = document.getElementById("entrarSistema");
	
	button.onclick = function()
	{
		let timerInterval
	Swal.fire({
	  icon:'success',
	  title: 'Entrando al sistema..',
	  text: 'por favor espere.',
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
		  button.onclick();
		
	  }
	})
	
	
	
	
		}
	
	  </script> --}}

@endsection

