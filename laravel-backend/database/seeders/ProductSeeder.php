<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::get()->each(function (Category $category) {
            Product::factory()->count(12)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
