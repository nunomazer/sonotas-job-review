<?php

namespace App\Services\Sped;

use App\Models\Empresa;
use App\Models\NFSe;

interface ISpedNFSe
{
    public function __construct(NFSe $nfse);
    public function toArray() : array;

    /**
     * Emite no driver correto o documento fiscal de NFSe
     * @return SpedApiReturn
     */
    public function emitir() : SpedApiReturn;

    /**
     * Consulta a NFSe no driver, de acordo com o driver_id ou protocolo.
     * O objeto da nfse já foi informado na construção desta classe.
     *
     * @return mixed
     */
    public function consultar();

    /**
     * Faz o download do PDF da NFSe no driver, de acordo com o driver_id ou protocolo.
     * O objeto da nfse já foi informado na construção desta classe.
     *
     * @return mixed
     */
    public function downloadPdf();

    /**
     * Faz o download do XML da NFSe no driver, de acordo com o driver_id ou protocolo.
     * O objeto da nfse já foi informado na construção desta classe.
     *
     * @return mixed
     */
    public function downloadXml();


    /**
     * Realiza cancelamento no driver correto o documento fiscal de NFSe
     * @return SpedApiReturn
     */
    public function cancelar() : SpedApiReturn;

    /**
     * Realiza a atualização de status no driver correto o documento fiscal de NFSe
     * @return SpedApiReturn
     */
    public function consultarStatusCancelamento() : SpedApiReturn;

}
