<?php

namespace App\Http\Controllers;

use App\Pizza;

use Illuminate\Http\Request;
use App\Http\Requests;
use Log;

class PizzasController extends Controller
{
    public function index()
	{
		$pizzas = Pizza::all();

		return $pizzas;
	}

	public function store(Request $request)
	{
		$pizza = new Pizza($request->input('pizza'));

        $pizza->save();

		return $pizza;
	}

	public function show(Pizza $pizza)
	{
		return $pizza;
	}

	public function update(Request $request, Pizza $pizza)
	{
        $pizza->update($request->all());

		return $pizza;
	}

	public function destroy(Pizza $pizza)
	{
		$pizza->delete();

		return [
            'success' => 1
        ];
	}
}
