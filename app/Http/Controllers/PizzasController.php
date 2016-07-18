<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\PizzaStatus;

use Illuminate\Http\Request;
use App\Http\Requests;
use Log;

class PizzasController extends Controller
{
    public function index()
	{
		$pizzas = Pizza::with('Toppings', 'PizzaStatus')->orderBy('created_at')->get();

		return $pizzas;
	}

	public function store(Request $request)
	{
		$pizza = new Pizza($request->input('pizza'));

        $pizza->save();

        $this->syncToppingsIfPresent($pizza, $request);

		return $pizza;
	}

	public function show(Pizza $pizza)
	{
        $pizza->load('toppings')->load('pizzaStatus');

		return $pizza;
	}

	public function update(Request $request, Pizza $pizza)
	{
        if ($request->input('pizza') != NULL)
        {
            $pizza->update($request->input('pizza'));
        }

        $this->syncToppingsIfPresent($pizza, $request);

		return $pizza;
	}

	public function destroy(Pizza $pizza)
	{
		$pizza->delete();

		return [
            'success' => 1
        ];
	}

    public function advanceStatus(Pizza $pizza)
    {
        $status = $pizza->pizzaStatus;
        $pizza->pizzaStatus()->associate($status->nextStatus());
        $pizza->save();

        return $pizza;
    }

    private function syncToppingsIfPresent($pizza, $request)
    {
        if ($request->input('toppings') != NULL)
        {
            $pizza->toppings()->sync($request->input('toppings'));
        }
    }
}
