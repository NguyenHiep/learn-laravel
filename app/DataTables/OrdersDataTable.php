<?php

namespace App\DataTables;

use App\Transformers\OrdersListTransformer;

class OrdersDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new OrdersListTransformer())->make(true);
    }
}