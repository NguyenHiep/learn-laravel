<?php

namespace App\DataTables;

use App\Transformers\CustomersListTransformer;

class CustomersDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new CustomersListTransformer())->make(true);
    }
}