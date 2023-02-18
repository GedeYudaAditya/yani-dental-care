<?php

namespace App\DataTables;

use App\Models\MedicalRecord;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MedicalRecordDataTable extends DataTable
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
            )
            ->addColumn(
                'name',
                function ($query) {
                    return $query->patien->name;
                }
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MedicalRecord $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MedicalRecord $model)
    {
        return $model->with('patien')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('medicalrecorddatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create')->attr(['class' => 'btn btn-primary'])->text('<i class="bi bi-file-earmark-plus"></i>'),
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
            // Column::make('id'),
            Column::make('name'),
            Column::make('gol_darah'),
            Column::make('diagnosa'),
            Column::make('tindakan'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(140)
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
        return 'MedicalRecord_' . date('YmdHis');
    }
}
