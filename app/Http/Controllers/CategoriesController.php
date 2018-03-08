<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use Illuminate\Http\Request;

class CategoriesController extends FrontendController
{
    public function show(Request $request, $slug){
        $category = Categories::where('slug', $slug)->where('status', '=', STATUS_ENABLE)->first();
        if(empty($category))
        {
            abort(404);
        }

        $modes              = [ 'gallery', 'list', 'table' ];
        $this->set_mode     = 'gallery';
        if(in_array($request->query('mode'), $modes)){
            $this->set_mode = $request->query('mode');
        }
        $data['mode']       = $this->set_mode;
        // Get product list
        $data['category']   = $category;
        $data['products']   = $this->getProductByCategoryId($category->id);
        $data['categories'] = $this->getMenuProductsCategory();
        return view('frontend.theme-ecommerce.catagories.show', $data);
    }
}
