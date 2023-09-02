<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'price' => $this->faker->randomFloat(2,1,10000),
            'image' => 'https://www-file.huawei.com/-/media/corp2020/home/cbg/1221/2-p50-pro-m.jpg',
            'category_id' => Category::factory(),
        ];
    }
}
