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
    	$settings = array();
	    $settings  = Settings::find(1);
	    // Get show list
        return view('manage.modules.settings.index', compact('settings'));
    }

    public function update_website(SettingsRequest $request){
        //Neu chua co id --> tao moi

	    Settings::create($request->all());
	    /*$settings = new Settings();

	    $category->name = $request->get('name');
	    return \Redirect::route('categories.show',
		    array($category->id))
		    ->with('message', 'Your category has been created!');
		*/
       return redirect()->route('manage/settings');
        // Neu co roi thi cap nhap lai thong tin
    }

}
