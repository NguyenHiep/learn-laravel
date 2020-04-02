<?php

namespace App\DataTables;

use App\Transformers\PostCategoriesListTransformer;

class PostCategoriesDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new PostCategoriesListTransformer())->make(true);
    }
}