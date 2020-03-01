<style type="text/css">
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }

    .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
        border: 1px solid #e7ecf1;
    }
    .invoice table {
        margin: 30px 0
    }

    .invoice .invoice-logo {
        margin-bottom: 20px
    }

    .invoice .invoice-logo p {
        padding: 5px 0;
        font-size: 26px;
        line-height: 28px;
        text-align: right
    }

    .invoice .invoice-logo p span {
        display: block;
        font-size: 14px
    }

    .invoice .invoice-logo-space {
        margin-bottom: 15px
    }

    .invoice .invoice-payment strong {
        margin-right: 5px
    }

    .invoice .invoice-block {
        text-align: right
    }

    .invoice .invoice-block .amounts {
        margin-top: 20px;
        font-size: 14px
    }
</style>
<div class="invoice">
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th> Sản phẩm </th>
            <th> Số lượng </th>
            <th> Thuế </th>
            <th> Giá </th>
            <th> Giá có thuế </th>
            <th> Tổng </th>
        </tr>
        @php $order_products = $order->products;
        @endphp
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
                    <td> {{ $order->tax_rate}}%</td>
                    <td> {{ format_price($product->price) }} </td>
                    <td> {{ format_price($price_include_tax)}} </td>
                    <td> {{ format_price($total_include_tax) }} </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>