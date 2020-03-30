<?php

namespace App\DataTables;

use App\Transformers\PostsListTransformer;

class PostsDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new PostsListTransformer())->make(true);
    }
}