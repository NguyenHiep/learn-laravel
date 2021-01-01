<?php

namespace App\Transformers;

use App\Entities\ProductComment;
use Carbon\Carbon;

class ProductCommentsListTransformer extends BaseTransformer
{
    public function transform(ProductComment $comment)
    {
        $routeParams = ['id' => $comment->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.products.comments.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.products.comments.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'           => $comment->id,
            'name'         => $comment->name,
            'product_name' => $this->getProductDetailHtml($comment),
            'rate'         => $comment->rate,
            'status'       => $this->getStatusHtml($comment->status),
            'ip_user'      => $comment->ip_user,
            'created_at'   => Carbon::parse($comment->created_at)->format('Y-m-d H:i'),
            'actions'      => $this->getActionsHtml($actions)
        ];
    }

    protected function getProductDetailHtml($comment)
    {
        if (!empty($comment->product) && !empty($comment->product->id)) {
            $html = '<a href="{url_link}" target="_blank">{product_name}</a>';
            $html = str_replace('{url_link}', route('product.show', $comment->product->slug), $html);
            $html = str_replace('{product_name}', $comment->product->name, $html);
            return $html;
        }
        return '-'; // Blank data
    }

}
