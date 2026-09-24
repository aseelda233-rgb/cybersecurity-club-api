<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',
                'description' => 'News, tutorials, and insights about technology.',
            ],
            [
                'name' => 'Programming',
                'description' => 'Tips and guides for software developers.',
            ],
            [
                'name' => 'Laravel',
                'description' => 'Articles about building applications with Laravel.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
