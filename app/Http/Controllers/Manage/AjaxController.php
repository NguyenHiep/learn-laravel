<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;


class AjaxController extends BackendController
{


    public function product(Request $request){
        if ($request->isMethod('post')){
            return response()->json(['response' => 'This is post method']);
        }

        return response()->json(['response' => 'This is get method']);
    }
}
