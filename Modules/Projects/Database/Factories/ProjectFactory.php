<?php

namespace Modules\Projects\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Clients\App\Models\Clients;
use Modules\Projects\App\Models\Projects;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Projects\App\Models\Projects::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "title"=>fake()->title(),
            "description" => fake()->sentence(),
            "deadline" => fake()->date("Y-m-d"),
            "user_id" => User::inRandomOrder()->first()->id,
            "client_id" => Clients::inRandomOrder()->first()->id,
            "status" => collect(Projects::STATUS_LIST)->random(),
        ];
    }
}

