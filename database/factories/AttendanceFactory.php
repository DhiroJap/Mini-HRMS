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
            'date' => $this->faker->date('Y_m_d'),
            'user_id'=> mt_rand(1, 10),
        ];
    }
}
