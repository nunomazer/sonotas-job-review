<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nome" => $this->faker->name(),
            "alias" => $this->faker->optional()->name(),
            "empresa_id" => $this->faker->randomElement(Empresa::select('id')->get()->pluck('id')),
            "documento" => $this->faker->cnpj(false),
            "inscricao_estadual" => $this->faker->numberBetween(11111111,99999999),
            "inscricao_municipal"=> $this->faker->numberBetween(11111111,99999999),
            "inscricao_suframa"=> $this->faker->optional()->numberBetween(11111111,99999999),
            "orgao_publico"=> $this->faker->boolean(10),
            "tipo_logradouro" => $this->faker->randomElement(TipoLogradouro::tipos),
            "logradouro"=> $this->faker->streetName(),
            "numero" => $this->faker->buildingNumber(),
            "complemento" => $this->faker->optional()->buildingNumber(),
            "bairro" => $this->faker->cityPrefix(),
            "cep" => $this->faker->postcode(),
            "city_id" => $this->faker->randomElement(Cidade::select('id')->inRandomOrder()->limit(50)->get()->pluck('id')),
            "telefone_num" => $this->faker->phone(),
            "telefone_ddd" => $this->faker->areaCode(),
            "email" => $this->faker->email(),
            "regime_tributario" => $this->faker->randomElement(SpedRegimesTributarios::toArrayValores()),
            "regime_tributario_especial" => $this->faker->randomElement(SpedRegimesTributariosEspeciais::toArrayValores()),
            "receber_notificacao_por_email" => $this->faker->boolean(),
        ];
    }

    public function empresa($id)
    {
        return $this->state(function ($attributes) use ($id) {
            return [
                'empresa_id' => $id,
            ];
        });
    }
}
