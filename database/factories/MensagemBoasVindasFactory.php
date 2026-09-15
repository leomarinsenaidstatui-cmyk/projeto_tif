<?php

namespace Database\Factories;

use App\Models\MensagemBoasVindas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MensagemBoasVindas>
 */
class MensagemBoasVindasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'mensagem' => fake()->sentence(),
        ];
    }
}
