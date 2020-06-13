@extends('frontend.theme-phiten.template')

@section('title', 'Nhận xét của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Nhận xét của tôi -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Nhận xét của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('customer.profile') }}">Tài khoản của tôi</a></li>
    <li class="active">Nhận xét của tôi</li>
@endsection

@section('content')
    <main id="main" class="page-account">
        <div class="container">
            <div class="content-wrapper clearfix ">

                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        @includeIf('frontend.theme-phiten.customers.sidebar')
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="content-right formaccount clearfix">
                            <div class="index-table">
                                <div class="wrap-table">
                                    <table class="table-cart productListCart">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Sản phẩm</th>
                                                <th>Xếp hạng</th>
                                                <th>Ngày</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if($listComment->total() >0)
                                            @foreach($listComment as $comment)
                                                <tr>
                                                    <td>
                                                        <div class="image-holder">
                                                            <img src="{{ asset(UPLOAD_PRODUCT . $comment->pictures) }}">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('product.show', ['slug' => $comment->slug]) }}">{{ $comment->product_name }}</a>
                                                    </td>

                                                    <td>
                                                        <span class="product-rating">
                                                            @for($i=1; $i<=5; $i++)
                                                                <i class="icon icon-star-full {{ ($i > $comment->rate) ? '' : 'rated' }}"></i>
                                                            @endfor
                                                        </span>
                                                    </td>

                                                    <td>{{ format_date($comment->created_at, '%d/%m/%Y') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="text-align: center">{{ __('Không có review nào') }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="pull-right">
                                @if($listComment->lastPage() > 1)
                                    {{ $listComment->appends(request()->query())->links('vendor.pagination.bootstrap-4')  }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
