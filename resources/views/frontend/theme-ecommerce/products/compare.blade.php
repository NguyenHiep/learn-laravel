@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  @if(count($products) > 0)
  <main>
    <section class="container stylization maincont">
      
      <ul class="b-crumbs">
        <li>
          <a href="{{ URL::to('/') }}">Trang chủ</a>
        </li>
        <li>
          <span>So sánh sản phẩm</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>So sánh sản phẩm</span></h1>
      <div class="wccm-compare-table">
        <div class="wccm-thead">
          <div class="wccm-tr">
            <div class="wccm-th"></div>
            <div class="wccm-table-wrapper">
              <table class="wccm-table">
                <tbody>
                <tr>
                  @foreach($products as $product)
                    <td class="wccm-td">
                      <div class="wccm-thumb">
                        <i class="fa fa-remove remove-compare-item" data-id="{{ $product->id }}"></i>
                        @if(!empty($product->pictures))
                            <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                        @else
                          <img src="http://placehold.it/300x345" alt="">
                        @endif
                      </div>
                      <div>
                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                      </div>
                      <div class="price">{{ format_price($product->price) }}</div>
                    </td>
                  @endforeach
                 
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="wccm-tbody">
          <div class="wccm-tr">
            <div class="wccm-th">SKU</div>
            <div class="wccm-table-wrapper">
              <table class="wccm-table" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                  @foreach($products as $product)
                    <td class="wccm-td">
                      <p>{{$product->sku}}</p>
                    </td>
                  @endforeach
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wccm-tr">
            <div class="wccm-th">Xuất xứ</div>
            <div class="wccm-table-wrapper">
              <table class="wccm-table" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                  @foreach($products as $product)
                    <td class="wccm-td">
                      <p> Việt Nam</p>
                    </td>
                  @endforeach
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wccm-tr">
            <div class="wccm-th">Trạng thái</div>
            <div class="wccm-table-wrapper">
              <table class="wccm-table" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                  @foreach($products as $product)
                    <td class="wccm-td">
                      <p> Còn hàng</p>
                    </td>
                  @endforeach
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wccm-tr">
            <div class="wccm-th">Mô tả ngắn</div>
            <div class="wccm-table-wrapper">
              <table class="wccm-table" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                  @foreach($products as $product)
                    <td class="wccm-td">
                      {!! $product->short_description !!}
                    </td>
                  @endforeach
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
    </section>
  </main>
  @endif
@endsection