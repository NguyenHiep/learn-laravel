<?php

namespace NMH\WSDelivery;

use NMH\WSDelivery\BaseController as BaseController;
use NMH\WSDelivery\Contracts\WSDeliveryInterface as WSDeliveryInterface;

/***
 * Class WSDeliveryController
 * @package NMH\WSDelivery
 */
class WSDeliveryController extends BaseController implements WSDeliveryInterface
{

    protected $baseUrl;
    protected $tokenApi;
    protected $urlGetDistrict;

    public function __construct()
    {
        $this->baseUrl        = config('ws_delivery.ghn.url');
        $this->tokenApi       = config('ws_delivery.ghn.apiToken');
        $this->urlGetDistrict = $this->baseUrl . '/api/v1/apiv3/GetDistricts';
    }

    public function calculateFee($data)
    {
        // TODO: Implement calculateFee() method.
    }

    public function findAvailableServices($data)
    {
        // TODO: Implement findAvailableServices() method.
    }

    public function cancelOrder($data)
    {
        // TODO: Implement cancelOrder() method.
    }

    public function createOrder($data)
    {
        // TODO: Implement createOrder() method.
    }

    public function getDistricts($data)
    {
        $result = [];
        $resultData = $this->callApiExternal('POST', $this->urlGetDistrict, ['token' => $this->tokenApi]);
        if (!empty($resultData['code'])) {
            $result = $resultData['data'];
        }
        return $result;
    }

    public function getOrderInfo($data)
    {
        // TODO: Implement getOrderInfo() method.
    }

    public function getOrderLogs($data)
    {
        // TODO: Implement getOrderLogs() method.
    }

    public function getWards($data)
    {
        // TODO: Implement getWards() method.
    }

    public function setConfigClient($data)
    {
        // TODO: Implement setConfigClient() method.
    }

    public function updateOrder($data)
    {
        // TODO: Implement updateOrder() method.
    }
}