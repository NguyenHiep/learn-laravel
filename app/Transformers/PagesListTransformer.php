<?php

namespace App\Transformers;

use App\Entities\Page;
use Carbon\Carbon;
use Storage;

class PagesListTransformer extends BaseTransformer
{
    public function transform(Page $page)
    {
        $routeParams = ['id' => $page->id];
        $actions = [
            'edit'   => [
                'label'      => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('pages.edit', $routeParams),
                ]
            ],
            'delete' => [
                'label'      => '<i class="fa fa-trash-o"></i>',
                'attributes' => [
                    'title'         => __('common.buttons.delete'),
                    'class'         => 'btn btn-default btn-delete',
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-type'     => 'DELETE',
                    'data-ajax-url' => route('pages.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'            => $page->id,
            'page_featured' => $this->getImages($page),
            'page_title'    => $page->page_title,
            'author'        => $page->author->username,
            'created_at'    => Carbon::parse($page->created_at)->format('Y-m-d H:i'),
            'page_status'   => $this->getStatusHtml($page->page_status),
            'actions'       => $this->getActionsHtml($actions)
        ];
    }

    /***
     * get image post media
     *
     * @param $page
     * @return string
     */
    private function getImages($page)
    {
        $html = '';
        $mediaName = $page->media->name ?? null;
        if (!empty($page->page_medias_id) && !empty($mediaName)) {
            $html .= '<img src="' . Storage::url(UPLOAD_MEDIAS . $mediaName) . '" draggable="false" alt="' . $mediaName . '" class="img-thumbnail" width="80" height="40"/>';
        }
        return $html;
    }

}
