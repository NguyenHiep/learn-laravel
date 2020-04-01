<?php

namespace App\Transformers;

use App\Entities\PostMedia;
use Carbon\Carbon;
use Storage;

class PostMediasListTransformer extends BaseTransformer
{
    public function transform(PostMedia $postMedia)
    {
        $routeParams = ['id' => $postMedia->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('medias.edit', $routeParams),
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
                    'data-ajax-url' => route('medias.destroy', $routeParams)
                ]
            ]
        ];

        return [
            'id'         => $postMedia->id,
            'name'       => $this->getImages($postMedia),
            'username'   => $postMedia->users->username,
            'attachment' => '',
            'created_at' => Carbon::parse($postMedia->created_at)->format('d/m/Y H:i'),
            'actions'    => $this->getActionsHtml($actions)
        ];
    }

    /***
     * get image post media
     *
     * @param $postMedia
     * @return string
     */
    private function getImages($postMedia)
    {
        $html = '';
        if (!empty($postMedia->name)) {
            $html .= '<img src="' . Storage::url(UPLOAD_MEDIAS . $postMedia->name) . '" draggable="false" alt="' . $postMedia->posts_medias_info->alt . '" class="img-thumbnail" width="60"/>';
        }
        return $html;
    }
}
