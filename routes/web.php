<?php

$router->get('/', 'IndexController@index');
$router->get('/random[/{amount}]', 'NameController@random');

$router->get('/createtable', 'NameController@createtable');
$router->get('/droptable', 'NameController@droptable');
$router->get('/insertsample', 'NameController@insertsample');



