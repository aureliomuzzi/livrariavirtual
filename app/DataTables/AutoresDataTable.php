<?php

namespace App\DataTables;

use App\Models\Autores;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AutoresDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('action', function($query) {
            return '<a href="' . route('autores.edit', $query) . '" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Editar Cadastro de Autores"><i class="fas fa-pen text-xs px-1"></i></a>
            <a onclick="confirmarExclusao(this)" href="javascript:void(0)" data-rota="' . route('autores.destroy', $query->id) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Excluir Registro de Autores"><i class="fas fa-trash text-xs px-1"></i></a>';
        })
        ->editColumn('firstName', function($query) {
            return $query->firstName;
        })
        ->editColumn('lastName', function($query) {
            return $query->lastName;
        })
        ->editColumn('created_at', function($query) {
            return $query->created_at->format("d/m/Y H:i");
        })
        ->editColumn('updated_at', function($query) {
            return $query->updated_at->format("d/m/Y H:i");
        })
        ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Autores $model)
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
                    ->setTableId('autor-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1, 'asc')
                    ->buttons(
                        Button::make('create')->text("<i class='fas fa-plus'></i> Novo Registro"),
                    )
                    ->parameters([
                        "language" => [
                            "url" => "/js/translate_pt-br.json"
                        ]
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('action')->title('Ações')->searchable(false)->orderable(false),
            Column::make('firstName')->title('Primeiro Nome'),
            Column::make('lastName')->title('Segundo Nome'),
            Column::make('created_at')->title('Cadastro')->addClass('text-center'),
            Column::make('updated_at')->title('Atualizado')->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Autores_' . date('YmdHis');
    }
}
