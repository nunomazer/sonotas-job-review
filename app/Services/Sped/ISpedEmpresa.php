<?php

namespace App\Services\Sped;

use App\Models\Cliente;
use App\Models\Empresa;

interface ISpedEmpresa
{

    public function __construct(Empresa $empresa);

    /**
     * Cadastra uma nova empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function cadastrar(): SpedApiReturn;

    /**
     * Alterar uma empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function alterar(): SpedApiReturn;

    /**
     * Atualiza os status de todas as notas que estejam em uma das situações intermediárias
     * (não finais como processado, finalizado, etc .. de acordo com o driver).
     *
     * Este método deve ser executado por processamento em batch de linha de comando
     * ou filas
     *
     * @return void
     */
    public function atualizarStatusDocsProcessamento();

    /**
     * Monta o array para enviar a cadastros ou envio da NF, de acordo com o driver correto
     *
     * @param Empresa $empresa
     * @return array
     */
    public function toArray() : array;
}
