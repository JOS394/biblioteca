@extends('layouth')
@section('title','usuarios')
@section('contenido')

<div class="main main-raised">
    <div class="container">
  <div class="section">
     <h4 class="title text-center">Crear nuevo registro</h4>

     <form class="" action="" method="post">
       {{-- {{ csrf_field()}} --}}
        <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Área de interés</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Seleccione un Área de interes</option>
                                    
                                    <option value=""></option>
                               
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-sm-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Interés</label>
                                <select class="form-control" name="interst_id">
                                    <option value="0" >Termino de búsqueda</option>
                             
                                    <option value=""></option>
                                  
                                </select>
                            </div>
                        </div>

         <div class="col-sm-9">
           <div class="form-group label-floating">
             <label class="control-label">Titulo del recurso electrónico...</label>
             <input type="text" class="form-control" name="titulo">
           </div>
         </div>
                     <div class="col-sm-3">
           <div class="form-group label-floating">
             <label class="control-label">Idioma...</label>
             <input type="text" class="form-control" name="idioma" >
           </div>
         </div>
                     <div class="col-sm-5">
           <div class="form-group label-floating">
             <label class="control-label">Autor o autores...</label>
             <input type="text" class="form-control" name="autor" >
           </div>
         </div>
                     <div class="col-sm-5">
           <div class="form-group label-floating">
             <label class="control-label">Fuente o Editorial...</label>
             <input type="text" class="form-control" name="editorial" ">
           </div>
         </div>
                     <div class="col-sm-2">
                         <div class="form-group label-floating">
                             <label class="control-label">Tipo de documento</label>
                             <select class="form-control" name="tipo">
                                 <option value="0">Tipo de documento</option>
                                 <option value="Artículo de investigación">Artículo de investigación</option>
                                 <option value="Estudio de caso">Estudio de caso</option>
                                 <option value="Crítica">Crítica</option>
                                 <option value="Informes">Informes</option>
                                 <option value="Libros">Libros</option>
                                 <option value="Publicaciones profesionales">Publicaciones</option>
                                 <option value="Revista">Revista</option>
                             </select>
                         </div>
                     </div>

                     <div class="col-sm-12">
                         <hr>
                         <h5 class="text-center">Palabras claves del recurso electrónico:</h5>
                     </div>
                     <div class="col-sm-3">
                         <div class="form-group label-floating">
                             <input type="text" placeholder="primera palabra clave..." class="form-control" name="palabra" >
                         </div>
                     </div>
                     <div class="col-sm-3">
                         <div class="form-group label-floating">
                             <input type="text" placeholder="segunda palabra clave..." class="form-control" name="palabra1" >
                         </div>
                     </div>
                     <div class="col-sm-3">
                         <div class="form-group label-floating">
                             <input type="text" placeholder="tercera palabra clave..." class="form-control" name="palabra2" >
                         </div>
                     </div>
                     <div class="col-sm-3">
                         <div class="form-group label-floating">
                             <input type="text" placeholder="cuarta palabra clave..." class="form-control" name="palabra3">
                         </div>
                     </div>
                     <div class="container">
                             <hr>
                            <div class="form-group label-floating">
                  <label class="control-label">Resumen corto</label>
                  <input type="text" class="form-control" name="resumen" >
                </div>

                <textarea class="form-control" placeholder="Resumen extenso del documento" name="resumen_largo" rows="5"></textarea>
                     </div>
                     <div class="col-sm-6">
           <div class="form-group label-floating">
             <label class="control-label">Institución o entidad...</label>
             <input type="text" class="form-control" name="institucion" >
           </div>
         </div>
                     <div class="col-sm-4">
           <div class="form-group label-floating">
             <label class="control-label">Base de datos...</label>
             <input type="text" class="form-control" name="fuente">
           </div>
         </div>
                     <div class="col-sm-8">
           <div class="form-group label-floating">
             <label class="control-label">URL permanente...</label>
             <input type="text" class="form-control" name="url" >
           </div>
         </div>
                     <div class="col-sm-2">
           <div class="form-group label-floating">
             <label class="control-label">Fecha de publicación</label><br>
             <input type="date" class="form-control" name="fecha_publicacion" >
           </div>
         </div>

       </div>

       <button class="btn btn-primary">Guardar registro</button>
                 <a href="#" class="btn btn-default">Cancelar</a>

     </form>
  </div>
</div>
</div>