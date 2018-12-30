<?php

namespace App\Http\Controllers\Manage;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use App\Model\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helppers\Uploads;

class ProductsController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    /**
     * Validate product field
     * @param $data
     * @param null $id
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {

        return Validator::make($data, [
            'name'              => 'required|string|unique:products,name,' . $id,
            'slug'              => 'string|unique:products,slug,' . $id,
            'description'       => 'required|string',
            'short_description' => 'string',
            'category_id'       => 'string',
            'sku'               => 'required|string|unique:products,sku,' . $id,
            'price'             => 'required|numeric',
            'sale_price'        => 'numeric',
            'status'            => 'string|numeric',
            'meta_title'        => 'string|max:100',
            'meta_keywords'     => 'string|max:1000',
            'meta_description'  => 'string|max:255',
            'brand_id'          => 'string',
            'galary_img'        => 'array',
            'pictures'          => 'image|max:1024',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $records = Products::orderBy('id', 'DESC')->paginate(12);
       return view('manage.modules.products.index')->with(['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_cate_all  = Categories::all();
        return view('manage.modules.products.create', compact('list_cate_all'))->with(['medias' => $this->medias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        if(isset($inputs['category_id'])){
            $inputs['category_id'] = convert_to_string($inputs['category_id']);
        }else{
            $inputs['category_id'] = '';
        }

        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $galary_upload = Uploads::multiple_upload($request, 'galary_img',UPLOAD_PRODUCT);
        if($galary_upload){
            $inputs['galary_img'] = json_encode($galary_upload);
        }
        $pictures = Uploads::upload($request, 'pictures', UPLOAD_PRODUCT);
        if($pictures){
            $inputs['pictures'] = $pictures;
        }
        if(isset($inputs['slug'])){
            $inputs['slug'] = unicode_str_filter($inputs['slug']);
        }else{
            $inputs['slug'] = unicode_str_filter($inputs['name']);
        }
        try {
            DB::beginTransaction();
            $product = new Products();
            $product->fill($inputs);
            $product->save();
            DB::commit();
            return redirect()->route('products.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create product is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{       $list_cate_all  = Categories::all();
        $record = Products::find($id);
        if(!empty($record->galary_img)){
            $record->galary_img = json_decode($record->galary_img);
        }
        if(empty($record)){
            return abort(404);
        }
        return view('manage.modules.products.edit')->with(['list_cate_all' => $list_cate_all, 'record' => $record, 'medias' => $this->medias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        if (empty($product)) {
            return abort(404);
        }
        $inputs = $request->all();
        if(isset($inputs['category_id'])){
            $inputs['category_id'] = convert_to_string($inputs['category_id']);
        }else{
            $inputs['category_id'] = '';
        }
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $pictures = Uploads::upload($request, 'pictures', UPLOAD_PRODUCT);
        if($pictures){
            $inputs['pictures'] = $pictures;
        }
        $galary_upload = Uploads::multiple_upload($request, 'galary_img',UPLOAD_PRODUCT);
        if($galary_upload){
            $inputs['galary_img'] = json_encode($galary_upload);
        }
        if(isset($inputs['slug'])){
            $inputs['slug'] = unicode_str_filter($inputs['slug']);
        }else{
            $inputs['slug'] = unicode_str_filter($inputs['name']);
        }

        try {
            DB::beginTransaction();
            $product->update($inputs);
            DB::commit();
            return redirect()->route('products.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('products.edit', ['id' => $product->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update product is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        if (empty($product)) {
            return abort(404);
        }

        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();
            return redirect()->route('products.index')->with([
                'message' => 'Delete product is success',
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('products.index')->with([
            'message' => __('system.message.error', ['errors' => 'Delete product is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }
}
