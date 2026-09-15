<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class MensagemBoasVindasControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_pagina_de_boas_vindas_e_exibida(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertViewIs('welcome')
            ->assertSee('Bem-vindo ao TIF');
    }

    public function test_dados_validos_criam_mensagem_e_retornam_201(): void
    {
        $dados = [
            'nome' => 'Maria Silva',
            'mensagem' => 'Gostei muito de conhecer o projeto.',
        ];

        $response = $this->postJson('/api/mensagens-boas-vindas', $dados);

        $response
            ->assertCreated()
            ->assertJsonPath('erro', 'n')
            ->assertJsonPath('mensagem', 'Mensagem cadastrada com sucesso.')
            ->assertJsonPath('dados.nome', 'Maria Silva');

        $this->assertDatabaseHas('mensagem_boas_vindas', $dados);
    }

    public function test_retorna_422_e_nao_insere_quando_dados_estao_vazios(): void
    {
        $response = $this->postJson('/api/mensagens-boas-vindas');

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nome', 'mensagem'])
            ->assertJsonPath('errors.nome.0', 'Informe seu nome.')
            ->assertJsonPath('errors.mensagem.0', 'Escreva uma mensagem.');

        $this->assertDatabaseCount('mensagem_boas_vindas', 0);
    }
}
