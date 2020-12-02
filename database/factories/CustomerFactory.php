<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'branch_id' => $this->faker->numberBetween(1, 3),
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(16, 50), 
            'plan' => 'Mensual', 
        ];
    }
}
