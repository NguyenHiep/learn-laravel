<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SliderRepository;

class HomeController extends FrontendController
{
    const CATEGORIES = [
        'thoitrang_nu'      => 1,
        'thoitrang_name'    => 2,
        'thoitrang_chobe'   => 3,
        'phukien_thoitrang' => 4
    ];
    const LIMIT_ITEM = 12;

    public $sliderRepository;
    public $productRepository;

    public function __construct(SliderRepository $sliderRepository, ProductRepository $productRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $data['sliders'] = $this->sliderRepository->getSliderHomePage();
        $products = $this->productRepository->getProductByCategoryIds(static::CATEGORIES);
        $categories = app(CategoryRepository::class)->getListCategoryMenu(static::CATEGORIES);
        if ($categories->isNotEmpty()) {
            foreach ($categories as $category) {
                $category->products = collect($products)->where('category_id', '|' . $category->id . '|')->slice(0, 14);
            }
        }
        $data['categories'] = $categories;
        $data['products_trending'] = $this->productRepository->getListProductTrending(self::LIMIT_ITEM);
        $data['products_viewed'] = $this->productRepository->getListProductTrending(self::LIMIT_ITEM);
        return view('frontend.theme-phiten.home', $data);
    }

    /****
     * Generate captcha
     *
     * @return string
     */
    public function refreshCaptcha()
    {
        return $this->responseJson([
            'status'  => true,
            'message' => __('Action completed'),
            'data'    => [
                'captcha' => captcha_img()
            ]
        ]);
    }

}
