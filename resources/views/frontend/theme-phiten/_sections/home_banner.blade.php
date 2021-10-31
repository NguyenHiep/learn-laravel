@if($sliders->isNotEmpty() && !empty($settings->params['enable_home_slider']))
    <section class="slideshow owl-carousel  s-loop s-nav s-auto__">
        @foreach($sliders as $slider)
            <div class="item item-visible">
                <div class="img tRes_45">
                    <img class="owl-lazy" data-src="{{ Storage::url($slider->slider_img) }}" alt="{{ $slider->slider_title }}"/>
                </div>
                <div class="container">
                    <div class="divtext">
                        <div class="textinner">{!! $slider->slider_content !!}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endif
