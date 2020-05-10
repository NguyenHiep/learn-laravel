<!-- Modal -->
<div class="modal fade " id="myReview" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" data-dismiss="modal"><i class="icon-close"></i></span>
            <div class="modal-body clearfix review-form modal-reviews">
                <form method="POST" action="/" class="form-comment row center">
                    <div class="col-md-12">
                        <h2>Đánh giá sản phẩm</h2>
                        <div class="form-group">
                            <label for="">
                                Đánh giá
                                <span class="rating-required">*</span>
                            </label>

                            <fieldset class="rating">
                                <input type="radio" id="star-5" name="rating" value="5" checked="">
                                <label class="full" for="star-5" data-toggle="tooltip" title="5 sao"></label>

                                <input type="radio" id="star-4" name="rating" value="4">
                                <label class="full" for="star-4" data-toggle="tooltip" title="4 sao"></label>

                                <input type="radio" id="star-3" name="rating" value="3">
                                <label class="full" for="star-3" data-toggle="tooltip" title="3 sao"></label>

                                <input type="radio" id="star-2" name="rating" value="2">
                                <label class="full" for="star-2" data-toggle="tooltip" title="2 sao"></label>

                                <input type="radio" id="star-1" name="rating" value="1">
                                <label class="full" for="star-1" data-toggle="tooltip" title="1 sao"></label>
                            </fieldset>
                        </div>

                        <div class="form-group ">
                            <label for="reviewer-name">
                                Tên<span>*</span>
                            </label>
                            <input type="text" name="reviewer_name" class="form-control input" id="reviewer-name" required value="">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="comment">
                                Viết nhận xét<span>*</span>
                            </label>
                            <textarea name="comment" class="form-control input" id="comment" cols="30" rows="10" placeholder="Nhận xét của bạn về sản phẩm…" required></textarea>
                            <p class="help-block">
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="btn  review-submit" style="margin: 15px 0;">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>