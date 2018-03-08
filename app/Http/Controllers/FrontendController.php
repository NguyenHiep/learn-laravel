<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Helppers\ToolbarConfig;

class FrontendController extends Controller
{
    const SES_ITEMS_COMPARE = SESSION_ITEMS_COMPARE;
    const SES_ITEMS_CART    = SESSION_ITEMS_CART;

}
