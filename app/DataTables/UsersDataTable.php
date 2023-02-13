<?php

namespace App\DataTables;

use App\Models\User;
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
            ->addColumn('action', '
                <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></a>
                <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                <form action="#" method="POST" class="d-inline">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            ');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery('users')->where('role', 'user');
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
                Button::make('create')->attr(['class' => 'btn btn-primary'])->text('<i class="bi bi-person-plus-fill"></i>'),
                Button::make('export')->attr(['class' => 'btn btn-success dropdown-toggle'])->text('<i class="bi bi-file-earmark-spreadsheet-fill"></i>'),
                Button::make('print')->attr(['class' => 'btn btn-info'])->text('<i class="bi bi-printer-fill"></i>'),
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
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
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
