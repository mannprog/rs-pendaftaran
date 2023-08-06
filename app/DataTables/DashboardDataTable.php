<?php

namespace App\DataTables;

use App\Models\Dashboard;
use App\Models\Dokter;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DashboardDataTable extends DataTable
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
        ->addColumn('foto', function ($row) {
            return "<img src='admin/images/dokter/{$row->foto}' />";
        })
        ->rawColumns(['foto']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Dokter $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('layanan');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('dashboard-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->addColumnDef([
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
            Column::make('nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Nama Dokter'),
            Column::make('layanan.nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Spesialis'),
            Column::make('hari')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Hari'),
            Column::make('jam')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Jam'),
            Column::make('tarif')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tarif'),
            Column::make('foto')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Foto'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Dashboard_' . date('YmdHis');
    }
}
