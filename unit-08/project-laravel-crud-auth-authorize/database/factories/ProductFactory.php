<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    /**
     * he name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'photo' => $this->faker->file,
            'trademark_name' => $this->faker->name,
            'trademark_email' => $this->faker->email,
            'date_expiry' => $this->faker->date,
            'type_stock' => $this->faker->randomElement(['Sanitario', 'No Sanitario', 'Alimentario']),
            'type' => $this->faker->text,
            'available_stock' => $this->faker->randomNumber(3, true),
            'minimum_stock' => $this->faker->randomNumber(3, true),
            'type_product_unit' => $this->faker->randomElement(['kilogramo/s', 'hectogramo/s', 'decagramo/s', 'gramo/s', 'decigramo/s', 'centigramo/s', 'miligramo/s', 'kilolitro/s', 'hectolitro/s', 'decalitro/s', 'litro/s', 'decilitro/s', 'centilitro/s', 'mililitro/s', 'unidad/es'])
        ];
    }
}
