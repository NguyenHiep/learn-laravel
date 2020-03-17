<?php

namespace NMH\WSDelivery\Contracts;

/***
 * Interface WSDeliveryInterface
 * @package NMH\WSDelivery\Contracts
 */
interface WSDeliveryInterface
{
    public function createOrder($data);

    public function calculateFee($data);

    public function getDistricts($data);

    public function findAvailableServices($data);

    public function getOrderInfo($data);

    public function updateOrder($data);

    public function cancelOrder($data);

    public function getWards($data);

    public function setConfigClient($data);

    public function getOrderLogs($data);
}