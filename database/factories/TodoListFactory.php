<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraphs(5, true),
            'status' => $this->faker->randomElement(['open' ,'in_progress', 'done']),
            'priority' => $this->faker->randomElement(['low' ,'medium', 'high']),
            'created_at' => $this->faker->dateTimeBetween('-3 months')
        ];
    }
    
}
