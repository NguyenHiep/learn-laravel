<?php

namespace App\Transformers;

use App\Entities\User;

class UsersListTransformer extends BaseTransformer
{
    public function transform(User $user)
    {
        $routeParams = ['id' => $user->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.admins.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.admins.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'       => $user->id,
            'username' => $user->username,
            'email'    => $user->email,
            'level'    => $this->getLevelHtml($user->level),
            'roles'    => $this->getRoleNameHtml($user->getRoleNames()),
            'status'   => $this->getStatusHtml($user->status),
            'actions'  => $this->getActionsHtml($actions)
        ];
    }

    /***
     * get level user
     *
     * @param $level
     * @return string
     */
    private function getLevelHtml($level)
    {
        $levelText = __('selector.levels.' . $level);
        if ($level === 1) {
            return '<span class="font-red-thunderbird bold">' . $levelText . '</span>';
        }
        if ($level === 2) {
            return '<span class="font-green-dark bold">' . $levelText . '</span>';
        }
        return $levelText;
    }

    /****
     * get role name
     *
     * @param $roles
     * @return string
     */
    private function getRoleNameHtml($roles)
    {
        $html = '';
        foreach ($roles as $role) {
            $html .= '<label class="badge badge-primary">' . $role . '</label>';
        }
        return $html;
    }
}
