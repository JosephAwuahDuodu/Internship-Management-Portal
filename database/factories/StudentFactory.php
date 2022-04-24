<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->randomNumber(8) ,
            'name' => $this->faker->name() ,
            'programme' => "Programme" ,
            'phone' => $this->faker->phoneNumber() ,
            'email' => $this->faker->email() ,
        ];
    }
}
