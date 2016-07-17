<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
