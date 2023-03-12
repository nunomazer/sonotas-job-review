<?php

namespace Tests\Feature\Api;

use App\Models\Empresa;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Services\EmpresaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EmpresaTest extends TestCase
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

    public function test_empresa_criada_nova()
    {
        $empresa = Empresa::factory()->make();

        Sanctum::actingAs($this->user);
        $response = $this->postJson('/api/empresas', $empresa->toArray());

        $response
            ->assertStatus(Response::HTTP_CREATED);


        $empresa = Empresa::where('documento', $empresa->documento)->first();
        UserEmpresa::where('empresa_id', $empresa->id)->delete();
        $empresa->delete();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_config_nfse_criada_nova()
    {
        $this->markAsRisky();
    }
}
