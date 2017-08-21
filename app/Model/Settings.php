<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use SoftDeletes;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_info';

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
        'mail_smtp_pass'
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
