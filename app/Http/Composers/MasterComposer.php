<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Model\Settings;
use App\Model\Categories;

class MasterComposer
{

    /***
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings   = Settings::first();
        $categories = Categories::where('status', STATUS_ENABLE)->get();
        $view->with('settings', $settings);
        $view->with('categories', $categories);
    }

}