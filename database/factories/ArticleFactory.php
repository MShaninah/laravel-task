<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factorys correspondig model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->image,
            'body' => $this->faker->paragraph,
            'title' => $this->faker->title,
            'created_at' => now(),
        ];
    }
}
