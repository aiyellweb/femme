<?php

use App\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('auth.login');
});




Route::get('/test',function(){

 $user =  new User();
 $user->name="admin";
 $user->email="admin@hotmail.com";
 $user->password=bcrypt('12345678');
 $user->segundo_nombre="admin";
 $user->rol_id=1;
 $user->save();


});

Route::get('/reset',function(){

 DB::statement('SET FOREIGN_KEY_CHECKS = 0');
 User::truncate();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout');



/// rutas carga maxiva de datos usuarios

/// rutas de tipo resource//

Route::resource('usuarios/usuarios','UserController');
Route::resource('equipos','EquipoController');

/////////fin rutas resorce////



Route::post('crear','UserController@crear');
Route::post('/Equipos-create','EquipoController@CrerarEquipo');
