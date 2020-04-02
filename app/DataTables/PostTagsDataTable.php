<?php

namespace App\DataTables;

use App\Transformers\PostTagsListTransformer;

class PostTagsDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new PostTagsListTransformer())->make(true);
    }
}