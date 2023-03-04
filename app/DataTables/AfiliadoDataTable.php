<?php

namespace App\DataTables;

use App\Models\Afiliado;
use App\Models\Cliente;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AfiliadoDataTable extends DataTable
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
            ->editColumn('nome', function (Afiliado $afiliado) {
                return '<a href="'. route('afiliados.edit', $afiliado) .'">
                            '. $afiliado->nome .'
                        </a>';
            })
            ->editColumn('telefone_num', function (Afiliado $afiliado) {
                return '('. $afiliado->telefone_ddd .') '. $afiliado->telefone_num;
            })
            ->editColumn('empresas', function (Afiliado $afiliado) {
                return $afiliado->empresas->count();
            })
            ->rawColumns(['nome','telefone_num']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Afiliado $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Afiliado $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('afiliado-table')
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
            Column::make('id')->title('ID'),
            Column::make('nome')->title('Nome'),
            Column::make('email')->title('E-mail'),
            Column::make('telefone_num')->title('Telefone'),
            Column::make('empresas')->title('Qtde Empresas'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Afiliado_' . date('YmdHis');
    }
}
