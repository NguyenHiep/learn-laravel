<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Setting.
 *
 * @package namespace App\Entities;
 */
class Setting extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'website_info';

    protected $casts = [
        'params' => 'array'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'company_zip',
        'company_address',
        'company_tel',
        'company_fax',
        'company_copyright',
        'subtitle',
        'company_lat',
        'company_lng',
        'i18n_flg',
        'email1',
        'email1_name',
        'about_privacy',
        'about_terms',
        'mail_smtp_host',
        'mail_smtp_port',
        'mail_smtp_user',
        'mail_smtp_pass',
        'company_email',
        'company_facebook',
        'company_googleplus',
        'company_twitter',
        'company_vk',
        'company_instagram',
        'company_logo',
        'params'
    ];

}
