<?php

namespace Database\Factories;

use App\Models\SubImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => $this->faker->numberBetween(1, 20),
            'img_url' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
