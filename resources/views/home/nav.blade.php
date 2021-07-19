@extends('librerias.scripts')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	  <a class="navbar-brand" href="#"></a>
	  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		<li class="nav-item">
			<a class="nav-link disabled" href="#"></a>
		  </li>
		<li class="nav-item active">
		  <a class="nav-link" disabled> <h5>  Inventario de Activos </h5><span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
		  <a class="nav-link disabled" href="#"></a>
		</li>
		<li class="nav-item">
		  <a class="nav-link disabled" href="#"></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="#">
				<div id="MyClockDisplay" class="clock" onload="showTime()"></div></a>
		  </li>

	  </ul>
	  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		<li class="nav-item avatar">
			<a href="https://www.catolica.edu.sv/"><img src="{{ asset('images/unicaes.png')}}" class="rounded-circle z-depth-0"
			alt="avatar image" height="50">	</a>	

		  <a class="nav-link p-0" href="#">

		  </a>
		</li>
	  </ul>
	</div>
  </nav>
  <style>




.clock {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: #000000;
    font-size: 20px;
    font-family: Orbitron;
    letter-spacing: 7px;
   


}
  </style>
  <script>

	function showTime(){
		var date = new Date();
		var h = date.getHours(); // 0 - 23
		var m = date.getMinutes(); // 0 - 59
		var s = date.getSeconds(); // 0 - 59
		var session = "AM";
		
		if(h == 0){
			h = 12;
		}
		
		if(h > 12){
			h = h - 12;
			session = "PM";
		}
		
		h = (h < 10) ? "0" + h : h;
		m = (m < 10) ? "0" + m : m;
		s = (s < 10) ? "0" + s : s;
		
		var time = h + ":" + m + ":" + s + " " + session;
		document.getElementById("MyClockDisplay").innerText = time;
		document.getElementById("MyClockDisplay").textContent = time;
		
		setTimeout(showTime, 1000);
		
	}
	
	showTime();
	
	
	</script>
  