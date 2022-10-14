<?php

namespace App\DataTables;

use App\Models\EmpresaNFSConfig;
use App\Models\Servico;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServicoDataTable extends DataTable
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
            ->editColumn('valor', function (Servico $servico) {
                return number_format($servico->valor, 2, ',', '.');
            })
            ->addColumn('empresa', function (Servico $servico) {
                return $servico->empresa->nome;
            })
            ->addColumn('integracoes', function (Servico $servico) {
                return $servico->integracoes->map(function ($integracao) {
                    return $integracao->driver;
                });
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Servico $servico
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Servico $servico)
    {
        $empresasID_array = auth()->user()->empresasIdsArray();
        
        return $servico->newQuery()->with('empresa')->whereIn('empresa_id', $empresasID_array);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('servico-table')
                    ->columns($this->getColumns())
                    ->language([
                        'url' => '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
                    ])
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('empresa', 'empresa.nome')->title('Empresa'),
            Column::make('nome')->title('Nome'),
            Column::make('valor')->title('Valor'),
            Column::make('integracoes', 'integracoes.driver')->title('Integrações'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Servico_' . date('YmdHis');
    }
}
