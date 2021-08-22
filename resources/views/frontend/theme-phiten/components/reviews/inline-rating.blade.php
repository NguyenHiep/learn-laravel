@if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
    <div class="product-review total-rating">
        <span class="product-rating">
             @for($i = 1; $i <= 5; $i++)
                <i class="fa {{ $i > ceil($listComment->avg('rate')) ? 'fa-star-o' : 'fa-star rated' }}"></i>
            @endfor
        </span> {{ $listComment->total() }} bình luận
    </div>
@endif
