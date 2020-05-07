<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class CategoriesController extends FrontendController
{
    public $categoryRepository;
    public $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository  = $productRepository;
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        if (empty($category)) {
            abort(404);
        }
        $data['sort'] = request()->input('sort', 'latest');
        switch ($data['sort']) {
            case 'priceLowToHigh' :
                $column = 'price';
                $direction = 'asc';
                break;
            case 'topRated' :
                //TODO: Need change order by
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
        $data['category'] = $category;
        $data['products'] = $this->productRepository->getProductByCategoryIds([$category->id], $conditions, 20);
        return view('frontend.theme-phiten.catagories.show', $data);
    }
}
