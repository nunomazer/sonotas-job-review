<?php

namespace Tests\Feature\Api;

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

    public function test_config_nfse_criada_nova()
    {
        $empresa = Empresa::factory()->make();
        $empresa->owner_user_id = $this->user->id;
        $empresa = (new EmpresaService())->create($empresa->toArray());

        $configNfse = EmpresaNFSConfig::factory()->make();
        $configNfse->empresa_id = $empresa->id;

        Sanctum::actingAs($this->user);
        $response = $this->putJson('/api/empresas/'.$empresa->id.'/configuracao-nfse', $configNfse->toArray());

        // criou
        $response->assertStatus(Response::HTTP_OK);

        EmpresaNFSConfig::where('empresa_id', $empresa->id)->delete();
        UserEmpresa::where('empresa_id', $empresa->id)->delete();
        $empresa->delete();
    }

    public function test_config_nfse_atualiza_sem_duplicar()
    {
        $empresa = Empresa::factory()->make();
        $empresa->owner_user_id = $this->user->id;
        $empresa = (new EmpresaService())->create($empresa->toArray());

        $configNfse = EmpresaNFSConfig::factory()->make();
        $configNfse->empresa_id = $empresa->id;
        $configNfse->save();

        $configNfse->cofins = 99.17;

        Sanctum::actingAs($this->user);
        $response = $this->putJson('/api/empresas/'.$empresa->id.'/configuracao-nfse', $configNfse->toArray());

        // atualizou
        $response->assertStatus(Response::HTTP_OK);

        $this->assertEquals(1, UserEmpresa::where('empresa_id', $empresa->id)->count());

        EmpresaNFSConfig::where('empresa_id', $empresa->id)->delete();
        UserEmpresa::where('empresa_id', $empresa->id)->delete();
        $empresa->delete();
    }
}
