<?php

namespace Database\Seeders;

use App\Models\MensagemBoasVindas;
use Illuminate\Database\Seeder;

class MensagemBoasVindasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MensagemBoasVindas::firstOrCreate([
            'nome' => 'Visitante Exemplo',
            'mensagem' => 'Estou feliz por conhecer o projeto TIF!',
        ]);
    }
}
