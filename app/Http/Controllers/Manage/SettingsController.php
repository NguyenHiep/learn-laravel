<?php

namespace App\Http\Controllers\Manage;

use App\Model\Settings;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $inputs = $request->all();
        try {
            DB::beginTransaction();
            $settings = Settings::checkWebsiteInfo(self::WEBSITE_INFO_ID);
            // If data empty --> create
            if (empty($settings)) {
                $settings = new Settings();
                $settings->fill($inputs);
                $settings->save();
                Settings::create($request->all());
                DB::commit();
                return redirect()->back()->with([
                    'message' => __('system.message.create'),
                    'status'  => self::CTRL_MESSAGE_SUCCESS,
                ]);
            }

            // Update data info
            $settings->update($inputs);
            DB::commit();
            return redirect()->back()->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }

        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

}
