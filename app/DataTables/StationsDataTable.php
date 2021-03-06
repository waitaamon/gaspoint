<?php

namespace App\DataTables;

use App\Repositories\Contracts\StationRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Yajra\DataTables\Services\DataTable;

class StationsDataTable extends DataTable
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
            ->addColumn('action', function ($model) {
                return '<a href="station/edit/' . $model->id . '" class="button is-small is-primary">Edit </a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param StationRepository $stations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StationRepository $stations)
    {
        return $stations->withCriteria(new EagerLoad(['user']))->all();
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
                    ->parameters($this->getBuilderParameters());
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
                'name' => 'user.name',
                'title' => 'Manager',
                'data' => 'user.name'
            ],
            [
                'name' => 'phone',
                'title' => 'Phone',
                'data' => 'phone'
            ],
            [
                'name' => 'created_at',
                'title' => 'Registered on',
                'data' => 'created_at'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Stations_' . date('YmdHis');
    }
}
