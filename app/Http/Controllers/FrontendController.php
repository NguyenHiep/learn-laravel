<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Helpers\ToolbarConfig;

class FrontendController extends Controller
{
    const SES_ITEMS_COMPARE = 'ses_items_compare';
    const SES_ITEMS_CART    = 'ses_items_cart';

}
