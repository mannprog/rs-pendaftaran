<?php

namespace App\DataTables;

use App\Models\Tindakan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TindakanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('admin.pages.tindakan.component.action', compact('row'))->render();
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Tindakan $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('status');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('tindakan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1) ->addColumnDef([
                        'responsivePriority' => 1,
                        'targets' => 1,
                    ])
                    ->orderBy(1, 'asc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                ->searchable(false)
                ->orderable(false)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
            Column::make('id')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Kode Tindakan'),
            Column::make('nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Nama Tindakan'),
            Column::make('tarif')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tarif'),
            Column::make('status.nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Tindakan_' . date('YmdHis');
    }
}
