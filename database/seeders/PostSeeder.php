<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
//        Post::factory()->times(1)->create();

        Post::query()->firstOrCreate([
            'user_id' => User::query()->first()->id,
            'title' => 'Тестове завдання',
            'body' => 'SPA-додаток: Коментарі',
        ]);
    }
}
