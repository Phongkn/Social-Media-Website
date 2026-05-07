<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->optional(0.9)->paragraphs(rand(1, 3), true),
            'user_id' => User::factory(),
            'group_id' => Group::factory(),
            'deleted_by' => null,
            'deleted_at' => null,
        ];
    }

    public function deleted(): static
    {
        return $this->state(['deleted_at' => now()])
            ->afterCreating(function (Post $post) {
                $post->updateQuietly(['deleted_by' => $post->user_id]);
            });
    }
}
