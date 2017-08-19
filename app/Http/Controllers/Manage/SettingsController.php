<?php

namespace App\Http\Controllers\Manage;

use App\Model\Settings;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
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
        $settings = Settings::find(1);
        $settings = (!empty($settings)) ? $settings : [];
        // Get show list
        return view('manage.modules.settings.index', compact('settings'));
    }

    public function update(SettingsRequest $request)
    {
        //Neu chua co id --> tao moi
        Settings::create($request->all());
        /*$settings = new Settings();

        $category->name = $request->get('name');
        return \Redirect::route('categories.show',
            array($category->id))
            ->with('message', 'Your category has been created!');
        */
        return redirect()->route('settings.index');
        // Neu co roi thi cap nhap lai thong tin
    }

}
