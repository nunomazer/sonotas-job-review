<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_auth_valida_campos_requeridos()
    {
        $response = $this->postJson('/api/auth');

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['email', 'password', 'device_name']);
    }

    public function test_auth_retorna_token()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'phpunit',
        ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(fn (AssertableJson $json) =>
                $json->hasAll(['access_token', 'token_type'])
            );

        $user->delete();
    }

    public function test_auth_retorna_credenciais_invalidas()
    {
        $response = $this->postJson('/api/auth', [
            'email' => 'qualquer@email.com',
            'password' => 'senha-errada',
            'device_name' => 'phpunit',
        ]);

        $response
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'error' => 'The provided credentials are incorrect.'
            ]);
    }
}
