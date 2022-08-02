<?php

namespace App\Services\Sped;

/**
 * FLuxo de status dos documentos fiscais
 */
class SpedStatus
{
    /**
     * Pendente em nossa plataforma, foi salvo o registro em banco de dados mas ainda não foi enviado para api
     * de documentos fiscais
     */
    const PENDENTE = 'pendente';

    /**
     * Documento enviado para a api, em geral este status indica um provável problema de não finalização no envio,
     * o que pode ter nem finalizado em um erro identificado
     */
    const ENVIADO = 'enviado';

    /**
     * Documento enviado para api e está em processamento, se não for identificado por webhook deverá ser consultado quanto
     * a finalização de seu processamento
     */
    const PROCESSAMENTO = 'processamento';

    /**
     * Documento fiscal emitido (gerado) pela api
     */
    const GERADO = 'gerado';

    /**
     * Erro no processo de envio e geração
     */
    const ERRO = 'erro';
}
