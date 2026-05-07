<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(8)->create();

        $group = Group::factory()->create([
            'user_id' => $testUser->id,
        ]);

        Post::factory(15)->create([
            'user_id' => $testUser->id,
            'group_id' => $group->id,
        ]);

        Post::factory(5)->deleted()->create([
            'user_id' => $testUser->id,
            'group_id' => $group->id,
        ]);
    }
}
