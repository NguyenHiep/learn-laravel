<?php

namespace App\Http\Controllers\Manage;

use App\Model\Settings;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    const WEBSITE_INFO_ID = 1;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::checkWebsiteInfo(self::WEBSITE_INFO_ID);
        // Get show list
        return view('manage.modules.settings.index', compact('settings' ));
    }

    public function update(SettingsRequest $request)
    {
        try {
            $settings = Settings::checkWebsiteInfo(self::WEBSITE_INFO_ID);
            // If data empty --> create
            if(empty($settings)){
                Settings::create($request->all());
                session()->flash('message', __('system.message.create'));
            }else{

                // Update data info
                $settings->company_name         =  $request->company_name;;
                $settings->company_zip          =  $request->company_zip;;
                $settings->company_address      =  $request->company_address;
                $settings->company_tel          =  $request->company_tel;
                $settings->company_fax          =  $request->company_fax;
                $settings->company_copyright    =  $request->company_copyright;
                $settings->subtitle             =  $request->subtitle;
                $settings->company_lat          =  $request->company_lat;
                // $settings->i18n_flg             =  $request->i18n_flg;
                $settings->email1               =  $request->email1;
                $settings->email1_name          =  $request->email1_name;
                $settings->about_privacy        =  $request->about_privacy;
                $settings->about_terms          =  $request->about_terms;
                $settings->mail_smtp_host       =  $request->mail_smtp_host;
                $settings->mail_smtp_user       =  $request->mail_smtp_user;
                $settings->mail_smtp_pass       =  $request->mail_smtp_pass;
                $settings->save();
                session()->flash('message', __('system.message.update'));
            }
            return redirect()->route('settings.index');

        }catch(Exception $e) {
            session()->flash('message', __('system.message.errors',['errors' => $e->getMessage()]));
        }

    }

}
