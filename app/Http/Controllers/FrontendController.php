<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Helpers\ToolbarConfig;

class FrontendController extends Controller
{
    const SES_ITEMS_COMPARE = 'ses_items_compare';
    const SES_ITEMS_CART    = 'ses_items_cart';

    /***
     * response data json
     *
     * @param array $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJson(array $data, int $status = 200)
    {
        $result = [
            'status'  => $data['status'],
            'message' => $data['message'],
        ];
        if (!empty($data['data'])) {
            $result['data'] = $data['data'];
        }
        return response()->json($result, $status);
    }
}
