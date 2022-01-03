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


$router->get('meals/{user_type}/{user_type_id}/{date}', 'MealController@all');

$router->get('meal/{user_type}/{user_type_id}/{date}/{time}', 'MealController@index');
$router->post('meal-dish', 'MealDishController@store');
$router->patch('meal-dish/{meal_id}', 'MealDishController@increment');
$router->delete('meal-dish/{meal_id}', 'MealDishController@destroy');
// $router->any('meal-dish/{meal_id}', 'MealDishController@update');


// System routes
$router->get('allmeals', 'SystemController@allMeals');
