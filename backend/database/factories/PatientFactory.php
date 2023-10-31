<?php

namespace Database\Factories;

use App\Enums\Patient\GenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->name(),
            'cpf' => (fake()->cpf(false))*1000000,
            'rg' => (fake()->numberBetween(11111,99999))*1000000000000,
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(array_column(GenderEnum::cases(),'value')),
            'phone' => (fake()->numberBetween(11111,99999))*1000000,
            'description' => fake()->realText(),
        ];
    }
}
