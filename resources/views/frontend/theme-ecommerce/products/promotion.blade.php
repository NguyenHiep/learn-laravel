@extends('frontend.theme-ecommerce.template')

@section('title', 'Sản phẩm khuyến mãi')
@section('description', 'Sản phẩm khuyến mãi | cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Sản phẩm khuyến mãi, Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      <ul class="b-crumbs">
        <li>
          <a href="{{ route('home') }}">
            Trang chủ
          </a>
        </li>
        
        <li>
          <span>Sản phẩm khuyến mãi</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>Khuyến mãi</span></h1>
      
      <!-- Catalog Sidebar - start -->
      <div class="section-sb">
        @include('frontend.theme-ecommerce.sidebar.filter')
        @include('frontend.theme-ecommerce.sidebar.menu', ['categories' => $categories])
      </div>
      <!-- Catalog Sidebar - end -->
      <!-- Catalog Items | Gallery V1 - start -->
      <div class="section-cont">
        
        <!-- Catalog Topbar - start -->
        <div class="section-top">
          
          <!-- View Mode -->
          <ul class="section-mode">
            <li class="section-mode-gallery @if($mode == 'gallery') active @endif "><a title="View mode: Gallery" href="{{ route('product.list', addParamsUrl(['mode' => 'gallery'])) }}"></a></li>
            <li class="section-mode-list @if($mode == 'list') active @endif "><a title="View mode: List" href="{{ route('product.list', addParamsUrl(['mode' => 'list'])) }}"></a></li>
            <li class="section-mode-table @if($mode == 'table') active @endif "><a title="View mode: Table" href="{{ route('product.list', addParamsUrl(['mode' => 'table'])) }}"></a></li>
          </ul>
          
          <!-- Sorting -->
          <div class="section-sortby">
            <p>Sắp xếp</p>
            <ul>
              <li>
                <a href="{{ route('product.list', addParamsUrl(['sort' => 'new_desc']))  }}">Mới nhất</a>
              </li>
              <li>
                <a href="{{ route('product.list', addParamsUrl(['sort' => 'name_asc']))  }}">Sắp theo tên: A - Z</a>
              </li>
              <li>
                <a href="{{ route('product.list', addParamsUrl(['sort' => 'name_desc']))  }}">Sắp theo tên: Z - A</a>
              </li>
              <li>
                <a href="{{ route('product.list', addParamsUrl(['sort' => 'price_asc']))  }}">Giá tăng dần</a>
              </li>
              <li>
                <a href="{{ route('product.list', addParamsUrl(['sort' => 'price_desc']))  }}">Giá giảm dần</a>
              </li>
            </ul>
          </div>
          
          <!-- Count per page -->
          <div class="section-count">
            <p>12</p>
            <ul>
              <li><a href="{{ route('product.list', addParamsUrl(['limit' => 12]))  }}">12</a></li>
              <li><a href="{{ route('product.list', addParamsUrl(['limit' => 24]))  }}">24</a></li>
              <li><a href="{{ route('product.list', addParamsUrl(['limit' => 48]))  }}">48</a></li>
            </ul>
          </div>
        
        </div>
        <!-- Catalog Topbar - end -->
        @include('frontend.theme-ecommerce.products.mode-view.'.$mode, ['products' => $products])
        <!-- Pagination - start -->
        {{ $products->appends(request()->query())->links('vendor.pagination.theme')  }}
        <!-- Pagination - end -->
      </div>
      <!-- Catalog Items | Gallery V1 - end -->
      
      
    </section>
  </main>
  <!-- Main Content - end -->
@endsection