<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function index(Request $request){
        // Array data request
        $inputs = $request->all();
        if ($request->method() === 'POST') {
            // Check CSRF
            if (\Session::token() === array_get($inputs, '_token')) {
                $this->validate($request,
                    [
                        'name'    => 'required|max:100',
                        'email'   => 'required|email',
                        'message' => 'required|min:10',
                    ]
                );

                // Begin
                try {
                    $name = array_get($inputs, 'name');
                    $email = array_get($inputs, 'email');
                    $content = array_get($inputs, 'message');

                    $title = 'Email liên hệ từ website http://www.esdesignweb.com/';
                    Mail::raw($content, function($message)use ($title, $email, $name)
                    {
                        $message->subject($title);
                        $message->from($email, $name);
                        $message->to('minhhiep.q@gmail.com');
                    });

                } catch (Exception $e) {
                    \DB::rollBack();
                    \Log::error($e->getMessage(), __METHOD__);
                    \Session::flash('message', __('system.message.errors', $e->getMessage()));
                }


            }

        }
    }
}
