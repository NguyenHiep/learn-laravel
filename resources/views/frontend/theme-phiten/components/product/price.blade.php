<p class="price">
    <span class="price_new">{{ format_price($product->actual_price) }}</span>
    @if($product->actual_price < $product->price)
        <span class="price_old">{{ format_price($product->price) }}</span>
    @endif
</p>
