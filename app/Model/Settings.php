<?php

namespace App\Model;

class Settings extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_info';


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
        'company_logo'
    ];

    /**
     * Check data empty in table website_info
     * @param int $id
     * @return array|mixed|static
     */
    public static function checkWebsiteInfo($id = 1)
    {
        $settings = Settings::find($id);
        if (empty($settings)) {
            return [];
        }
        return $settings;
    }

}
