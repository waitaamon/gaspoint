<?php

namespace App\DataTables;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Yajra\DataTables\Services\DataTable;

class ManagersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('station', function ($model) {

                return $model->station ? $model->station->name : '';
            })
            ->addColumn('action', function ($model) {

                return '<a href="manager/edit/' . $model->id . '" class="button is-small is-primary">Edit </a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param UserRepository $users
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserRepository $users)
    {
        return $users->withCriteria(new EagerLoad(['station']))->managers();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'id',
                'title' => 'ID',
                'data' => 'id'
            ],
            [
                'name' => 'name',
                'title' => 'Name',
                'data' => 'name'
            ],
            [
                'name' => 'email',
                'title' => 'Email',
                'data' => 'email'
            ],
            [
                'name' => 'phone',
                'title' => 'Phone',
                'data' => 'phone'
            ],
            [
                'name' => 'station',
                'title' => 'Station',
                'data' => 'station'
            ],
            [
                'name' => 'created_at',
                'title' => 'Registered On',
                'data' => 'created_at'
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Managers_' . date('YmdHis');
    }
}
