<?php

namespace App\Http\Controllers\Manage;

use App\Model\Settings;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\BackendController;
use App\Repositories\SettingRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helpers\Uploads;
use Illuminate\View\View;

class SettingsController extends BackendController
{

    public $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->middleware('permission:setting-list', ['only' => ['index']]);
        $this->middleware('permission:setting-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setting-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
        $this->settingRepository = $settingRepository;
    }

    const WEBSITE_INFO_ID = 1;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $settings = Settings::checkWebsiteInfo(self::WEBSITE_INFO_ID);
        // Get show list
        return view('manage.modules.settings.index', compact('settings'));
    }

    public function update(SettingsRequest $request)
    {
        $inputs = $request->all();
        try {
            DB::beginTransaction();
            $settings = Settings::checkWebsiteInfo(self::WEBSITE_INFO_ID);
            if (empty($settings)) {
                $company_logo = Uploads::upload($request, 'company_logo', UPLOAD_SETTING);
                if ($company_logo) {
                    $inputs['company_logo'] = $company_logo;
                }
                $settings = new Settings();
                $settings->fill($inputs);
                $settings->save();
                DB::commit();
                return redirect()->back()->with([
                    'message' => __('system.message.create'),
                    'status'  => self::CTRL_MESSAGE_SUCCESS,
                ]);
            }

            // Update data info
            $company_logo = Uploads::upload($request, 'company_logo', UPLOAD_SETTING);
            if ($company_logo) {
                $inputs['company_logo'] = $company_logo;
            }
            $settings->update($inputs);
            DB::commit();
            return redirect()->back()->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }

        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    public function themeOptions()
    {
        $settings = $this->settingRepository->getSettings();
        $params = [];
        if (!empty($settings)) {
            $params = $settings->params;
        }
        return view('manage.modules.settings.theme-options', compact('params'));
    }

    public function storedThemeOptions(Request $request)
    {
        $inputs = Arr::except($request->all(), ['_token', 'submit']);
        try {
            DB::beginTransaction();
            $this->settingRepository->update(['params' => $inputs], self::WEBSITE_INFO_ID);
            DB::commit();
            return redirect()->back()->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => 'Update theme options failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

}
