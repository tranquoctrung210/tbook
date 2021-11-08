<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories_id = Category::get('id');
        return [
            'book_name' => $this->faker->name(),
            'slug_book' => $this->faker->slug(),
            'description' => $this->faker->slug(),
            'status' => $this->faker->numberBetween($min = 0, $max = 1),    
            // 'category_id' => $this->faker->randomElements($array = $categories_id, $count = 3),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'view' => $this->faker->numberBetween($min = 0, $max = 2000000) ,
            'author' => $this->faker->name(),
        ];
    }
}
