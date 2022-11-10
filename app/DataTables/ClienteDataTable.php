<?php

namespace App\DataTables;

use App\Models\Cliente;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClienteDataTable extends DataTable
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
            ->addColumn('empresa', function (Cliente $cliente) {
                return $cliente->empresa->nome;
            })
            ->editColumn('nome', function (Cliente $cliente) { 
                return '<a href="'. route('clientes.edit', $cliente) .'">
                            '. $cliente->nome .'
                        </a>';
            })
            ->editColumn('telefone_num', function (Cliente $cliente) {
                return '('. $cliente->telefone_ddd .') '. $cliente->telefone_num;
            })
            ->rawColumns(['nome','telefone']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cliente $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cliente $model)
    {
        return $model->newQuery()
            ->with('empresa')
            ->whereIn('empresa_id', auth()->user()->empresasIdsArray());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('cliente-table')
                    ->columns($this->getColumns())
                    ->language([
                        'url' => '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json' //alterar para local
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
            Column::make('telefone_num')->title('Telefone'),
            Column::make('email')->title('E-mail'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cliente_' . date('YmdHis');
    }
}
