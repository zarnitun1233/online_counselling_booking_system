<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 2;
        return [
            'personality1' => rand(0,1),
            'personality2' => rand(0,1),
            'hobby1' => rand(0,1),
            'hobby2' => rand(0,1),
            'mindset1' => rand(0,1),
            'mindset2' => rand(0,1),
            'user_id' => $number++,
        ];
    }
}
