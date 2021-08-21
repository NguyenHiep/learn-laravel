<div class="sidebar-filter">
    <div class="mini-breadcrumb">
        <ul class="list-inline breadcrumbs">
            <li><a href="{{ route('product.list') }}">Cửa hàng</a></li>
            <li class="active">{{ $category->name }}</li>
        </ul>
    </div>
    <div class="inner">
        <div class="widget widget-price">
            <div class="widget-title">Giá (VND)</div>
            <div class="rangeprice">
                <div id="slider-range"></div>
                <div class="gprice">
                    <span class="amount1">
                        <span class="val1"></span>
                    </span>
                    <span class="amount2">
                        <span class="val2"></span>
                    </span>
                </div>
                <input type="hidden" id="min_price" name="filter[min_price]">
                <input type="hidden" id="max_price" name="filter[max_price]">
            </div>
        </div> <!--End widget-->
{{--        @includeIf('frontend.theme-phiten.components.catalog.filters', ['settings' => $settings])--}}
    </div>
</div>
@push('scripts')
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script>
      function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
          return uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
          return uri + separator + key + "=" + value;
        }
      }
      (function ($) {
        $(document).ready(function () {
          const defaultMinValue = {{ request()->input('min_price', 0) }};
          const defaultMaxValue = {{ request()->input('max_price', 1000000) }};
          $('#slider-range').slider({
            range: true,
            min: 0,
            max: 2000000,
            values: [defaultMinValue, defaultMaxValue],
            slide: function (event, ui) {
              let minPrice = ui.values[0];
              let maxPrice = ui.values[1];
              $('#min_price').val(minPrice)
              $('#max_price').val(maxPrice)
              $('.gprice .val1').html(minPrice)
              $('.gprice .val2').html(maxPrice)
            },
            change: _.debounce(function( event, ui ) {
              let self = this;
              let $loading = $('body').find('#loading').eq(0);
              $loading.show();
              let minPrice = ui.values[0];
              let maxPrice = ui.values[1];
              // Push params to url
              let newUrlMinPrice = updateQueryStringParameter(window.location.href, 'min_price', minPrice);
              let newUrlMaxPrice = updateQueryStringParameter(newUrlMinPrice, 'max_price', maxPrice);
              let fullAjaxUrl = updateQueryStringParameter(newUrlMaxPrice, 'ajax', true);
              window.history.pushState({}, '', newUrlMaxPrice);
              $.ajax({
                type: 'GET',
                url: fullAjaxUrl,
              }).done(function (response) {
                $('.js-product-list').html(response);
                window.lazyLoadPost();
                $('html, body').animate({
                  scrollTop: Math.floor(Math.random() * 10) //random number between 0 and 10
                }, 500);
                $loading.hide();
              }).fail(function (jqXHR) {
                $loading.hide();
              });
            }, 500)
          })
          $('#min_price').val($('#slider-range').slider('values', 0))
          $('#max_price').val($('#slider-range').slider('values', 1))
          //
          $('.gprice .val1').html($('#slider-range').slider('values', 0))
          $('.gprice .val2').html($('#slider-range').slider('values', 1))

        })
      })(jQuery)
    </script>
@endpush
