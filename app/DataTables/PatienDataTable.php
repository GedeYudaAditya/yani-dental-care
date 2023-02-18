<?php

namespace App\DataTables;

use App\Models\Patien;
use Illuminate\Support\Facades\Date;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;

class PatienDataTable extends DataTable
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
            ->addColumn(
                'action',
                function ($query) {
                    return '
                    <a href="' . route('detail-pasien', $query->slug) . '" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></a>
                    <a href="' . route('edit-pasien', $query->slug) . '" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                    <form action="' . route('guest.pasien.destroy', $query->slug) . '" method="POST" class="d-inline" onsubmit="return confirm(\' Yakin ingin menghapus ' . $query->name . '? \')">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </form>
                    ';
                }
            );
        // ->addColumn(
        //     'created_at',
        //     function ($query) {
        //         return $query->created_at->format('j F Y');
        //     },
        // )
        // ->addColumn(
        //     'ttl',
        //     function ($query) {
        //         $date = $query->ttl;
        //         $date = Date::parse($date)->format('j F Y');
        //         return $date;
        //     }
        // );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Patien $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Patien $model)
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
            ->setTableId('patiendatatable-table')
            ->addTableClass('table table-striped table-hover')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('create')->attr(['class' => 'btn btn-primary'])->text('<i class="bi bi-person-plus-fill"></i>'),
                Button::make('excel')->attr(['class' => 'btn btn-outline-dark'])->text('<i class="bi bi-file-earmark-spreadsheet-fill"></i>'),
                Button::make('csv')->attr(['class' => 'btn btn-outline-dark'])->text('<i class="bi bi-filetype-csv"></i>'),
                Button::make('print')->attr(['class' => 'btn btn-outline-dark'])->text('<i class="bi bi-filetype-pdf"></i>'),
                Button::make('reset')->attr(['class' => 'btn btn-danger'])->text('<i class="bi bi-arrow-clockwise"></i>'),
                Button::make('reload')->attr(['class' => 'btn btn-warning'])->text('<i class="bi bi-arrow-repeat"></i>'),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')->title('Nama'),
            Column::make('ttl')->title('TTL'),
            Column::make('jenis_kelamin')->title('J.Kelamin'),
            Column::make('alamat_rumah')->title('Alt.Rumah'),
            Column::make('alamat_kantor')->title('Alt.Kantor')->hidden(),
            Column::make('pekerjaan')->title('Pekerjaan')->hidden(),
            Column::make('no_hp')->title('No.HP')->hidden(),
            Column::make('created_at')->title('Dibuat'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Patien_' . date('YmdHis');
    }
}
