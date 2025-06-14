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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->get('me', 'AuthController@me');
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('mahasiswa', 'MahasiswaController@index');
    $router->get('mahasiswa/prodi/{id}', 'MahasiswaController@getByProdi');
    $router->get('prodi', 'ProdiController@index');
});

$router->group(['prefix' => 'matkul', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'MatakuliahController@index');
    $router->get('saya', 'MatakuliahController@myMatakuliahs');
    $router->post('tambah', 'MatakuliahController@storeToMahasiswa');
    $router->get('{id}', 'MatakuliahController@isMatkulRegistered');
});

$router->group(['prefix' => 'public'], function () use ($router) {
    $router->get('prodi', 'ProdiController@publicIndex');
});
