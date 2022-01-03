<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    public function getDishAttribute()
    {
        return $this->attributes['dish'];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'time',
        'user_type',
        'user_type_id',
        'dish_type',
        'dish_id',
    ];
    
    protected $attributes = [
        'quantity' => 1,
    ];

    public function type()
    {

    }
}
