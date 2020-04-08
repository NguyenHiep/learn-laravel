<?php

namespace App\Transformers;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class RolesListTransformer extends BaseTransformer
{
    public function transform(Role $role)
    {
        $routeParams = ['id' => $role->id];
        $actions = [
            'view'   => [
                'label' => '<i class="fa fa-eye"></i>',
                'attributes' => [
                    'title' => __('common.buttons.show'),
                    'class' => 'btn btn-primary',
                    'href'  => route('roles.show', $routeParams),
                ]
            ],
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('roles.edit', $routeParams),
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
                    'data-ajax-url' => route('roles.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'         => $role->id,
            'name'       => $role->name,
            'created_at' => Carbon::parse($role->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($role->updated_at)->toDateTimeString(),
            'actions'    => $this->getActionsHtml($actions)
        ];
    }

}
