<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/agent/add', 'AgentController@add')->name('addagent');
Route::get('/agent/get/{id}', 'AgentController@get')->name('getagent');
Route::post('/agent/update', 'AgentController@update')->name('updateagent');
Route::get('/agent/delete/{id}', 'AgentController@delete')->name('deleteagent');
Route::get('/agent/getAll/', 'AgentController@getAll')->name('getAllagent');
Route::post('/agent/persist/', 'AgentController@persist')->name('persistagent');


Route::get('/article/add', 'ArticleController@add')->name('addarticle');
Route::get('/article/get/{id}', 'ArticleController@get')->name('getarticle');
Route::post('/article/update', 'ArticleController@update')->name('updatearticle');
Route::get('/article/delete/{id}', 'ArticleController@delete')->name('deletearticle');
Route::get('/article/getAll/', 'ArticleController@getAll')->name('getAllarticle');
Route::post('/article/persist/', 'ArticleController@persist')->name('persistarticle');

Route::get('/commande/add', 'CommandeController@add')->name('addcommande');
Route::get('/commande/get/{id}', 'CommandeController@get')->name('getcommande');
Route::post('/commande/update', 'CommandeController@update')->name('updatecommande');
Route::get('/commande/delete/{id}', 'CommandeController@delete')->name('deletecommande');
Route::get('/commande/getAll/', 'CommandeController@getAll')->name('getAllcommande');
Route::post('/commande/persist/', 'CommandeController@persist')->name('persistcommande');

Route::get('/vente/add', 'VenteController@add')->name('addvente');
Route::get('/vente/get/{id}', 'VenteController@get')->name('getvente');
Route::post('/vente/update', 'VenteController@update')->name('updatevente');
Route::get('/vente/delete/{id}', 'VenteController@delete')->name('deletevente');
Route::get('/vente/getAll/', 'VenteController@getAll')->name('getAllvente');
Route::post('/vente/persist/', 'VenteController@persist')->name('persistvente');

Route::get('/lis/add', 'LisController@add')->name('addlis');
Route::get('/lis/get/{id}', 'LisController@get')->name('getlis');
Route::post('/lis/update', 'LisController@update')->name('updatelis');
Route::get('/lis/delete/{id}', 'LisController@delete')->name('deletelis');
Route::get('/lis/getAll/', 'LisController@getAll')->name('getAlllis');
Route::post('/lis/persist/', 'LisController@persist')->name('persistlis');
Route::get('/auth/getAll/', 'RegisterController@getAll')->name('getAlluser');

