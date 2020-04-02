<?php

namespace App\DataTables;

use App\Transformers\PagesListTransformer;

class PagesDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new PagesListTransformer())->make(true);
    }
}