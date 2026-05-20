<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GroupUser>
 */
class GroupUserFactory extends Factory
{
    protected $model = GroupUser::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => Group::factory(),
            'user_id' => User::factory(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
