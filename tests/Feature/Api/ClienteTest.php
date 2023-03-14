<?php

namespace Tests\Feature\Api;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\EmpresaNFSConfig;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Services\EmpresaService;
use Database\Factories\EmpresaNFSConfigFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ClienteTest extends TestCase
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

    public function test_cliente_criado_novo()
    {
        $empresa = Empresa::factory()->owner($this->user->id)->make();
        $empresa = (new EmpresaService())->create($empresa->toArray());

        $cliente = Cliente::factory()->empresa($empresa->id)->make();

        Sanctum::actingAs($this->user);
        $response = $this->postJson('/api/clientes', $cliente->toArray());

        // criou
        $response->assertStatus(Response::HTTP_CREATED);

        $empresa->clientes()->delete();
        $cliente->delete();
        EmpresaNFSConfig::where('empresa_id', $empresa->id)->delete();
        UserEmpresa::where('empresa_id', $empresa->id)->delete();
        $empresa->delete();
    }

}
