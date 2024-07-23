<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lob>
 */
class LobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word,
            'client' => $this->faker->word,
            'reason' => $this->faker->word,
            'burden' => $this->faker->word,
            'date' => $this->faker->date(),
        ];
    }
}
