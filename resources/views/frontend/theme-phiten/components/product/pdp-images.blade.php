<div class="wrap-syn-owl ">
    <div class="wrap-syn-1">
        <div class="syn-slider-1 owl-carousel s-loop">
            @if(!empty($product->listImages))
                @foreach($product->listImages as $image)
                    <div class="item">
                        <div class="tRes_80">
                            <img src="{{ Storage::url($image) }}" alt="{{ $product->name }}" />
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="wrap-syn-2">
        <div class="syn-slider-2 owl-carousel" data-res="4,3,3,3" data-margin="30,30,20,20">
            @if(!empty($product->listImages))
                @foreach($product->listImages as $image)
                    <div class="item">
                        <div class="tRes_80">
                            <img src="{{ Storage::url($image) }}" alt="{{ $product->name }}" />
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
