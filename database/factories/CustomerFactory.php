<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name(),
            'gender_id' => $this->faker->numberBetween(1,2),
            'birth_date' => $this->faker->date()
        ];
    }
}
