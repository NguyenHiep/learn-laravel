<?php

namespace App\Http\Controllers\Checkout;

use App\Model\Products;
use Illuminate\Http\Request;
use Redirect;
use Session;
use App\Http\Controllers\FrontendController;

class CheckoutController extends FrontendController
{

    public function index()
    {
      return view('frontend.theme-ecommerce.checkout.checkout');
    }

    public function add()
    {

    }

    public function edit()
    {

    }

    public function remove()
    {

    }


}