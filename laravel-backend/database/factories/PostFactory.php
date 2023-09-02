<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph($nbSentences = 7, $variableNbSentences = true),
            'image' => 'https://static.toiimg.com/thumb/msid-90672220,width-1200,height-900,resizemode-4,imgsize-37494/90672220.jpg',
        ];
    }
}
