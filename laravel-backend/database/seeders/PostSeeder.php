<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(11)->create(['image'=>'https://logos-world.net/wp-content/uploads/2020/11/Fox-News-Channel-Emblem.png']);
        Post::factory()->count(11)->create();
    }
}
