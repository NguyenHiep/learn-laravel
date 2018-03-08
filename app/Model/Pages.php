<?php

namespace App\Model;

class Pages extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_title',
        'page_slug',
        'page_intro',
        'page_full',
        'page_medias_id',
        'page_status',
        'page_attribute',
        'page_keyword',
        'visit',
        'user_id',
    ];

    public function getPageBySlug(string $page_slug)
    {
        $page = Pages::where('page_slug',$page_slug)->where('page_status', STATUS_ENABLE)->first();
        if(!empty($page))
        {
            return $page;
        }
        return $page;
    }

}
