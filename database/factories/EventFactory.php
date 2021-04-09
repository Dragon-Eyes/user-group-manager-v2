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
            'date' => $this->faker->dateTimeBetween('-2 months', '+1 year')->format('Y-m-d'),
            'title' => $this->faker->text(35),
            'description' => $this->faker->text(250),
            'is_online' => rand(0, 1),
            'is_registration_open' => rand(0, 1)
        ];
    }
}
