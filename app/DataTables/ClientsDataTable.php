<?php

namespace App\DataTables;

use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\User;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
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
                return '<a href="client/edit/' . $model->id . '" class="button is-small is-primary">Edit </a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param ClientRepository $clients
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ClientRepository $clients)
    {
        return $clients->withCriteria(new EagerLoad(['station']))->all();
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
                'name' => 'station.name',
                'title' => 'Station',
                'data' => 'station.name'
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
        return 'Clients_' . date('YmdHis');
    }
}
