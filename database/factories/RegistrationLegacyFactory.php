<?php

namespace Database\Factories;

use App\Models\RegistrationLegacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationLegacyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RegistrationLegacy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event' => $this->faker->text(10),
            'participant_name' => $this->faker->name,
            'participant_email' => $this->faker->email,
            'comment' => $this->faker->text(86),
            'virtual_flag' => $this->faker->boolean
        ];
    }
}
