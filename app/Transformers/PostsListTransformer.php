<?php

namespace App\Transformers;

use App\Entities\Post;
use Carbon\Carbon;
use Storage;

class PostsListTransformer extends BaseTransformer
{
    public function transform(Post $post)
    {
        $routeParams = ['id' => $post->id];
        $actions = [
            'edit'   => [
                'label' => '<i class="fa fa-edit"></i>',
                'attributes' => [
                    'title' => __('common.buttons.edit'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('manage.posts.edit', $routeParams),
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
                    'data-ajax-url' => route('manage.posts.destroy', $routeParams)
                ]
            ]
        ];
        return [
            'id'           => $post->id,
            'post_picture' => $this->getImages($post),
            'post_title'   => $post->post_title,
            'categories'   => $this->getCategories($post->posts_categories),
            'updated_at'   => Carbon::parse($post->updated_at)->format('Y-m-d H:i'),
            'visit'        => $post->visit,
            'post_status'  => $this->getStatusHtml($post->post_status),
            'actions'      => $this->getActionsHtml($actions)
        ];
    }

    /***
     * get image post
     *
     * @param $post
     * @return string
     */
    private function getImages($post)
    {
        $html = '';
        $mediaName = $post->media->name ?? null;
        if (!empty($post->posts_medias_id) && !empty($mediaName)) {
            $html .= '<img src="' . Storage::url($mediaName) . '" draggable="false" alt="' . $mediaName . '" class="img-thumbnail" />';
        }
        return $html;
    }

    /***
     *get post categories
     *
     * @param $categories
     * @return string
     */
    private function getCategories($categories)
    {
        $listCat = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                if (!empty($listCat)) {
                    $listCat .= ', ';
                }
                $listCat .= $category->name;
            }
        }
        return $listCat;
    }
}
