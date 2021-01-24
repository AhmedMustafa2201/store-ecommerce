<?php
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}

// $factory->define(Category::class, function (Faker $faker) {
//     return [
//         'name'  => $faker->word(),
//         'slug'  => $faker->slug(),
//         'is_active' => $faker->boolean()
//     ];
// });
