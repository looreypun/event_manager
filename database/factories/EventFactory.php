<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'img_url' => $this->faker->imageUrl(),
            'hold_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'premium_ticket_price' => $this->faker->randomFloat(2, 10, 100),
            'normal_ticket_price' => $this->faker->randomFloat(2, 5, 50),
            'venue' => $this->faker->address,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
