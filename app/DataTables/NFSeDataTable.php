<?php

namespace App\DataTables;

use App\Models\NFSe;
use App\Services\Sped\SpedStatus;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NFSeDataTable extends DataTable
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
            ->editColumn('id', function (NFSe $nfse) {
                return '<a href="'. route('notas-servico.show', $nfse) .'">
                            '. $nfse->id .'
                        </a>';
            })
            ->editColumn('emitido_em', function (NFSe $nfse) {
                return $nfse->emitido_em->format('d/m/Y H:i');
            })
            ->editColumn('status', function (NFSe $nfse) {
                return '<span class="badge badge-outline text-'. $nfse->status == SpedStatus::CONCLUIDO ? 'success' : ($nfse->status == SpedStatus::PROCESSAMENTO ? 'info' : 'warning') .'">
                            '. $nfse->status .'
                        </span>';
            })
            ->addColumn('empresa', function (NFSe $nfse) {
                return $nfse->venda->empresa->nome;
            })
            ->addColumn('cliente', function (NFSe $nfse) {
                return '<a href="'. route('clientes.edit', $nfse->venda->cliente) .'">
                            '. $nfse->venda->cliente->nome .'
                        </a>';
            })
            ->editColumn('data_transacao', function (NFSe $nfse) {
                return $nfse->venda->data_transacao->format('d/m/Y');
            })
            ->addColumn('itens_servico', function (NFSe $nfse) {
                return $nfse->itens_servico->map(function ($itens) {
                    return $itens->servico->nome;
                })->implode('<br>');
            })
            ->editColumn('', function (NFSe $nfse) {
                return number_format($nfse->valor, 2, ',', '.');
            })
            ->rawColumns(['id','status','cliente','itens_servico']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NFSe $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NFSe $model)
    {
        return $model->newQuery()
            ->with('venda')->whereHas('venda', function($q) {
                $q->whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray());
            });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('nfse-table')
                    ->columns($this->getColumns())
                    ->language([
                        'url' => '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json' //alterar para local
                    ])
                    ->minifiedAjax()
                    ->orderBy(1, 'desc');
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
            Column::make('emitido_em')->title('Data Emissão'),
            Column::make('status')->title('Status'),
            Column::make('empresa')->title('Prestador'),
            Column::make('cliente')->title('Tomador'),
            Column::make('data_transacao')->title('Data Venda'),
            Column::make('itens_servico')->title('Serviços'),
            Column::make('valor')->title('Valor'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'NFSe_' . date('YmdHis');
    }
}
