<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'check_in' => $this->faker->time('H:i:s'),
            'check_out' => $this->faker->time('H:i:s'),
            'date' => $this->faker->date('Y_m_d'),
            'user_id'=> mt_rand(1, 10),
        ];
    }
}