<?php

namespace App\Http\Controllers;

use App\Topping;

use Illuminate\Http\Request;
use App\Http\Requests;

class ToppingsController extends Controller
{
    public function index()
    {
        $toppings = Topping::all();

        return $toppings;
    }
}
