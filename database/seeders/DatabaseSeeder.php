<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Follower;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Post;
use App\Models\PostAttachment;
use App\Models\PostReaction;
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

        $users = User::factory(8)->create();

        $group = Group::factory()->create([
            'user_id' => $testUser->id,
        ]);

        // Thêm testUser vào group với role admin
        GroupUser::factory()->create([
            'group_id' => $group->id,
            'user_id' => $testUser->id,
            'status' => 'approved',
            'role' => 'admin',
            'created_by' => $testUser->id,
            'created_at' => now(),
        ]);

        // Thêm các user khác vào group
        foreach ($users as $user) {
            GroupUser::factory()->create([
                'group_id' => $group->id,
                'user_id' => $user->id,
                'status' => 'approved',
                'role' => 'member',
                'created_by' => $testUser->id,
                'created_at' => now(),
            ]);
        }

        $posts = Post::factory(15)->create([
            'user_id' => $testUser->id,
            'group_id' => $group->id,
        ]);

        Post::factory(5)->deleted()->create([
            'user_id' => $testUser->id,
            'group_id' => $group->id,
        ]);

        // Tạo attachments cho một số bài post
        foreach ($posts->random(5) as $post) {
            PostAttachment::factory(rand(1, 3))->create([
                'post_id' => $post->id,
                'created_by' => $post->user_id,
                'created_at' => $post->created_at,
            ]);
        }

        // Tạo reactions cho các bài post
        foreach ($posts as $post) {
            $randomUsers = $users->random(rand(0, 5));
            foreach ($randomUsers as $user) {
                PostReaction::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'created_at' => $post->created_at,
                ]);
            }
        }

        // Tạo comments cho các bài post
        foreach ($posts as $post) {
            Comment::factory(rand(0, 5))->create([
                'post_id' => $post->id,
                'user_id' => $users->random()->id,
                'created_at' => $post->created_at,
            ]);
        }

        // Tạo mối quan hệ follow giữa các user
        foreach ($users as $user) {
            $randomUsers = $users->except($user->id)->random(rand(1, 4));
            foreach ($randomUsers as $followed) {
                Follower::factory()->create([
                    'user_id' => $followed->id,
                    'follower_id' => $user->id,
                    'created_at' => now(),
                ]);
            }
        }
    }
}
