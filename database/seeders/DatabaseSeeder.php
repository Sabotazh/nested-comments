<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            "id" => 1,
            "name" => "Ivan Sabat",
            "email" => "i.sabat@example.com",
            "password" => '$2y$10$/NbDDRLvGpUT9SsXloW8pOFtnHqP0qSZWgFd2pThxpZMwPtXL/jJO',
            "created_at" => "2019-12-31T22:00:00.000000Z",
            "updated_at" => "2023-10-13T12:19:20.000000Z",
        ]);

        User::factory()->create([
            "id" => 2,
            "name" => "Test user",
            "email" => "test@example.com",
            "password" => '$2y$10$/NbDDRLvGpUT9SsXloW8pOFtnHqP0qSZWgFd2pThxpZMwPtXL/jJO',
            "created_at" => "2019-12-31T22:00:00.000000Z",
            "updated_at" => "2023-10-13T12:19:20.000000Z",
        ]);

        $this->call([
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
