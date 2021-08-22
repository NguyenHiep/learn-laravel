@if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
    <div class="product-review total-rating">
        <span class="product-rating">
             @for($i = 1; $i <= 5; $i++)
                <i class="icon {{ $i > ceil($listComment->avg('rate')) ? 'icon-star-empty' : 'icon-star-full rated' }}"></i>
            @endfor
        </span> {{ $listComment->total() }} bình luận
    </div>
@endif
