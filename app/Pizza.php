<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['name'];

    public function pizzaStatus()
    {
        return $this->belongsTo(PizzaStatus::class);
    }

    public function setPizzaStatus($status = NULL)
    {
        if($status == NULL)
        {
            $status = PizzaStatus::firstStatus();
        }

        $this->pizzaStatus()->associate($status);
    }
}
