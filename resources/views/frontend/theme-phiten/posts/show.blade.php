@extends('frontend.theme-phiten.template')

@section('title', 'Chuyên mục tin tức')

@push('meta')
    <meta name="title" content="Chuyên mục tin tức - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Chuyên mục tin tức - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Chuyên mục tin tức - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Chuyên mục tin tức - Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li class="active"><a href="javascript:void(0)">Tin tức</a></li>
@endsection

@section('content')
    <main id="main" class="page-footer-2 page-news">
        <div class="container">
            <div class="row grid-space-60 end">
                <div class="col-md-8 col-lg-9">
                    @if($posts->total() > 0)
                        <ul class="list-news">
                            @foreach($posts as $post)
                                <li class="item">
                                    <div class=" row grid-space-20">
                                        <div class="col-sm-3">
                                            <a href="{{ route('posts.detail', $post->post_slug) }}" class="img tRes" title="{{ $post->post_title }}">
                                                @php
                                                    $mediaName = $post->media->name ?? null;
                                                    if (!empty($post->posts_medias_id) && !empty($mediaName)) {
                                                        $imgUrl = Storage::url($mediaName);
                                                    } else {
                                                        $imgUrl = asset('assets/images/img-1.jpg');
                                                    }
                                                @endphp
                                                <img class="lazy-hidden" data-lazy-type="image" data-lazy-src="{{ $imgUrl }}" alt="{{ $post->post_title }}"/>
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <h2><a href="{{ route('posts.detail', $post->post_slug) }}" class="title h4">{{ $post->post_title }}</a></h2>
                                            <div class="desc mb-5 mt-2">{!! limit_words($post->post_intro, 150) !!}</div>
                                            <div class="date"><i class="icon icon-date-2"></i> {{ $post->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Không tìm thấy bài viết trong chuyên mục này</p>
                    @endif
                    @if($posts->lastPage() > 1)
                      <div class="pages">
                        {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-4')  }}
                      </div>
                    @endif
                </div>
                <div class="col-md-4 col-lg-3">
                    @includeIf('frontend.theme-phiten._modules.sidebar-news')
                </div>
            </div>
        </div>
    </main>
@endsection
