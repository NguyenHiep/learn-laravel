<?php

namespace App\DataTables;

use App\Transformers\ProductsListTransformer;

class ProductsDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new ProductsListTransformer())->make(true);
    }
}