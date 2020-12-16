<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'first_date' =>  $this->faker->date,
            'last_date' =>  $this->faker->date,
            'project_type_id' => \App\Models\ProjectType::first()->id,
            'project_status_id' => \App\Models\ProjectStatus::first()->id,
            'progress' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text(rand(50,400))
        ];
    }
}
