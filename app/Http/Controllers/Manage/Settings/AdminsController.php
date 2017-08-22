<?php

namespace App\Http\Controllers\Manage\Settings;

use App\Http\Controllers\Controller;
use App\Model\User;

class AdminsController extends Controller
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
    	// Get danh sách

		$list_user = User::all();
        return view('manage.modules.settings.admins.index', compact('list_user'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('manage.modules.settings.admins.create');
	}

}
