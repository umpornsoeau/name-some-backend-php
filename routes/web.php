<?php

$router->get('/', 'IndexController@index');
$router->get('/random[/{amount}]', 'NameController@random');

