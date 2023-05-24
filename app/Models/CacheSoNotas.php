<?php

namespace App\Models;

/**
 * Controle centralizado para estratégias de cache, constantes com os nomes de índices
 */
class CacheSoNotas
{
    /**
     * Constante acessada apenas por método pois será composta com o usuário logado
     */
    private const IDX_INTEGRACOES_USUARIO_STATUS = 'integracao_status';
    private const TTL_INTEGRACOES_USUARIO_STATUS = 2592000;

    public function idxIntegracoesUsuarioStatus(User $user = null) : ?string
    {
        if ($user == null) {
            $user = auth()->user();
        }

        return $user ? self::IDX_INTEGRACOES_USUARIO_STATUS . '_' . $user->id : null;
    }

    /**
     * Retorna o tempo padrão em segundos para armazenar este índice
     *
     * @return string
     */
    public function ttlIntegracoesUsuarioStatus() : int
    {
        return self::TTL_INTEGRACOES_USUARIO_STATUS;
    }
}
