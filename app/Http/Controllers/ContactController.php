<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class ContactController extends FrontendController
{
    private $contact;
    
    public function __construct( Contact $contact)
    {
        $this->contact = $contact;
    }
    
    public function index()
    {
        $record = new \stdClass();
        $record->page_title   = 'Liên hệ';
        $record->page_intro   = 'Liên hệ';
        $record->page_keyword = 'Liên hệ';
        return view('frontend.theme-ecommerce.contact')->with(['record' => $record]);
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
            //TODO: Sent mail
            DB::commit();
            return redirect()->route('contact.index')->with([
                'message' => __('frontend.contact.message_thank'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => 'Create contact failed!']),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }
}
