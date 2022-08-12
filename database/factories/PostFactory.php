<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // id
            'category_id' => Category::factory(), // id
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraph
        ];
    }
}
