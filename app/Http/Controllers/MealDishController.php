<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;
use App\Traits\ApiResponser;

class MealDishController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        // parameters => date / time / user_type / user_id / dish_type / dish_id
        $meal = Meal::where([
            'user_type' => $request->user_type,
            'user_type_id' => $request->user_type_id,
            'date' => $request->date,
            'time' => $request->time,

            'dish_type' => $request->dish_type,
            'dish_id' => $request->dish_id,
        ])->get();

        if($meal->isEmpty())
        {
            $meal = Meal::create($request->all());
        }
        // else
        // {
        //     $meal = $meal->first();
        //     if($meal->quantity < config('services.meal.add.max_quantity'))
        //     {
        //         // $meal->quantity++;
        //         $meal->increment('quantity');
        //         $meal->save();
        //     }
        // }
        dd($request->all(), $meal);
        return $this->successResponse($meal);
    }

    public function increment($meal_id)
    {
        $meal = Meal::findOrFail($meal_id);
        $meal->increment('quantity');
        $meal->save();
        return $this->successResponse($meal);
    }

    public function destroy($meal_id)
    {
        $meal = Meal::findOrFail($meal_id);
        if($meal->quantity == 1)
        {
            $meal->delete();
        }
        else // elseif($meal->quantity >= 2)
        {
            $meal->decrement('quantity');
            $meal->save();
        }
        return $this->successResponse($meal);
    }

    public function update(Request $request)
    {
        // $meal = Meal::findOrFail($meal_id);
        // if($request->quantity < config('services.meal.add.max_quantity'))
        // {
        //     if($meal->quantity == 1 || $request->quantity < 1)
        //         $meal->delete();
        //     else // elseif($meal->quantity >= 2)
        //     {
        //         $meal->quantity = $request->quantity;
        //         $meal->save();
        //     }
        // }
    }
}
