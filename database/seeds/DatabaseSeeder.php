<?php

use Illuminate\Database\Seeder;
use App\PizzaStatus;
use App\Topping;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PizzaStatus::firstOrCreate(['name' => 'Pending', 'order' => 0]);
        PizzaStatus::firstOrCreate(['name' => 'Submitted', 'order' => 1]);
        PizzaStatus::firstOrCreate(['name' => 'Ready', 'order' => 2]);

        $toppingList = array('Pepperoni', 'Sausage', 'Mushrooms', 'Olives', 'Spinach');

        foreach($toppingList as $name)
        {
            Topping::firstOrCreate(['name' => $name]);
        }
    }
}
