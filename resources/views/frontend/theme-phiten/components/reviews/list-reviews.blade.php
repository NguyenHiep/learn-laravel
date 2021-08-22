@if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
    <div class="row">
        <div class="col-lg-12">
            <div class="review">
                <div class="tab-inner active">
                    <div id="reviews" class="tab-reviews reviews tab-pane fade in">
                        @if($listComment->total() > 0)
                            <ul class="user-review list-commnets mb-20">
                                @foreach($listComment as $comment)
                                    <li class="item">
                                        <div class="name">
                                            <div class="text">
                                                <div class="date">
                                                    <span class="time"
                                                          data-toggle="tooltip"
                                                          title="{{ format_date($comment->created_at,'%d/%m/%Y') }}">
                                                        {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                                    </span>
                                                </div>
                                                <div class="title">{{ $comment->name }}</div>
                                                <span class="product-rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fa {{ $i > $comment->rate ? 'fa-star-o' : 'fa-star rated' }}"></i>
                                                    @endfor
                                                </span>

                                            </div>
                                        </div>
                                        <div class="desc">{{ $comment->content }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div>
                            @if($listComment->lastPage() > 1)
                                {{ $listComment->appends(request()->query())->links('vendor.pagination.bootstrap-4')  }}
                            @endif
                        </div>
                        <div class="clearfix">
                            <button type="submit" class="btn btn1 btn-review-popup">Thêm đánh giá</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
