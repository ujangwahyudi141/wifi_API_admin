<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WifiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_wifi' => $this->faker->name(),
            'lokasi' => $this->faker->address(),
            'status' => 1
        ];
    }
}
