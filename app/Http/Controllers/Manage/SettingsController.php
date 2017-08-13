<?php

namespace App\Http\Controllers\Manage;

use App\Model\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Settings  $websiteinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $websiteinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Settings  $websiteinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $websiteinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Settings  $websiteinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $websiteinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Settings  $websiteinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $websiteinfo)
    {
        //
    }
}
