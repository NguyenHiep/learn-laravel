@extends('frontend.theme-phiten.template')

@section('title', $post->post_title)

@push('meta')
    <meta name="title" content="{{ $post->post_title }} - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="{{ $post->post_intro }} - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="{{ $post->post_title }} - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="{{ $post->post_intro }} - Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('posts.show') }}">Tin tức</a></li>
    <li class="active"><a href="javascript:void(0)">{{ $post->post_title }}</a></li>
@endsection

@section('content')
    <main id="main" class="page-footer-2 page-news-detail">
        <div class="container">

            <div class="row grid-space-60 end">
                <div class="col-md-8 col-lg-9">
                    <div class="entry-content">
                        <h1>{{ $post->post_title }}</h1>
                        <div class="date">
                            <img src="{{ asset('assets/images/svg/time.svg') }}" alt="icon time"/>
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                        {!! $post->post_full !!}
                    </div>
                    <div class="widget widget-related">
                        <h3 class="widget-title">Bài viết liên quan</h3>
                        <div class="widget-content">
                            @if($post_related->isNotEmpty())

                                <div class="related-posts owl-carousel s-nav nav-3" data-res="2,2,2,1" data-margin="20,10,10,0">
                                    @foreach($post_related as $post2)
                                        <div class="item">
                                            <div class=" row grid-space-20">
                                                <div class="col-3">
                                                    <a href="{{ route('posts.detail', $post2->post_slug) }}" class="img tRes" title="{{ $post2->post_title }}">
                                                        @php
                                                            $mediaName = $post2->media->name ?? null;
                                                            if (!empty($post2->posts_medias_id) && !empty($mediaName)) {
                                                                $imgUrl = Storage::url($mediaName);
                                                            } else {
                                                                $imgUrl = asset('assets/images/img-1.jpg');
                                                            }
                                                        @endphp
                                                        <img class="owl-lazy" data-src="{{ $imgUrl }}" alt="{{ $post2->post_title }}"/>
                                                    </a>
                                                </div>
                                                <div class="col-9">
                                                    <a href="{{ route('posts.detail', $post2->post_slug) }}" class="title" title="{{ $post2->post_title }}">{{ $post2->post_title }}</a>
                                                    <div class="date">
                                                        <img src="{{ asset('assets/images/svg/time.svg') }}" alt="icon time"/>
                                                        {{ $post2->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div> <!--End widget-->
                </div>
                <div class="col-md-4 col-lg-3">
                    @includeIf('frontend.theme-phiten._modules.sidebar-news')
                </div>
            </div>

        </div>
    </main>
@endsection
@push('scripts')
    <script src='{{ asset('assets/js/owl.carousel.min.js') }}'></script>
    <script src='{{ asset('assets/js/imagesloaded.pkgd.min.js') }}'></script>
    <script src='{{ asset('assets/js/script_owl.js') }}'></script>
@endpush
