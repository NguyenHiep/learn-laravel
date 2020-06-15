<!-- Modal -->
<div class="modal fade" id="myReview" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" data-dismiss="modal"><i class="icon-close"></i></span>
            <div class="modal-body clearfix review-form modal-reviews">
                <form method="POST" action="{{ route('comment.stored') }}" class="form-comment row center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    <div class="col-md-12">
                        <h2>Đánh giá sản phẩm</h2>
                        <div class="form-group">
                            <label>Đánh giá<span class="rating-required">*</span></label>

                            <fieldset class="rating">
                                <input type="radio" id="star-5" name="rate" value="5" {{ old('rate') == 5 ? 'checked' : '' }}>
                                <label class="full" for="star-5" data-toggle="tooltip" title="5 sao"></label>

                                <input type="radio" id="star-4" name="rate" value="4" {{ (old('rate') == 4 || (old('rate')) == null) ? 'checked' : '' }}>
                                <label class="full" for="star-4" data-toggle="tooltip" title="4 sao"></label>

                                <input type="radio" id="star-3" name="rate" value="3" {{ old('rate') == 3 ? 'checked' : '' }}>
                                <label class="full" for="star-3" data-toggle="tooltip" title="3 sao"></label>

                                <input type="radio" id="star-2" name="rate" value="2" {{ old('rate') == 2 ? 'checked' : '' }}>
                                <label class="full" for="star-2" data-toggle="tooltip" title="2 sao"></label>

                                <input type="radio" id="star-1" name="rate" value="1" {{ old('rate') == 1 ? 'checked' : '' }}>
                                <label class="full" for="star-1" data-toggle="tooltip" title="1 sao"></label>
                            </fieldset>
                        </div>

                        <div class="form-group ">
                            <label for="name">Tên<span>*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control input" id="name" required />
                            @if ($errors->has('name'))
                                <p class="help-block">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Viết nhận xét<span>*</span></label>
                            <textarea name="content" class="form-control input" id="content" cols="30" rows="10" placeholder="Nhận xét của bạn về sản phẩm…" required>{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <p class="help-block">{{ $errors->first('content') }}</p>
                            @endif
                        </div>
                        <div class="form-group row" style="margin-top: 15px">
                            <label for="captcha" class="col-4">
                                <input maxlength="10" type="text" value="{{ old('captcha') }}" id="captcha" name="captcha" class="w-100 form-control input {{ $errors->has('captcha') ? 'has_error' : '' }}" placeholder="Nhập mã code" required style="width: 100%"/>
                                @if ($errors->has('captcha'))
                                    <p class="help-block">{{ $errors->first('captcha') }}</p>
                                @endif
                            </label>
                            <div class="col-6">
                                @includeIf('frontend.theme-phiten.components.captcha')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="btn review-submit" style="margin: 15px 0;">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
  (function ($) {
    $(document).ready(function () {
    @if($errors->has('rate') || $errors->has('name') || $errors->has('content') || $errors->has('captcha') || $errors->has('product_id'))
        $('#myReview').modal({
          show: true
        })
    @endif
    })
  })(jQuery)
</script>
@endpush