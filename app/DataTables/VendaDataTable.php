<?php

namespace App\DataTables;

use App\Models\Venda;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('id', function (Venda $venda) {
                if ($venda->documento_fiscal) {
                    return $venda->id;
                } else {
                    return '<a href="'. route('vendas.edit', $venda->id) .'">'. $venda->id .'</a>';
                }
            })
            ->addColumn('empresa', function (Venda $venda) {
                return $venda->empresa->nome;
            })
            ->addColumn('cliente', function (Venda $venda) {
                return $venda->cliente->nome;
            })
            ->editColumn('data_transacao', function (Venda $venda) {
                return $venda->data_transacao->format('d/m/Y H:i');
            })
            ->addColumn('documento_fiscal', function (Venda $venda) {
                if ($venda->documento_fiscal) {
                    return '<span class="badge badge-outline text-success">
                        <a href="'. route('notas-servico.show', $venda->documento_fiscal->id) .'"
                            data-bs-toogle="tooltip" title="NF '. $venda->documento_fiscal->id .' emitida em '. $venda->documento_fiscal->emitido_em->format('d/m/Y - H:i:s') .'">
                            # '. $venda->documento_fiscal->id .'
                        </a>
                    </span>';
                } else {
                    if (isset($venda->data_emissao_planejada)) {
                        '<span class="badge badge-outline text-secondary" data-bs-toogle="tooltip" title="Emissão NF planejada">
                            '. $venda->data_emissao_planejada->format('d/m/Y H:i') .'
                        </span>';
                    } else {
                        '<small class="text-muted">
                            não planejada
                        </small>';
                    } 
                }
            })
            ->addColumn('itens', function (Venda $venda) {
                return $venda->itens->map(function ($itens) {
                    return $itens->servico->nome;
                })->implode('<br>');
            })
            ->editColumn('valor', function (Venda $venda) {
                return number_format($venda->valor, 2, ',', '.');
            })
            ->addColumn('action', function (Venda $venda) {
                if ($venda->documento_fiscal == false) {
                    return '<form method="POST" action="'. route('vendas.nf.emitir', $venda) .'">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm">
                                    Emitir NF
                                </button>
                            </form>';
                }
            })
            ->rawColumns(['id','documento_fiscal','itens','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Venda $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Venda $model)
    {
        return $model->newQuery()
            ->with('empresa','cliente','itens')
            ->whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('venda-table')
                    ->columns($this->getColumns())
                    ->language([
                        'url' => '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json' //alterar para local
                    ])
                    ->minifiedAjax()
                    ->orderBy(3, 'desc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('#'),
            Column::make('empresa')->title('Empresa'),
            Column::make('cliente')->title('Cliente'),
            Column::make('data_transacao')->title('Data Transação'),
            Column::make('documento_fiscal')->title('NF'),
            Column::make('itens')->title('Serviços/Produtos'),
            Column::make('valor')->title('Valor')->addClass('text-end'),
            Column::make('driver')->title('Integração'),
            Column::make('action')->title(''),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Venda_' . date('YmdHis');
    }
}
