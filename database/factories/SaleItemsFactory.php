<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SaleItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sale_id' => 1,
            'product_id' => 1,
            'qty' => $this->faker->numberBetween($min = 10, $max = 100),
            'price' => $this->faker->numberBetween($min = 1000, $max = 10000),
        ];
    }
}
