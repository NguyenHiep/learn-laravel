<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class BaseTransformer extends TransformerAbstract
{
    protected function getStatusHtml($value)
    {
        return view('manage.blocks.partials.status', [
            'status' => $value
        ])->render();
    }

    protected function getActionsHtml($actions)
    {
        return view('manage.blocks.partials.actionTable', [
            'actions' => $actions
        ])->render();
    }
}
