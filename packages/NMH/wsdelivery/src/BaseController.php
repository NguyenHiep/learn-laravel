<?php

namespace NMH\WSDelivery;

use Illuminate\Log\Logger;
use NMH\WSDelivery\Contracts\WSDeliveryAbstract;
use GuzzleHttp\Client;

/***
 * Class BaseController
 * @package NMH\WSDelivery
 */
class BaseController extends WSDeliveryAbstract
{

    /***
     * Call api external in package ws delivery
     *
     * @param string $method
     * @param string $url
     * @param array $data
     * @return mixed
     */
    protected function callApiExternal(string $method, string $url, array $data)
    {
        /** @var @doc: http://docs.guzzlephp.org/en/stable/request-options.html#headers $client */
        $result = [];
        $client = new Client([
            'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
        try {
            $response = $client->request($method, $url, ['json' => $data]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $ex) {
            Logger::error($ex->getMessage());
            return $result;
        }
    }
}