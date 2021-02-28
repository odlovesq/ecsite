<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $fileRealPath = UploadedFile::fake()
            ->create($name . 'png', 10, 'image/png')
            ->store('products');

        return [
            'name' => $name,
            'price' => $this->faker->randomNumber,
            'image_path' => $fileRealPath,
        ];
    }
}
