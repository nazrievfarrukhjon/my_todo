<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'body' => json_encode(fake()->text()),
            'action' => fake()->title(),
        ];
    }

}
