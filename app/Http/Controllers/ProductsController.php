<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductCommentRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends FrontendController
{
    public $categoryRepository;
    public $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function listProduct(Request $request)
    {
        $data['sort'] = $request->input('sort', 'latest');
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

        $data['products'] = $this->productRepository->getProducts($conditions);
        $data['categories'] = $this->categoryRepository->getListCategoryMenu();
        return view('frontend.theme-phiten.products.list', $data);
    }

    public function show($slug)
    {
        $product = $this->productRepository->getProductBySlug($slug);
        if (empty($product)) {
            abort(404);
        }
        if (!empty($product->pictures)) {
          $product->listImages = is_array($product->galary_img) ? array_merge([$product->pictures], $product->galary_img) : [$product->pictures];
        }
        $cateId = explode('|', $product->category_id);
        $category = app(CategoryRepository::class)->getListCategoryMenu($cateId)->first();
        if (empty($category)) {
            abort(404);
        }
        $listComment = app(ProductCommentRepository::class)->getCommentByProduct($product->id);
        $assignData = [
            'category'         => $category,
            'product'          => $product,
            'products_related' => $this->productRepository->getRelatedProducts($product->id, 14),
            'products_viewed'  => $this->productRepository->getListProductTrending(14),
            'listComment'      => $listComment
        ];
        return view('frontend.theme-phiten.products.detail', $assignData);
    }

    public function quick_view(Request $request)
    {
        $product_id = $request->query('product_id');
        $product = $this->productRepository->getProductById($product_id);
        if (empty($product)) {
            return response()->json([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => 'Product not found',
                'data'    => ''
            ]);
        }
        return response()->view('frontend.theme-phiten.products.quickview', ['product' => $product], 200)
            ->header('Content-Type', 'text/html');
    }

}
