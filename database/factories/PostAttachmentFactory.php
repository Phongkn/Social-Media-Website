<?php

namespace Database\Factories;

use App\Models\PostAttachment;
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
        return [];
    }
}
