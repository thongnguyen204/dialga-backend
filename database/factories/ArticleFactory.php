<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(50),
            'user_id' => User::factory(),
            'abstract' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(rand(7, 10)),
        ];
    }
}
