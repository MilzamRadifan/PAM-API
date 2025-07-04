<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->get('/all', 'MahasiswaController@getMahasiswa');
    $router->get('/{nim}', 'MahasiswaController@getMahasiswaById');
    $router->post('/new', 'MahasiswaController@createMahasiswa');
    $router->put('/{nim}', 'MahasiswaController@updateMahasiswa');
    $router->delete('/{nim}', 'MahasiswaController@deleteMahasiswa');
});