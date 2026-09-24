<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'content' => 'Exploring the world of Laravel',
                'image'   => 'https://picsum.photos/800/400',
            ],
            [
                'content' => 'Top 10 tips for writing clean code',
                'image'   => 'https://picsum.photos/800/400',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
