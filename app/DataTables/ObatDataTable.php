<?php

namespace App\DataTables;

use App\Models\Obat;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ObatDataTable extends DataTable
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
        ->addColumn('status', function ($row) {
            $status = Status::where('id', $row->status_id)->first();

            return $status->nama;
        })
        ->rawColumns(['nama'])
        ->addColumn('action', function ($row) {
            return view('admin.pages.obat.component.action', compact('row'))->render();
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Obat $model): QueryBuilder
    {
        return $model->newQuery()->with('status');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('obat-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(8)
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
            ->title('Nama Obat'),
        Column::make('stok')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->title('Stok'),
        Column::make('stok_min')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->title('Stok Minimal'),
        Column::make('harga_jual')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->title('Harga Jual'),
        Column::make('harga_beli')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->title('Harga Beli'),
        Column::make('exp')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->title('Tanggal Expired'),
        Column::make('status')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->title('Status'),
        Column::make('created_at')
            ->addClass("text-sm font-weight-normal text-wrap")
            ->hidden()
            ->title('Dibuat'),
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
        return 'Obat_' . date('YmdHis');
    }
}
