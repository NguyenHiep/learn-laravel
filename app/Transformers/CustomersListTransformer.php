<?php

namespace App\Transformers;

use App\Entities\Customer;
use Carbon\Carbon;

class CustomersListTransformer extends BaseTransformer
{
    public function transform(Customer $customer)
    {
        $routeParams = ['id' => $customer->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.customers.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.customers.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'         => $customer->id,
            'username'   => $customer->username,
            'email'      => $customer->email,
            'last_login' => Carbon::parse($customer->last_login)->diffForHumans(),
            'status'     => $this->getStatusHtml($customer->status),
            'actions'    => $this->getActionsHtml($actions)
        ];
    }

}
