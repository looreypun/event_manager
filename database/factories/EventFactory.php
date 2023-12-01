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
            'user_id' =>$this->faker->numberBetween(1, 3),
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph(3),
            'main_img_url' => 'https://random.imagecdn.app/300/200',
            'sub_img_url_one' => 'https://random.imagecdn.app/300/200',
            'sub_img_url_two' => 'https://random.imagecdn.app/300/200',
            'sub_img_url_three' => 'https://random.imagecdn.app/300/200',
            'sub_img_url_four' => 'https://random.imagecdn.app/300/200',
            'hold_date' => $this->faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d H:i:s'),
            'premium_ticket_price' => $this->faker->randomFloat(2, 10, 100),
            'normal_ticket_price' => $this->faker->randomFloat(2, 5, 50),
            'venue' => $this->faker->address
        ];
    }
}
