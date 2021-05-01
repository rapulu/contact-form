<?php

namespace Database\Factories;

use App\Models\ContactForm;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'message' => $this->faker->realText(),
            'file' => $this->faker->imageUrl(),
        ];
    }
}
