<?php

namespace App\Transformers;

use App\Models\Cliente;
use League\Fractal\TransformerAbstract;

class ClienteTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param Cliente $cliente
     * @return array
     */
    public function transform(Cliente $cliente)
    {
        return [
            'id' => $cliente->id,
            'empresa_id' => $cliente->empresa_id,
            'documento' => $cliente->documento,
            'nome' => $cliente->nome,
            'alias' => $cliente->alias,
            'inscricao_estadual' => $cliente->inscricao_estadual,
            'inscricao_municipal' => $cliente->inscricao_municipal,
            'inscricao_suframa' => $cliente->inscricao_suframa,
            'orgao_publico' => $cliente->orgao_publico,
            'tipo_logradouro' => $cliente->tipo_logradouro,
            'logradouro' => $cliente->logradouro,
            'complemento' => $cliente->complemento,
            'numero' => $cliente->numero,
            'bairro' => $cliente->bairro,
            'cep' => $cliente->cep,
            'city_id' => $cliente->city_id,
            'telefone_num' => $cliente->telefone_num,
            'telefone_ddd' => $cliente->telefone_ddd,
            'email' => $cliente->email,
            'regime_tributario' => $cliente->regime_tributario
        ];
    }
}
