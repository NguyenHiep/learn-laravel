@php
    $salePrice = $product->price;
    if ($product->sale_price > 0 && $product->sale_price < $salePrice) {
        $salePrice = $product->sale_price;
    }
@endphp
<p class="price">
    <span class="price_new">{{ format_price($salePrice) }}</span>
    @if($salePrice < $product->price)
        <span class="price_old">{{ format_price($product->price) }}</span>
    @endif
</p>
