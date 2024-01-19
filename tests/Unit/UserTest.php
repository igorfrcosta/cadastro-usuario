<?php

namespace tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Teste do Cadastro de Usuário - Sucesso.
     * @test
     */
    public function user_store_success(): void
    {
        $response = $this->postJson('/api/salvar', [
                        'nome' => 'Igor Fabricio Ramos Costa',
                        'email' => 'igorfabriciorcosta@gmail.com',
                        'senha' => '123456',
                        'confirmacao_senha' => '123456'
                        ]);

        $response->assertStatus(200);
    }

    /**
     * Teste do Cadastro de Usuário - Não Processado.
     * @test
     */
    public function user_store_unprocessable(): void
    {
        $response = $this->postJson('/api/salvar', [
                        'nome' => 'Igor Fabricio Ramos Costa',
                        'email' => 'igorfabriciorcosta@gmail.com',
                        'senha' => '123456',
                        'confirmacao_senha' => '12345'
                        ]);

        $response->assertStatus(422);
    }
}
