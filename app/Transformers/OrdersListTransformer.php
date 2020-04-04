<?php

namespace App\Transformers;

use App\Entities\Order;
use Carbon\Carbon;

class OrdersListTransformer extends BaseTransformer
{
    public function transform(Order $order)
    {
        $routeParams = ['id' => $order->id];
        $actions = [
            'show'   => [
                'label' => '<i class="fa fa-eye"></i>',
                'attributes' => [
                    'title' => __('common.buttons.show'),
                    'class' => 'btn btn-warning js-action-list-rowlink-val',
                    'href'  => route('orders.show', $routeParams),
                ]
            ]
        ];
        return [
            'id'            => $order->id,
            'ordered_at'    => Carbon::parse($order->ordered_at)->diffForHumans(),
            'buyer_name'    => $order->deliveries->buyer_name,
            'buyer_phone_1' => $order->deliveries->buyer_phone_1,
            'total'         => format_price($order->total),
            'status'        => $this->getOrderStatus($order->status),
            'actions'       => $this->getActionsHtml($actions)
        ];
    }

    /***
     * get level user
     *
     * @param $status
     * @return string
     */
    private function getOrderStatus($status)
    {
        $levelText =__('selector.orders.status.'.$status);
        if ($status === 1) {
            return '<span class="font-red-thunderbird">' . $levelText . '</span>';
        }
        if ($status === 2) {
            return '<span class="font-green-dark">' . $levelText . '</span>';
        }
        if ($status === 3) {
            return '<span class="font-yellow-gold">' . $levelText . '</span>';
        }
        return $levelText;
    }
}
