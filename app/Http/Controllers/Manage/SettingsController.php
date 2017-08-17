<?php

namespace App\Http\Controllers\Manage;

use App\Model\Settings;
use App\Model\User;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get show list
        return view('manage.modules.settings.index');
    }

    public function update_website(SettingsRequest $request){
        //Neu chua co id --> tao moi

        if ($request->validate()) {

        }
        return redirect()->route('manage');
        // Neu co roi thi cap nhap lai thong tin
    }

}
