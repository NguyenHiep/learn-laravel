<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\ProductsObserver;

class Products extends BaseModel
{
    use SoftDeletes;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'short_description',
        'category_id',
        'sku',
        'price',
        'sale_price',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'brand_id',
        'galary_img',
        'quantity'
    ];

    public static function boot() {
        parent::boot();
        Products::observe(new ProductsObserver());
    }
    public function setCategoryIdAttribute($value) {
        if (!empty($value) && is_array($value)) {
            $value = implode('|', $value);
        } else {
            $value = '';
        }
        $this->attributes['category_id'] = $value;
    }
}
