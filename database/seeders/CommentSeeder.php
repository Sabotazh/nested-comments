<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Comment::query()->firstOrCreate([
            'user_id' => User::query()->first()->id,
            'post_id' => Post::query()->first()->id,
            'parent_id' => null,
            'body' => 'Трішки не встиг з виконанням усіх пунктів. Акцентував увагу на бекенді.'
        ]);
        Comment::query()->firstOrCreate([
            'user_id' => User::query()->first()->id,
            'post_id' => Post::query()->first()->id,
            'parent_id' => 1,
            'body' => 'Якщо будуть зауваження - пишіть мені в Телеграм: @ivansabat'
        ]);
    }
}
