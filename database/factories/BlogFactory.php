<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 10),
            'category_id' => mt_rand(1, 3),
            'title' => $this->faker->sentence(mt_rand(2, 3)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(11, 12)),
            'body' => $this->faker->paragraph(mt_rand(9, 10)),
            'published_at' => now()
        ];
    }
}
