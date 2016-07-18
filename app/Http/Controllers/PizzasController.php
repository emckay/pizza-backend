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

        $this->syncToppings($pizza, $request);

		return $pizza->load('toppings', 'pizzaStatus');
	}

	public function show(Pizza $pizza)
	{
		return $pizza->load('toppings', 'pizzaStatus');
	}

	public function update(Request $request, Pizza $pizza)
	{
        if ($request->input('pizza') != NULL)
        {
            $pizza->update($request->input('pizza'));
        }

        $this->syncToppings($pizza, $request);

		return $pizza->load('toppings', 'pizzaStatus');
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

        return $pizza->load('toppings', 'pizzaStatus');
    }

    private function syncToppings($pizza, $request)
    {
        $toppings = $request->input('toppings');

        if ($toppings == NULL)
        {
            $toppings = [];
        }

        $pizza->toppings()->sync($toppings);
    }
}
