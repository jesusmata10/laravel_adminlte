<?php

use App\Http\Controllers\EntidadesController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth', 'StatusUser'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    //Route::get('/logout', 'LogoutController@logout')->name('salir');

    Route::resource('/usuario', 'UserController')->names('usuario');

    Route::resource('/personas', PersonasController::class)->names('personas');

    Route::resource('/roles', RolesController::class)->names('roles');
    Route::post('/storeRolPermiso', [App\Http\Controllers\RolesController::class, 'storeRolPermiso'])->name('rolesPermission');
    
    Route::resource('/permiso', PermisosController::class)->names('permisos');

    Route::post('/municipioAjaxUser', 'EntidadesController@municipioAjaxUser');
    Route::post('/parroquiaAjaxUser', 'EntidadesController@parroquiaAjaxUser');
    Route::post('/ciudadAjaxUser', 'EntidadesController@ciudadAjaxUser');
});
