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
    return "test ".$router->app->version();
});

$router->get('/posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return "postId = ".$postId."<br/>commentId = ".$commentId;
});

$router->get('/user[/{name}]', function ($name = null) {
    if ($name == null) return "you are null";
    return "you are ".$name;
});
