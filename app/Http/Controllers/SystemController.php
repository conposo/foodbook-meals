<?php

namespace App\Http\Controllers;

use App\Meal;

class SystemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function allMeals()
    {
        return Meal::all();
    }
}
