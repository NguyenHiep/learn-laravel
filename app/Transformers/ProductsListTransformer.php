<?php

namespace App\Transformers;

use App\Entities\Product;
use Carbon\Carbon;

class ProductsListTransformer extends BaseTransformer
{
    public function transform(Product $product)
    {
        $routeParams = ['id' => $product->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('products.edit', $routeParams),
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
                    'data-ajax-url' => route('products.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'         => $product->id,
            'name'       => $product->name,
            'sku'        => $product->sku,
            'price'      => number_format($product->price, 0, ',', '.'),
            'quantity'   => $product->quantity,
            'status'     => $this->getStatusHtml($product->status),
            'created_at' => Carbon::parse($product->created_at)->toDateTimeString(),
            'actions'    => $this->getActionsHtml($actions),
        ];
    }
}
