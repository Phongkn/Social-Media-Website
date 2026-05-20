<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostAttachment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostAttachment>
 */
class PostAttachmentFactory extends Factory
{
    protected $model = PostAttachment::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = fake()->uuid().'.png';

        return [
            'post_id' => Post::factory(),
            'name' => $fileName,
            'path' => 'attachments/'.$fileName,
            'url' => fake()->imageUrl(640, 480),
            'mime' => 'image/png',
            'size' => fake()->numberBetween(10000, 5000000),
            'created_by' => User::factory(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
