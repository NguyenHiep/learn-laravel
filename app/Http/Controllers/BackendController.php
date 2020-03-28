<?php

namespace App\Http\Controllers;

use App\Model\Medias;

class BackendController extends Controller
{
    protected $medias;

    public function __construct()
    {
        $this->setMedias();
    }

    private function setMedias()
    {
        $this->medias = Medias::getListMedias();
    }
}
