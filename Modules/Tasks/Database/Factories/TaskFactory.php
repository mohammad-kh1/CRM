<?php

namespace Modules\Tasks\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Clients\App\Models\Clients;
use Modules\Projects\App\Models\Projects;
use Modules\Tasks\App\Models\Tasks;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Tasks\App\Models\Tasks::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "title" => fake()->name(),
            "description" => fake()->sentence(1000),
            "deadline" => fake()->date("Y-m-d"),
            "user_id" => User::inRandomOrder()->first()->id,
            "client_id" => Clients::inRandomOrder()->first()->id,
            "project_id" => Projects::inRandomOrder()->first()->id,
            "status" => collect(Tasks::STATUS_LIST)->random(),
        ];
    }
}

