<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SubscribeRepository;
use GuzzleHttp\Exception\GuzzleException;
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
            $inputs = $request->all();
            $remoteIp = getRealIpAddr();
            $responseData = recaptcha_verify($request->input('google_token'), $remoteIp);
            if (empty($responseData)
                || !$responseData->success
                || $responseData->action !== $request->input('google_action')) {
                if ($responseData->score < 0.5) {
                    return $this->responseJson([
                        'status' => self::CTRL_MESSAGE_ERROR,
                        'message' => __('system.message.errors', ['errors' => 'Recaptcha failed with score ' . $responseData->score])
                    ], 400);
                }
                return $this->responseJson([
                    'status' => self::CTRL_MESSAGE_ERROR,
                    'message' => __('Recaptcha verify failed!')
                ], 400);
            }
            DB::beginTransaction();
            $inputs['ip_user'] = $remoteIp;
            $this->contactRepo->storedContact($inputs);
            DB::commit();
            $settings = $this->settingRepo->getSettings();
            if (!empty($settings)) {
                $emailInfo = [
                    'subject'   => __('Email liên hệ từ '.URL::to('/')),
                    'from'      => $settings->email1,
                    'from_name' => $settings->email1_name,
                    'recipient' => $settings->company_email,
                    'content'   => $inputs,
                ];
                dispatch(new SendEmail($emailInfo, 'emails.contact'));
            }
            return $this->responseJson([
                'status' => self::CTRL_MESSAGE_SUCCESS,
                'message' => __('frontend.contact.message_thank')
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        } catch (GuzzleException $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return $this->responseJson([
            'status' => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['errors' => __('Create contact failed!')]),
        ], 500);
    }

    public function subscribe(Request $request)
    {
        $remoteIp = getRealIpAddr();
        try {
            $responseData = recaptcha_verify($request->input('google_token'), $remoteIp);
            if (!empty($responseData) && $responseData->success && $responseData->action === $request->input('google_action')) {
                if ($responseData->score < 0.5) {
                    return $this->responseJson([
                        'status' => self::CTRL_MESSAGE_ERROR,
                        'message' => __('system.message.errors', ['errors' => 'Google reCaptcha failed with score ' . $responseData->score])
                    ], 400);
                }
                DB::beginTransaction();
                app(SubscribeRepository::class)->storedSubscribe([
                    'email'   => $request->input('email_subscribe'),
                    'ip_user' => $remoteIp
                ]);
                DB::commit();
                return $this->responseJson([
                    'status'  => self::CTRL_MESSAGE_SUCCESS,
                    'message' => __('Đăng ký theo dõi thành công!')
                ]);
            }
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => __('system.message.errors', ['errors' => $responseData->{'error-codes'}])
            ], 400);

        } catch (\Exception $ex) {
            DB::rollBack();
            logger('Subscribe:', [$ex->getMessage()]);
        } catch (GuzzleException $ex) {
            logger('Verify recaptcha response: ', [$ex->getMessage()]);
        }
        return $this->responseJson([
            'status' => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['errors' => __('Something went wrong')])
        ], 500);
    }
}
