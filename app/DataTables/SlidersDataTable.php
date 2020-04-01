<?php

namespace App\DataTables;

use App\Transformers\SlidersListTransformer;

class SlidersDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new SlidersListTransformer())->make(true);
    }
}