<?php

namespace App\Transformers;

use App\Entities\Category;

class CategoriesListTransformer extends BaseTransformer
{
    public function transform(Category $category)
    {
        $routeParams = ['id' => $category->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('categories.edit', $routeParams),
                ]
            ],
            'delete' => [
                'label' => '<i class="fa fa-trash-o"></i>',
                'attributes' => [
                    'title'         => __('common.buttons.delete'),
                    'class'         => 'btn btn-default btn-delete',
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-type'     => 'DELETE',
                    'data-ajax-url' => route('categories.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'      => $category->id,
            'name'    => $category->name,
            'status'  => $this->getStatusHtml($category->status),
            'actions' => $this->getActionsHtml($actions),
        ];
    }
}
