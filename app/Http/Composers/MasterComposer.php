<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Model\Settings;

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
        $settings = Settings::first();
        $view->with('settings', $settings);
    }

}