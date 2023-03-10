<?php

namespace Database\Factories;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
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
            "documento" => $this->faker->cnpj(false),
            "inscricao_estadual" => $this->faker->numberBetween(11111111,99999999),
            "inscricao_municipal"=> $this->faker->numberBetween(11111111,99999999),
            "tipo_logradouro" => $this->faker->randomElement(TipoLogradouro::tipos),
            "logradouro"=> $this->faker->streetName(),
            "numero" => $this->faker->buildingNumber(),
            "bairro" => $this->faker->cityPrefix(),
            "cep" => $this->faker->postcode(),
            "city_id" => 1565,
            "telefone_num" => $this->faker->phoneNumber(),
            "telefone_ddd" => $this->faker->areaCode(),
            "email" => $this->faker->email(),
            "regime_tributario" => $this->faker->randomElement(SpedRegimesTributarios::toArrayValores()),
            "regime_tributario_especial" => $this->faker->randomElement(SpedRegimesTributariosEspeciais::toArrayValores()),
        ];
    }
}
