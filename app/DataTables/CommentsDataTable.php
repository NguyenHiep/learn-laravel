<?php

namespace App\DataTables;

use App\Transformers\CommentsListTransformer;

class CommentsDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new CommentsListTransformer())->make(true);
    }
}