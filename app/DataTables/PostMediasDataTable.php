<?php

namespace App\DataTables;

use App\Transformers\PostMediasListTransformer;

class PostMediasDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new PostMediasListTransformer())->make(true);
    }
}