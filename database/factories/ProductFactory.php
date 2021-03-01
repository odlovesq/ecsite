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
        $name = $this->faker->safeColorName;
        $fileRealPath = UploadedFile::fake()
            ->create($name, 10, 'image/png')
            ->store('products');

        return [
            'name' => $name,
            'price' => $this->faker->randomNumber,
            'description' => $this->faker->realText($maxNbChars = 100),
            'image_path' => $fileRealPath,
            'created_at' => $this->faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now')
        ];
    }
}
