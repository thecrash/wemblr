<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/*Segmento del recurso USUARIOS*/
Route::get('/usuarios',array('as'=>'usuarios.lista','uses'=>'UsuarioController@lista'));

/*segmento tarea 1*/
Route::get('/usuarios/main',array('as'=>'usuarios.main','uses'=>'UsuarioController@main'));

Route::get('/usuarios/nuevo',array('as'=>'usuarios.nuevo','uses'=>'UsuarioController@nuevo'));

Route::post('/usuarios/nuevo',array('as'=>'usuarios.nuevofin','uses'=>'UsuarioController@nuevofin'));

Route::get('/usuarios/show/{id}',array('as'=>'usuarios.show','uses'=>'UsuarioController@show'));
/*segmento tarea 1*/

/*segmento tarea 2*/
Route::get('/usuarios/editar/{id}',array('as'=>'usuarios.editar','uses'=>'UsuarioController@editar'));

Route::post('/usuarios/{id}/update',array('as'=>'usuarios.update','uses'=>'UsuarioController@update'));
/*segmento tarea 2*/
Route::get('/usuarios/borrar/{id}',array('as'=>'usuarios.borrar','uses'=>'UsuarioController@borrar'));

/*segmento tare 3*/
Route::get('/usuarios/login',array('as'=>'usuarios.login','uses'=>'UsuarioController@login'));

Route::post('/usuarios/auth',array('as'=>'usuarios.auth','uses'=>'UsuarioController@auth'));

Route::get('/usuarios/logout',array('as'=>'usuarios.logout','uses'=>'UsuarioController@logout'));
/*segmento tare 3*/

/*Segmento del recurso POSTS*/

/*Segmento tarea */
//Ruta de recurso post
Route::resource('posts', 'PostsController');
/*Segmento tarea */

/*Segmento de errores*/
App::error(function ($exception,$code){

});
/*Segmento de errores*/