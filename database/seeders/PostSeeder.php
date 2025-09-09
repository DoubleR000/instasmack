<?php

namespace Database\Seeders;

use App\Models\Post;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filepath = storage_path("postimages");

        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);
        }

        Post::factory()->withMedia()->count(10)->create();
    }
}
