<?php

namespace App\Services\Sped;

use App\Models\Certificado;
use App\Models\Empresa;

interface ISpedEmpresa
{

    public function __construct(Empresa $empresa);

    /**
     * Cadastra uma nova empresa (Nosso cliente) no sistema emissor.
     *
     * @return SpedApiReturn
     */
    public function cadastrar(): SpedApiReturn;

    /**
     * Alterar uma empresa (Nosso cliente) no sistema emissor.
     *
     * @return SpedApiReturn
     */
    public function alterar(): SpedApiReturn;

    /**
     * Cadastra umnovo certificado na empresa (Nosso cliente) no sistema emissor.
     *
     * @param Certificado $certificado
     * @return SpedApiReturn
     */
    public function cadastrarCertificado(Certificado $certificado): SpedApiReturn;

    /**
     * Associar no driver certificado relacionado em nosso banco de dados com a empresa.
     * Se o certificado já foi feito upload, existe uma associação em nosso banco, e o id do driver no certificado
     * em nosso registro, esta rotina garante que este certificado está associado à empresa no driver de emissão
     * da NFSe
     *
     * @param Certificado $certificado
     * @return SpedApiReturn
     */
    public function associarCertificado(): SpedApiReturn;

    /**
     * Pesquisa no serviço SPED de NFSe os metadados da cidade que a empresa está registrada,
     * e retorna o objeto populado, se é necessário
     * certificado, senha, login, multiserviços entre outros
     *
     * @param Empresa $empresa
     * @return SpedApiReturn
     */
    public function metadadosCidade() : SpedApiReturn;

    /**
     * Monta o array para enviar a cadastros ou envio da NF, de acordo com o driver correto
     *
     * @param Empresa $empresa
     * @return array
     */
    public function toArray() : array;
}
