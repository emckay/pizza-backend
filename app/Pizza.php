<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    // TODO: Change this to default status rather than 0
    protected $attributes = [
        'pizza_status_id' => 0,
    ];

    protected $fillable = ['name'];
}
