<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\FrontendController;
use App\Repositories\CustomerRepository;
use App\Validators\CustomerValidator;
use Auth;
use DB;
use Illuminate\Http\Request;
use Log;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomerController extends FrontendController
{

    protected $customerRepository;
    protected $validator;

    public function __construct(CustomerRepository $customerRepository, CustomerValidator $validator)
    {
        $this->customerRepository = $customerRepository;
        $this->validator = $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        try {
            $inputs['status'] = config('define.STATUS_ENABLE');
            $this->validator->with($inputs)->passesOrFail(CustomerValidator::RULE_REGISTER_CUSTOMER);
            $password = $inputs['password'];
            $inputs['password'] = bcrypt($password);
            DB::beginTransaction();
            if (isset($inputs['captcha'])) {
                $inputs = array_except($inputs, 'captcha');
            }
            $customerResult = $this->customerRepository->createCustomer($inputs);
            DB::commit();
            // Login when register
            return $this->responseJson([
                'status'  => true,
                'message' => __('Action completed.'),
                'data'    => $customerResult->toArray()
            ], 201);
        } catch (ValidatorException $e) {
            return $this->responseJson([
                'status'  => false,
                'message' => $e->getMessageBag()
            ], 400);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return $this->responseJson([
            'status'  => false,
            'message' => __('Something went wrong')
        ], 500);
    }
}
