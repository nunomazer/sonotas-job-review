<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpresaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_config_nfse_criada_nova()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
