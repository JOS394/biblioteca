@extends('layouth')
@section('title','Home')
@section('contenido')
@if (session('entrar')=='si')
<script>
    Swal.fire(
  'Logueo Exitoso!',
  'Te has logueado exitosamente!',
  'success'
)

</script>

@endif
    <link rel="stylesheet" href="{{ asset('/css/widget.css')}}">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <div class="main main-raised bg-body">
		<div class="container py-3">

            <div class="card col-lg-12">
                <div class="card-body">

<center>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/carrousel2.jpg')}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>NUESTRA HISTORIA</h5>
              <p>La Biblioteca Miguel de Cervantes de la Universidad Católica de El Salvador, 
                  fue creada con la misión primordial de ser una institución de fomento cultural
                   que contribuya al desarrollo personal y profesional de los usuarios y de sus 
                   respectivas comunidades, a través de la actualización constante de nuestros 
                   recursos humanos, bibliográficos, tecnológicos y de infraestructura, y del 
                   establecimiento de vínculos de cooperación académica con instituciones nacionales 
                   e internacionales.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/carrousel1.jpg')}}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>NUESTRA MISIÓN</h5>
              <p>Seremos una biblioteca con servicios actualizados que contribuya con excelencia a la formación 
                  integral de los miembros de la comunidad de la Universidad Católica de El Salvador..</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/carrousel4.jpg')}}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>NUESTRA VISIÓN</h5>
              <p>
         
                Seremos una biblioteca con servicios actualizados que contribuya 
                con excelencia a la formación integral de los miembros de la comunidad 
                de la Universidad Católica de El Salvador.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

            </center>
                              
        </div>
    </div>
    
    {{-- <div class="card col-sm-5">
        <div class="card-body">
    <div id='calendar'></div>
        </div></div> --}}


<br>


@if (Auth::user()->hasRole('admin')) 
<div class="card col-lg-12">
    <div class="card-body">
    <div class="col-md-14">
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-tv"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Activos</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{conteoActivos()}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>%<i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Usuarios</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{conteoUsuarios()}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-boxes"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Registros Actuales</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{conteoRegistros()}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-archive"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Categorias</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{conteoCategorias()}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div></div>
    @endif

    <div class="card col-lg-12">
        <div class="card-body">
<div class="how-section1">
                    <div class="row">
                        <div class="col-md-6 how-img">
                            <img src="https://image.ibb.co/dDW27U/Work_Section2_freelance_img1.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                        <div class="col-md-6">
                            <h4>Encuentra activos facilmente</h4>
                                        <h4 class="subheading">Puedes encontrar los activos que se han ingresado al sistema con facilidad</h4>
                        <p class="text-muted">Al momento de estar en la pagina de activos se pueden buscar los activos con los parametros 
                            que busques, luego de eso puedes exportarelos o mandarlos a imprimir sin mucho problema .</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4> Registro de cambios de activo </h4>
                                        <h4 class="subheading">Registros de todos los cambios de los activos</h4>
                                        <p class="text-muted">Por cada activo ingresado se registra cada cambio que se le realiza, 
                                            como tambien la eliminacion de este llevando el control de cada activo por separado, 
                                            sabiendo el estado actual del activo, ubicacion, fechas de ingreso, entre otros .</p>
                        </div>
                        <div class="col-md-6 how-img">
                            <img src="https://image.ibb.co/cHgKnU/Work_Section2_freelance_img2.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 how-img">
                             <img src="https://image.ibb.co/ctSLu9/Work_Section2_freelance_img3.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                        <div class="col-md-6">
                            <h4>Trabajo eficiente, Robusto.</h4>
                                        <h4 class="subheading">Tienes mil activos que ingresar?, hazlo sin miedo!:</h4>
                                        <p class="text-muted">El reporte de los activos y registros estan realizados para que puedan 
                                            tener miles de registros sin ningun problema de rendimiento, se ha realizado para optimizar con muchos registros a la vez.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Seguridad a la orden del dia:</h4>
                                        <h4 class="subheading">Utilizando herramientas de seguridad evitar inconvenientes.</h4>
                                        <p class="text-muted">Se ha pensado en la seguridad de los datos, por eso se han utilizado herramientas y metodos de seguridad que evitarian cualquier problema de inyecciones u tras formas de sustraer informacion  </p>
                        </div>
                        <div class="col-md-6 how-img">
                            <img src="https://image.ibb.co/gQ9iE9/Work_Section2_freelance_img4.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                    </div>
                </div></div>

</div>
        </div>  
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>


        @endsection
