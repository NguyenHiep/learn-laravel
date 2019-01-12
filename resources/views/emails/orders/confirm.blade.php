<div>
    @php $order_products = $order->products; @endphp
    @if($order_products->count())
        @php $count = 0; @endphp
        @foreach($order_products as $product)
            @php
                $count++;
                $price_include_tax =  $product->price * (($order->tax_rate / 100) + 1);
                $total_include_tax =  $price_include_tax * $product->quantity;
            @endphp
            <tr>
                <td>{{ $count }}</td>
                <td>{{ $product->name }}</td>
                <td> {{ $product->quantity }} </td>
                <td> {{ $orders->tax_rate}}%</td>
                <td> {{ format_price($product->price) }} </td>
                <td> {{ format_price($price_include_tax)}} </td>
                <td> {{ format_price($total_include_tax) }} </td>
            </tr>
        @endforeach
    @endif
</div>