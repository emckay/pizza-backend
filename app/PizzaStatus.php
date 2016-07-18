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

    public function nextStatus()
    {
        $nextStatus = PizzaStatus::where('order', $this->attributes['order'] + 1)->first();
        if ($nextStatus != NULL) {
            return $nextStatus;
        }
        return $this;
    }
}
