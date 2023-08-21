<?php

namespace Database\Factories;

use App\Models\Cnae;
use App\Models\Empresa;
use App\Models\TipoLogradouro;
use App\Models\TipoServico;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaNFSConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "empresa_id" => $this->faker->randomElement(Empresa::select('id')->get()->pluck('id')),
            "cnae_codigo" => $this->faker->randomElement(Cnae::select('codigo')->get()->pluck('codigo')),
            "cofins" => $this->faker->randomFloat(2, 0, 15),
            "csll" => $this->faker->randomFloat(2, 0, 15),
            "inss" => $this->faker->randomFloat(2, 0, 15),
            "ir" => $this->faker->randomFloat(2, 0, 15),
            "pis" => $this->faker->randomFloat(2, 0, 15),
            "iss" => $this->faker->randomFloat(2, 0, 15),
            "iss_retido_fonte" => $this->faker->boolean(20),
            "tipo_servico_codigo" => $this->faker->randomElement(TipoServico::select('codigo')->get()->pluck('codigo')),
            "municipio_servico_codigo" => $this->faker->numberBetween(111111,999999),
            "municipio_servico_descricao" => $this->faker->text(),
            "natureza_operacao" => $this->faker->numerify('##.##'),
            "tributos" => $this->faker->randomFloat(2, 0, 15),
            "enviar_nota_email_cliente" => $this->faker->boolean(80),
            "ultimo_rps_liberado" => null,
            "prefeitura_usuario" => null,
            "prefeitura_senha" => null,
        ];
    }
}
