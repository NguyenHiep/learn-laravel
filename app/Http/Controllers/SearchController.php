<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class SearchController extends FrontendController
{
    public $categoryRepository;
    public $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository  = $productRepository;
    }

    public function index(Request $request)
    {
        $data['sort'] = $request->input('sort', 'latest');
        switch ($data['sort']) {
            case 'priceLowToHigh' :
                $column = 'price';
                $direction = 'asc';
                break;
            case 'topRated' :
                $column = 'id';
                $direction = 'desc';
                break;
            case 'priceHighToLow' :
                $column = 'price';
                $direction = 'desc';
                break;
            default:
                $column = 'id';
                $direction = 'desc';
        }
        $conditions = [
            'column'    => $column,
            'direction' => $direction,
        ];
        $data['products'] = $this->productRepository->search($request->all());
        return view('frontend.theme-phiten.search', $data);
    }
}
