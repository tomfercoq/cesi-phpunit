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

$router->get('/api/todos', ['as' => 'todos.index', 'uses' => 'TodoController@index']);
$router->post('/api/todos', ['as' => 'todos.store', 'uses' => 'TodoController@store']);
$router->get('/api/todos/{uuid}', ['as' => 'todos.show', 'uses' => 'TodoController@show']);
$router->patch('/api/todos/{uuid}/complete', ['as' => 'todos.complete', 'uses' => 'TodoController@complete']);
$router->delete('/api/todos/{uuid}', ['as' => 'todos.destroy', 'uses' => 'TodoController@destroy']);
