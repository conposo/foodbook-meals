<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;

use App\Traits\ApiResponser;

class MealController extends Controller
{
    use ApiResponser;
    
    public function __construct()
    {
        //
    }

    public function index($user_type, $user_type_id, $date, $time)
    {
        $args = array_combine(['user_type', 'user_type_id', 'date', 'time'], func_get_args());
        return Meal::where($args)->get(['id', 'dish_type', 'dish_id', 'quantity']);

    }

    public function all($user_type, $user_type_id, $date)
    {
        $args = array_combine(['user_type', 'user_type_id', 'date'], func_get_args());
        return Meal::where($args)->get(['time', 'id', 'dish_type', 'dish_id', 'quantity']);
    }
}
