<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostReaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostReaction>
 */
class PostReactionFactory extends Factory
{
    protected $model = PostReaction::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'type' => fake()->randomElement(['like', 'love', 'haha', 'wow', 'sad', 'angry']),
            'user_id' => User::factory(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
