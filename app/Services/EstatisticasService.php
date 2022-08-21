<?php

namespace App\Services;

use App\Models\Servico;
use App\Models\User;
use App\Models\Venda;
use App\Services\Sped\SpedService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EstatisticasService
{
    const EMPRESAS_TOTAL_QTDE = 'empresas_total_qtde';
    const EMPRESAS_ATIVAS_QTDE = 'empresas_ativas_qtde';
    const SERVICOS_TOTAL_QTDE = 'servicos_total_qtde';
    const SERVICOS_ATIVOS_QTDE = 'servicos_ativos_qtde';
    const SERVICOS_MAIS_VENDIDOS_SERIE = 'servicos_mais_vendidos_serie';
    const VENDAS_MES_QTDE = 'vendas_mes_qtde';
    const VENDAS_MES_VALOR = 'vendas_mes_valor';

    private array $estatisticas = [
        self::EMPRESAS_ATIVAS_QTDE => null,
        self::EMPRESAS_TOTAL_QTDE => null,
        self::SERVICOS_TOTAL_QTDE => null,
        self::SERVICOS_ATIVOS_QTDE => null,
        self::SERVICOS_MAIS_VENDIDOS_SERIE => null,
        self::VENDAS_MES_QTDE => null,
        self::VENDAS_MES_VALOR => null,
    ];

    private User $user;
    private Carbon $data_inicial;
    private Carbon $data_final;

    public function __construct(User $user, Carbon $data_inicial, Carbon $data_final)
    {
        $this->user = $user;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
    }

    public function getCacheKey() : string
    {
        return 'estatisticas_user_'.$this->user->id;
    }

    public function clearCache() : void
    {
        Cache::forget($this->getCacheKey());
    }

    public function calcularEstatisticas(bool $clearCache = false) : array
    {
        if ($clearCache) $this->clearCache();

        $this->estatisticas = Cache::remember($this->getCacheKey(), 60*120, function () {
            return [
                self::EMPRESAS_ATIVAS_QTDE => $this->calcularEmpresasAtivas(),
                self::EMPRESAS_TOTAL_QTDE => $this->calcularEmpresasTotal(),
                self::SERVICOS_ATIVOS_QTDE => $this->calcularServicosAtivos(),
                self::SERVICOS_TOTAL_QTDE => $this->calcularServicosTotal(),
                self::SERVICOS_MAIS_VENDIDOS_SERIE => $this->calcularServicosMaisVendidosSerie(),
                self::VENDAS_MES_QTDE => $this->calcularVendasMesQtde(),
                self::VENDAS_MES_VALOR => $this->calcularVendasMesValor(),
            ];
        });

        return $this->estatisticas;
    }

    private function calcularEmpresasAtivas()
    {
        return $this->user->empresas->where('ativo', true)->count();
    }

    private function calcularEmpresasTotal()
    {
        return $this->user->empresas->count();
    }

    private function calcularServicosAtivos()
    {
        return Servico::isAtivo()
                        ->whereIn('empresa_id', $this->user->empresasIdsArray())
                        ->count();
    }

    private function calcularServicosTotal()
    {
        return Servico::whereIn('empresa_id', $this->user->empresasIdsArray())->count();
    }

    private function calcularVendasMesQtde()
    {
        return Venda::whereIn('empresa_id', $this->user->empresasIdsArray())
            ->whereBetween('data_transacao',[$this->data_inicial, $this->data_final])
            ->count();
    }

    private function calcularVendasMesValor()
    {
        return Venda::whereIn('empresa_id', $this->user->empresasIdsArray())
            ->whereBetween('data_transacao',[$this->data_inicial, $this->data_final])
            ->sum('valor');
    }

    private function calcularServicosMaisVendidosSerie()
    {
        return DB::table('servicos')
            ->select('servicos.id', 'servicos.nome', DB::raw("to_char(v.data_transacao, 'YYYY-MM') as data_transacao"),
                DB::raw('SUM(venda_item.qtde) as qtde'), DB::raw('SUM(venda_item.qtde * venda_item.valor) as valor'),
                DB::raw("array_to_json(array(
                                    select coalesce(sum(vis.valor), 0) as v
                                    from
                                        (
                                            SELECT dt
                                            FROM generate_series(".$this->data_inicial->format('d').", ".$this->data_final->format('d').") dt
                                        ) d
                                        left join vendas vs on date_part('day', vs.data_transacao) = d.dt
                                        left join venda_item vis on vis.venda_id = vs.id
                                    where vis.item_id = servicos.id OR vis.item_id isnull
                                    group by
                                        d.dt
                                )) as serie")
            )
            ->join('venda_item', 'venda_item.item_id', '=', 'servicos.id')
            ->join(DB::raw('vendas v'), 'v.id', '=', 'venda_item.venda_id')
            ->where('venda_item.tipo_documento', SpedService::DOCTYPE_NFSE)
            ->whereBetween('v.data_transacao', [$this->data_inicial, $this->data_final])
            ->groupBy('servicos.nome', 'servicos.id', DB::raw("to_char(v.data_transacao, 'YYYY-MM')"))
            ->limit(10)
            ->get();
    }

    public function getEmpresasAtivas(User $user) : int
    {
        return $this->estatisticas[self::EMPRESAS_ATIVAS_QTDE];
    }

    public function toArray()
    {
        return $this->estatisticas;
    }
}
