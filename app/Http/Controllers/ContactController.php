<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use App\Jobs\SendEmail;
use URL;

class ContactController extends FrontendController
{
    private $contactRepo;
    private $settingRepo;
    
    public function __construct(ContactRepository $contact, SettingRepository $settings)
    {
        $this->contactRepo = $contact;
        $this->settingRepo = $settings;
    }
    
    public function index()
    {
        $record = new \stdClass();
        $record->page_title   = __('Liên hệ');
        $record->page_intro   = __('Liên hệ');
        $record->page_keyword = __('Liên hệ');
        return view('frontend.theme-phiten.contact')->with(['record' => $record]);
    }
    
    public function store(Request $request)
    {
        $rules     = [
            'name'    => 'required|string',
            'email'   => 'required|email',
            'content' => 'required|string',
        ];
        $niceNames = [
            'name'    => __('frontend.contact.form.name'),
            'email'   => __('frontend.contact.form.email'),
            'content' => __('frontend.contact.form.content')
        ];
        $this->validate($request, $rules, [], $niceNames);

        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $inputs['ip_user'] = getRealIpAddr();
            $this->contactRepo->storedContact($inputs);
            $settings = $this->settingRepo->getSettings();
            if (empty($settings)) {
                return false;
            }
            $emailInfo = [
                'subject'   => __('Email liên hệ từ ' . URL::to('/')),
                'from'      => $settings->email1,
                'from_name' => $settings->email1_name,
                'recipient' => $settings->company_email,
                'content'   => $inputs,
            ];
            dispatch(new SendEmail($emailInfo, 'emails.contact'));
            DB::commit();
            return redirect()->route('contact.index')->with([
                'message' => __('frontend.contact.message_thank'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => __('Create contact failed!')]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }
}
