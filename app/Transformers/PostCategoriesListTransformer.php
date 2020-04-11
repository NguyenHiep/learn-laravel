<?php

namespace App\Transformers;

use App\Entities\PostCategory;

class PostCategoriesListTransformer extends BaseTransformer
{
    public function transform(PostCategory $postCategory)
    {
        $routeParams = ['id' => $postCategory->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.category.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.category.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'      => $postCategory->id,
            'name'    => $postCategory->name,
            'status'  => $this->getStatusHtml($postCategory->status),
            'actions' => $this->getActionsHtml($actions),
        ];
    }
}
