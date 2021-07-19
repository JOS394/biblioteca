<!DOCTYPE html>
<html lang="en">
<head>
  <style>
table { 
    border-spacing: 0; 
    width: auto; 
}

}
}
th, td {
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}

  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <div >
    <table class="bordered" >
          <thead>
 
              <tr>
              
                  <th scope="col">#</th>
                  <th scope="col"><i class="fas fa-tasks fa-1x"></i></th>
                  <th scope="col"><i class="fas fa-image fa-1x"></i></th>
                  <th scope="col">Nombre de activos:</th>
                  <th scope="col">Marca:</th>
                  <th scope="col">Ubicacion:</th>
                  <th scope="col">Encargado:</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Codigo:</th>
                  <th scope="col">Usuario:</th>
                  <th scope="col">Estado activo:</th>
                  <th scope="col">Dominio:</th>
                  <th scope="col">Descripcion:</th>
          
                  <th scope="col">Creado en</th>
                  {{-- <th scope="col">Actualizado en </th> --}}
                
              </tr>
          </thead>
      
          <tbody>
              @foreach ($activos as $activo)     
              <tr>
                <td></td>
                  <td scope="row">{{$loop->iteration}}</td>      
                  <td scope="row"><img src="{{ asset('storage').'/'.$activo->foto}}" alt="" width="100" value="{{$activo->id}}"></td> 
                  <td scope="row">{{$activo->nom_activo}}</td>
                  <td scope="row">{{$activo->marca_act}}</td>
                  <td scope="row">{{$activo->ubicacion_act}}</td>
                  <td scope="row">{{$activo->encargado_act}}</td>
                  <td scope="row">{{$activo->categoria_activo}}</td>
                  <td scope="row">{{$activo->codigo_activo}}</td>
                  <td scope="row">{{$activo->username}}</td>
                  <td scope="row" >{{$activo->estado_activo}}</td>    
                  <td scope="row">{{$activo->dominio}}</td>
                  <td scope="row">{{$activo->descripcion}}</td>
                  <td scope="row">{{'('.$activo->created_at.')'}}<p><i></i></p></td>
                 
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
</body>
</html>