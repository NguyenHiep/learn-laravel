<?php

namespace App\Http\Controllers\Manage;
use App\Model\Products;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Posts\Category;
use Illuminate\Support\Facades\DB;
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
            'galary_img'        => 'string',
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
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
        return view('manage.modules.products.create', compact('list_cate_all'));
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
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        try {
            DB::beginTransaction();
            $education = new Products();
            $education->fill($inputs);
            $education->save();
            DB::commit();
            return redirect()->route('products.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), __METHOD__);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors'),
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
    {
        $record = Products::find($id);
        if(empty($record)){
            return abort(404);
        }
        return view('manage.modules.products.edit')->with(['record' => $record]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
