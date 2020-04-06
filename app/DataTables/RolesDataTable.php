<?php

namespace App\DataTables;

use App\Transformers\RolesListTransformer;

class RolesDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new RolesListTransformer())->make(true);
    }
}