<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sliders extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slider_img',
        'slider_title',
        'slider_content',
        'slider_url',
        'slider_target',
        'slider_status',
        'user_id'
    ];

    public function getListSlider()
    {
        $sliders = Sliders::where('slider_status', STATUS_ENABLE)->get();
        if(!empty($sliders))
        {
            return $sliders;
        }
        return false;
    }
}
