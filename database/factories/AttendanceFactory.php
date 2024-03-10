<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'check_in' => $this->faker->dateTime(),
            'check_out' => $this->faker->dateTime(),
            'date' => $this->faker->dateTimeThisMonth(),
            'user_id'=> '30fe0460-259e-3cda-afe9-4e70d1c79839',
        ];
    }
}
