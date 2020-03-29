<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class BaseDataTable
{
    /***
     * @var $datatables
     */
    protected $datatables;

    public function __construct($collection)
    {
        $this->set($collection);
    }

    public function set($collection)
    {
        $this->datatables = Datatables::of($collection);
    }

    /***
     * get columns datatable
     *
     * @param array $displayFields
     * @return array
     */
    public static function getColumns(array $displayFields)
    {
        $dtColumns = [];
        if (count($displayFields) <= 0) {
            return $dtColumns;
        }
        $searchable = 'searchable';
        $oderable = 'orderable';
        foreach ($displayFields as $key => $column) {
            $dtColumns[] = [
                'data'      => $key,
                'name'      => $key,
                $searchable => $column[$searchable] ?? true,
                $oderable   => $column[$oderable] ?? true,
            ];
        }
        return $dtColumns;
    }
}
