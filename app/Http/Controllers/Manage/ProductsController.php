<?php

namespace App\Http\Controllers\Manage;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Posts\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Validate product field
     * @param $data
     * @param null $id
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {

        return Validator::make($data, [
            'name'              => 'required|string',
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

    public function __construct()
    {
        parent::__construct();
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
        $list_cate_all  = Category::all();
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
        $imageRules = array(
            'galary_img' => 'image|max:1024'
        );
        foreach ($inputs['galary_img'] as $image) {
            $image = ['galary_img' => $image];
            $imageValidator = Validator::make($image, $imageRules);

            if ($imageValidator->fails()) {
                $messages = $imageValidator->messages();
                return Redirect::to('venue-add')->withErrors($messages);
            }
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        if($request->hasFile('pictures')) {
            if ($request->file('pictures')->isValid()) {
                // File này có thực, bắt đầu đổi tên và move
                $fileExtension = $request->file('pictures')->getClientOriginalExtension(); // Lấy . của file
                // Filename cực shock để khỏi bị trùng
                $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                // Thư mục upload
                $uploadPath = public_path(UPLOAD_PRODUCT); // Thư mục upload
                // Bắt đầu chuyển file vào thư mục
                $request->file('pictures')->move($uploadPath, $fileName);
                $inputs[ 'pictures' ] = $fileName;
            } else {
                // Lỗi file
                return redirect()->back()->with([
                    'message' => __('Upload is failed'),
                    'status'  => self::CTRL_MESSAGE_SUCCESS,
                ]);
            }
        }

        foreach ($inputs['galary_img'] as $key => $image) {

            if($request->hasFile('galary_img' )) {
                if ($request->file($inputs['galary_img'][$key])->isValid()) {

                    // File này có thực, bắt đầu đổi tên và move
                    $fileExtension = $request->file($inputs['galary_img'][$key])->getClientOriginalExtension(); // Lấy . của file
                    // Filename cực shock để khỏi bị trùng
                    $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                    // Thư mục upload
                    $uploadPath = public_path(UPLOAD_PRODUCT); // Thư mục upload
                    // Bắt đầu chuyển file vào thư mục
                    $request->file($inputs['galary_img'][$key])->move($uploadPath, $fileName);
                    echo "<pre>";
                        var_dump($fileName);
                    echo "</pre>";
                    die();
                    $inputs[ 'galary_img' ][] = $fileName;
                } else {
                    // Lỗi file
                    return redirect()->back()->with([
                        'message' => __('Upload is failed'),
                        'status'  => self::CTRL_MESSAGE_SUCCESS,
                    ]);
                }
            }
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
{       $list_cate_all  = Category::all();
        $record = Products::find($id);
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
        if($request->hasFile('pictures')){
            if ($request->file('pictures')->isValid()) {
                // File này có thực, bắt đầu đổi tên và move
                $fileExtension = $request->file('pictures')->getClientOriginalExtension(); // Lấy . của file

                // Filename cực shock để khỏi bị trùng
                $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

                // Thư mục upload
                $uploadPath = public_path('/upload/product'); // Thư mục upload

                // Bắt đầu chuyển file vào thư mục
                $request->file('pictures')->move($uploadPath, $fileName);
                $inputs['pictures'] = $fileName;
            }
            else {
                // Lỗi file
                return redirect()->back()->with([
                    'message' => __('Upload is failed'),
                    'status'  => self::CTRL_MESSAGE_SUCCESS,
                ]);
            }
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
