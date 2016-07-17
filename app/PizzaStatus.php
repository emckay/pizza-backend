<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaStatus extends Model
{
    public function pizzas()
    {
        return $this->hasMany(Pizza::class);
    }

    public static function firstStatus()
    {
        return PizzaStatus::where('order', 0)->first();
    }
}
