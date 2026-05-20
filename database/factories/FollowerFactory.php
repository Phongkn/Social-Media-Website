<?php

namespace Database\Factories;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Follower>
 */
class FollowerFactory extends Factory
{
    protected $model = Follower::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'follower_id' => User::factory(),
        ];
    }
}
