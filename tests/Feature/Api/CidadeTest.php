<?php

namespace Tests\Feature\Api;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\EmpresaNFSConfig;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Services\EmpresaService;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CidadeTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    protected function tearDown(): void
    {
        $this->user->delete();
    }

    public function test_lista_cidades()
    {
        Sanctum::actingAs($this->user);
        $response = $this->getJson('/api/cidades?page=3');

        $response->assertStatus(Response::HTTP_OK);

    }

}
