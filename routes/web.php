<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\registrosController;
use App\usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;
use Symfony\Component\VarDumper\VarDumper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('home', 'home')->name('home')->middleware('auth');
Route::view('importacion', 'import.importacion')->name('importacion')->middleware('auth');
// Route::get('permisos/{id}/index', 'permisosController@index')->name('index');
Route::view('permisos', 'permisos.index')->name('permisos');
Route::view('registros', 'registros.index')->name('registros');
Route::view('sidebar', 'home.sidebar')->name('sidebar');


//login--------------------------------------------------------------------------------
Route::view('/', 'Login')->name('login')->middleware('guest');
Route::put('/',[loginController::class,'logout'])->name('logout');
Route::post('/','loginController@store')->name('login.store');
Route::post('foto','usuariosController@cambiarFoto')->name('usuarios.cambiarFoto');

//EN ESTE GRUPO DE CODIGO SE DEFINEN LOS PERMISOS Y ROLES DEL ADMINISTRADOR
//rutas accesibles solo para admin--------------------------------------------------------------------------------
    Route::resource('usuarios','UsuariosController')->middleware('auth');
    Route::resource('activos','activosController')->middleware('web');
    Route::resource('categorias','categoriaController')->middleware('auth');
    Route::resource('registros','registrosController')->middleware('auth');
    

    
    Route::view('tabla', 'registros.tabla');
    
    
    Route::get('permisos/{id}','permisosController@index')->name('permisos')->middleware('auth');
    Route::get('permisos/{id}/edit','permisosController@edit')->name('permisos.edit')->middleware('auth');
    Route::patch('permisos/{id}','permisosController@update')->name('permisos.update')->middleware('auth');
    Route::get('activos','activosController@index')->name('activos.index')->middleware('auth');

    Route::get('activos/create','activosController@create')->name('activos.create')->middleware('auth');

Route::get('DataTable/activos','DataTableController@activos')->name('datatable.activos');
// Route::view('show', 'registros.show')->name('show');
Route::get('/registros/{id}', 'registrosController@show')->name('registros.show')->middleware('auth');


Route::get('categorias','categoriaController@index')->name('categorias.index')->middleware('auth');
Route::get('categorias/create','categoriaController@create')->name('categorias.create')->middleware('auth');
Route::post('crearCategoria', 'categoriaController@crearcategoria')->name('crearCategoria');


//exportaciones de datos ----------------------------------------------------------------------------------------------
Route::post('import-list-excel', 'exportController@ActivosimportExcel')->name('activos.import.excel');
Route::get('activos-Trash-list-excel', 'exportController@ActivosTrashExport')->name('activosTrash.excel');
Route::get('registros-Trash-list-excel', 'exportController@RegistrosTrashExport')->name('registrosTrash.excel');


// Papelera
Route::get('/registros/{id}/show', 'registrosController@filtrar')->name('show')->middleware('auth');
Route::get('papelera/activos', 'PapeleraController@papeleraActivos')->name('papelera.activos')->middleware('auth');
Route::get('papelera/registros', 'PapeleraController@papeleraRegistros')->name('papelera.registros');
Route::get('/papelera/registros/{id}', 'PapeleraController@restoreRegistros')->name('restoreRegistros')->middleware('auth');
Route::get('/papelera/activos/{id}', 'PapeleraController@restoreActivos')->name('restoreActivos')->middleware('auth');
Route::delete('/papelera/{id}/activos', 'papeleraController@destroy')->name('destroyActivo');
