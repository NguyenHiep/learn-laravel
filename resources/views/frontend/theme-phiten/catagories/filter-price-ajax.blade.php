<div class="topresults clearfix">
    <div class="results"><span class="cl1 b">{{ $products->total() }}</span> Sản phẩm được tìm thấy</div>
    <div class="search-result-right pull-right orderby">
        <div class="form-group">
            <select class="custom-select-black select" onchange="location = this.value">
                <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'topRated']) }}" {{ $sort === 'topRated' ? 'selected="selected"' : '' }}>Xếp hạng hàng đầu</option>
                <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'latest']) }}" {{ $sort === 'latest' ? 'selected="selected"' : '' }}>Mới nhất</option>
                <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'priceLowToHigh']) }}" {{ $sort === 'priceLowToHigh'? 'selected="selected"' : '' }}>Giá: từ thấp đến cao</option>
                <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'priceHighToLow']) }}" {{ $sort === 'priceHighToLow' ? 'selected="selected"' : '' }}>Giá: từ cao đến thấp</option>
            </select>
        </div>
    </div>
</div>
<div class="product-list-result mainproduct lists-1 lists-1-hover">
    <div class="row grid-space-0">
        @if($products->total() > 0)
            @foreach($products as $product)
                <div class="col-6 col-sm-6 col-md-4">
                    <div class="item">
                        <div class="img">
                            @if($loop->iteration > 6)
                                <img class="lazy-hidden" data-lazy-type="image" data-lazy-src="{{ Storage::url($product->pictures) }}" alt="{{ $product->name }}" />
                            @else
                                <img src="{{ Storage::url($product->pictures) }}" alt="{{ $product->name }}" />
                            @endif
                            <div class="groupbtn">
                                <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn2 sm"> View Detail</a>
                                <div class="group">
                                    <span class="gitem like"><i class="icon-heart"></i></span>
                                    <a href="javascript:void(0)"
                                       class="gitem cart"
                                       @click="addToCart({quantity: 1, product_id: {{ $product->id }} })"
                                    >
                                        <i class="icon-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="divtext">
                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="title equal_{{ $loop->iteration }}">{{ $product->name }}</a>
                            <p class="price"> {{ format_price($product->actual_price) }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    @if($products->lastPage() > 1)
        <div class="pages">
            @php
                $queryString = request()->query();
                unset($queryString['ajax']);
            @endphp
            {{ $products->appends($queryString)->links('vendor.pagination.bootstrap-4')  }}
        </div>
    @endif

</div>
