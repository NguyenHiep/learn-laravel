<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductCommentRepository;
use App\Repositories\ProductRepository;
use DB;
use Illuminate\Http\Request;
use Log;

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

    /****
     * Save comment of product
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function comment(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|string|max:255',
            'rate'       => 'required|numeric|min:1|max:5',
            'content'    => 'required|string',
            'captcha'    => 'required|captcha',
            'product_id' => 'required|numeric|exists:products,id'
        ]);

        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $inputs['ip_user'] = getRealIpAddr();
            $inputs['customer_id'] = auth()->id() ?? 0;
            $product = app(ProductRepository::class)->find($inputs['product_id'], ['id', 'name', 'slug']);
            $commentRepo = app(ProductCommentRepository::class);
            $commentRepo->fill($inputs);
            $commentRepo->save();
            DB::commit();
            return redirect()->route('product.show', ['slug' => $product->slug])->with([
                'message' => 'Action completed',
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => 'Create comment failed!']),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }

}
