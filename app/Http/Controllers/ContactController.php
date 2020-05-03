<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use App\Jobs\SendEmail;
use App\Model\Settings;

class ContactController extends FrontendController
{
    private $contact;
    private $settings;
    
    public function __construct( Contact $contact, Settings $settings)
    {
        $this->contact  = $contact;
        $this->settings = $settings->checkWebsiteInfo();
    }
    
    public function index()
    {
        $record = new \stdClass();
        $record->page_title   = 'Liên hệ';
        $record->page_intro   = 'Liên hệ';
        $record->page_keyword = 'Liên hệ';
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
            $this->contact->fill($inputs);
            $this->contact->save();
            // Sent mail contact to company
            $contens = __('frontend.contact.email.name') . $inputs['name'];
            $contens .= '<br/> Email: ' . $inputs['email'];
            $contens .= '<br/> Nội dung: ' . $inputs['content'];
            $emailInfo = [
                'subject'   => 'Email liên hệ từ shop store',
                'from'      => $this->settings->email1,
                'from_name' => $this->settings->email1_name,
                'recipient' => $this->settings->company_email,
                'content'   => $contens
            ];
            dispatch((new SendEmail($emailInfo)));
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
            'message' => __('system.message.errors', ['errors' => 'Create contact failed!']),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }
}
