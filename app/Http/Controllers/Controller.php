<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Medias;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const CTRL_MESSAGE_SUCCESS = "success";
    const CTRL_MESSAGE_INFO    = "info";
    const CTRL_MESSAGE_WARNING = "warning";
    const CTRL_MESSAGE_ERROR   = "error";

    public $medias;

    public function __construct() {
        $this->middleware('auth');
        $this->medias = Medias::all();
    }
}
