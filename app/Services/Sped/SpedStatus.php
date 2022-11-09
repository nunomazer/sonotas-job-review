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
     * Documento fiscal emitido e finalizado (gerado) pela api
     */
    const CONCLUIDO = 'concluido';

    /**
     * Documento fiscal emitido e rejeitado pela api
     */
    const REJEITADO = 'rejeitado';

    /**
     * Documento fiscal emitido e denegado pela api
     */
    const DENEGADO = 'denegado';

    /**
     * Documento fiscal emitido e solicitação de cancelada finalizada na api
     */
    const CANCELADO = 'cancelado';
    
    /**
     * Documento fiscal pendente de cancelamento
     */
    const PROCESSO_CANCELAMENTO = 'solicitado cancelamento';
    
    /**
     * Erro no processo de envio e geração
     */
    const ERRO = 'erro';
}
