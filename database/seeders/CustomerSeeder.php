<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Trainer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()
        ->times(10)
        ->has(Trainer::factory()->count(3))
        ->create();
    }
}
