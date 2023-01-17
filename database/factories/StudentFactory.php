<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

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
            'student_name' => $this->faker->name(),
            'student_kana' => $this->faker->name(),
            'student_gender' => $this->faker->randomElement(['男の子' ,'女の子']), //enum用のfaker
            // 'student_image' => $this->faker->image(storage_path('app/public/students'), 50, 50),
            // 'student_image' => $this->faker->imageUrl(360, 360, 'people', true)
        ];


    }
}
