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

}); // default route

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
}); // to create a key for the project.
    //alternate of artisan command : php artisan key:generate

    $router->group(['prefix'=>'api'], function() use ($router){
        $router->get('/posts','PostController@index');
        $router->post('/posts','PostController@store');
        $router->post('/posts/{id}','PostController@update');
        $router->delete('/posts/{id}','PostController@destroy');
    });


