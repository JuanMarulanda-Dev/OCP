<?php

namespace Database\Factories;

use App\Models\Content_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class Content_typeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content_type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->word
        ];
    }
}
