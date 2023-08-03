<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Pendaftaran;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PendaftaranDataTable extends DataTable
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
        ->addColumn('nama', function ($row) {
            $user = User::where('id', $row->user_id)->first();

            return $user->name;
        })
        ->rawColumns(['nama'])
        ->addColumn('tgl_kunjungan', function ($row) {
            return Carbon::parse($row->waktu_kunjungan)->format('d M Y');
        })
        ->rawColumns(['tgl_kunjungan'])
        ->addColumn('jam_kunjungan', function ($row) {
            return Carbon::parse($row->waktu_kunjungan)->format('H:i');
        })
        ->rawColumns(['jam_kunjungan'])
        ->addColumn('action', function ($row) {
            return view('admin.pages.pendaftaran.component.action', compact('row'))->render();
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pendaftaran $model): QueryBuilder
    {
        return $model->newQuery()
        ->with(['user', 'layanan', 'status']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pendaftaran-table')
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
                ->title('Nama Pasien'),
            Column::make('no_daftar')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('No Daftar'),
            Column::make('tgl_daftar')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tanggal Daftar'),
            Column::make('layanan.nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Layanan'),
            Column::make('tgl_kunjungan')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tanggal Kunjungan'),
            Column::make('jam_kunjungan')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Waktu Kunjungan'),
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
        return 'Pendaftaran_' . date('YmdHis');
    }
}
