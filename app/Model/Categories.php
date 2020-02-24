<?php

namespace App\Model;

class Categories extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_id',
        'image',
        'description',
        'status'
    ];


    public function getCategoryBySlug(string $slug)
    {
        if (!empty($slug)) {
            $category = Categories::where('slug', $slug)
                ->where('status', '=', config('define.STATUS_ENABLE'))
                ->first();
            return $category;
        }
        return false;

    }

    public function getListCategory()
    {
        $categories = Categories::where('status', config('define.STATUS_ENABLE'))->get();
        if(!empty($categories)){
            return $categories;
        }
        return false;
    }

}
