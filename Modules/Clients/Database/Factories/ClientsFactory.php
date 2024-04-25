<?php

namespace Modules\Clients\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Clients\App\Models\Clients::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "phone_number" => fake()->phoneNumber(),
            "company_name" => fake()->company(),
            "vat" => str_pad(rand(1, 5000), 5,  STR_PAD_LEFT),
            "address" => fake()->address(),
            "city" => fake()->city(),
            "zip" => fake()->postcode(),
        ];
    }
}

