<?php

namespace App\Transformers;

use App\Entities\Slider;

class SlidersListTransformer extends BaseTransformer
{
    public function transform(Slider $slider)
    {
        $routeParams = ['id' => $slider->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.sliders.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.sliders.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'             => $slider->id,
            'slider_img'     => $this->getImages($slider->slider_img),
            'slider_title'   => $slider->slider_title,
            'slider_content' => $slider->slider_content,
            'slider_status'  => $this->getStatusHtml($slider->slider_status),
            'actions'        => $this->getActionsHtml($actions)
        ];
    }

    /***
     * get image slider
     *
     * @param $url
     * @return string
     */
    private function getImages($url)
    {

        $html = '';
        if (!empty($url)) {
            $html .= '<img src="' . asset(UPLOAD_SLIDER . $url) . '" draggable="false" alt="' . $url . '" class="img-thumbnail" width="60"/>';
        }
        return $html;
    }
}
