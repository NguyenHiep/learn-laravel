<?php

namespace App\Transformers;

use App\Entities\PostTags;

class PostTagsListTransformer extends BaseTransformer
{
    public function transform(PostTags $postTags)
    {
        $routeParams = ['id' => $postTags->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.tags.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.tags.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'      => $postTags->id,
            'name'    => $postTags->name,
            'status'  => $this->getStatusHtml($postTags->status),
            'actions' => $this->getActionsHtml($actions),
        ];
    }
}
