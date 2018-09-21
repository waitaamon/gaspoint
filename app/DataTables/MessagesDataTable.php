<?php

namespace App\DataTables;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepository;
use Yajra\DataTables\Services\DataTable;

class MessagesDataTable extends DataTable
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
                return '<a href="message/show/' . $model->id . '" class="button is-small is-primary">Show Message </a>';
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param MessageRepository $messages
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MessageRepository $messages)
    {
        return $messages->all();
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
                'name' => 'created_at',
                'title' => 'Sent On',
                'data' => 'created_at'
            ],
            [
                'name' => 'message',
                'title' => 'Message',
                'data' => 'message'
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
        return 'Messages_' . date('YmdHis');
    }
}
