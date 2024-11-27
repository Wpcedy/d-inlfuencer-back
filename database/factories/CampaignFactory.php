<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Decimal;

class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', '+1 year');
        $endDate = $startDate->modify('+1 month');

        return [
            'name' => $this->faker->name(),
            'description' => Str::random(10),
            'budget' => $this->faker->randomFloat(2, 1000, 100000),
            'start_campaign' => $startDate,
            'end_campaign' => $endDate,
        ];
    }
}
