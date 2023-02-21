<?php

namespace App\DataTables;

use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
                <a href="' . route('admin.edit-user', $query->id) . '" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                <form action="' . route('admin.delete-user.process', $query->id) . '" method="POST" class="d-inline" onsubmit="return confirm(\' Yakin ingin menghapus ' . $query->name . '? \')">
                    ' . csrf_field() . '
                    ' . method_field('delete') . '
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
                ';
                }
            )
            ->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('j F Y');
                return $formatedDate;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('users-table')
            ->addTableClass('table table-striped table-bordered table-hover')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
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
            // Column::make('id')->hidden(),
            Column::make('name'),
            Column::make('email'),
            Column::make('role'),
            Column::make('created_at'),
            Column::computed(
                'action',
                'Action'
            )
                ->exportable(false)
                ->printable(false)
                ->width(200)
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
        return 'Users_' . date('YmdHis');
    }
}
