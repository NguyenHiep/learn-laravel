<?php

namespace App\Transformers;

use App\Entities\Comment;
use Carbon\Carbon;

class CommentsListTransformer extends BaseTransformer
{
    public function transform(Comment $comment)
    {
        $routeParams = ['id' => $comment->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('comments.edit', $routeParams),
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
                    'data-ajax-url' => route('comments.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'             => $comment->id,
            'name'           => $comment->name,
            'email'          => $comment->email,
            'ip_user'        => $comment->ip_user,
            'created_at'     => Carbon::parse($comment->created_at)->format('Y-m-d H:i'),
            'comment_status' => $this->getStatusHtml($comment->comment_status),
            'actions'        => $this->getActionsHtml($actions)
        ];
    }

}
