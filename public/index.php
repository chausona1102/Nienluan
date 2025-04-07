<?php

require_once __DIR__ . '/../config/bootstrap.php';

$router = new \Bramus\Router\Router();

$router->get('/signin', '\App\Controllers\SigninController@signin');
$router->post('/signin', '\App\Controllers\SigninController@check');
$router->get('/signup', '\App\Controllers\SignupController@signup');
$router->post('/signup', '\App\Controllers\SignupController@check');
$router->get('/signout', '\App\Controllers\SigninController@signout');

$router->all('/', 'App\Controllers\IndexController@index');
$router->all('/bomb','App\Controllers\BombController@bomb');
$router->all('/sudoku','App\Controllers\SudokuController@sudoku');
$router->all('/signin','App\Controllers\SigninController@signin');
$router->all('/signup','App\Controllers\SignupController@signup');
$router->all('updatescore','App\Controllers\GameController@updatescore');
$router->all('/rules','App\Controllers\RulesController@rules');
$router->all('/rank', 'App\Controllers\RankController@rank');

$router->all('/admin', 'App\Controllers\AdminController@admin');

$router->get('/admin/lockuser/(\d+)', 'App\Controllers\AdminController@lockuser');
$router->get('/admin/unlockuser/(\d+)', 'App\Controllers\AdminController@unlockuser');
$router->get('/admin/resetscore/(\d+)', 'App\Controllers\AdminController@resetscore');
$router->post('/admin/editinfouser/(\d+)', 'App\Controllers\AdminController@editInfUser');
$router->post('/admin/deleteuser/(\d+)', 'App\Controllers\AdminController@deluser');
$router->post('/admin/adduser/', 'App\Controllers\AdminController@add');



$router->run();