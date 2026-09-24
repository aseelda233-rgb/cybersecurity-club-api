<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $assignments = [
            'Exploring the world of Laravel' => ['Technology', 'Laravel'],
            'Top 10 tips for writing clean code' => ['Programming', 'Technology'],
        ];

        foreach ($assignments as $content => $categoryNames) {
            $post = Post::where('content', $content)->first();

            if ($post) {
                $categoryIds = collect($categoryNames)
                    ->map(fn (string $name) => $categories->get($name))
                    ->filter()
                    ->all();

                $post->categories()->sync($categoryIds);
            }
        }
    }
}
