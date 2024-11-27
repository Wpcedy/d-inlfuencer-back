<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class InfluencerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = ['technology', 'fashion', 'beauty', 'food', 'travel'];

        return [
            'name' => $this->faker->name(),
            'instagram' => '@' . $this->faker->userName(),
            'followers' => $this->faker->numberBetween(100, 10000),
            'category' => $categories[array_rand($categories)],
        ];
    }
}
