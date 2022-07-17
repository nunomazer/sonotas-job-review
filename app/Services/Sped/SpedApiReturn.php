<?php

namespace App\Services\Sped;

class SpedApiReturn
{
    public $code;
    public $message;

    public bool $error = false;

    /**
     * Dados de retorno da api, para erros 400 (validação de dados) deve existir um campo 'fields' identificando o erro
     * de cada campo enviado com validação errada, no formato:<br/>
     * <pre>
     * "data": [
     *    "fields": [
     *       "nome-do-campo": "descrição do erro de validação"
     *    ]
     * ]
     * </pre>
     *
     * @var array $data
     */
    public array $data = [];

    /**
     * Protocolo de comunicação retornado pela API, para algumas operações
     * @var $protocol
     */
    public $protocol;

    /**
     * Array, de objetos gerados na api integradora do Sped. Cada objeto deve identificar o seu código (ou id), ou possuir
     * mais dados de acordo com a operação.
     * É necessário que garanta a identificação de retorno principalmente quando enviamos documentos discais em uma chamada
     * com lote de documentos.
     * O retorno deve identificar:
     * <ul>
     * <li><strong>idSoNotas</strong>: nosso id enviado para a api</li>
     * <li><strong>documento</strong>: CPF ou CNPJ do prestador</li>
     * <li><strong>idApi</strong>: id gerado pela api para identificação do objeto, que será gravado junto ao registro do documento fiscal para futuras consultas na api</li>
     * </ul>
     * @var array $objects
     */
    public $objects;
}
