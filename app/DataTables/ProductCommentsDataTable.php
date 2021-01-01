<?php

namespace App\DataTables;

use App\Transformers\ProductCommentsListTransformer;

class ProductCommentsDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new ProductCommentsListTransformer())->make(true);
    }
}