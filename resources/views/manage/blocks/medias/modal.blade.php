<!-- responsive -->
<div id="medias_libraries" class="modal container fade" tabindex="-1"> <!-- Add data-width="920" -->
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Ảnh tiêu biểu</h4>
  </div>
  <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
          <div class="tabbable-custom ">
            <ul class="nav nav-tabs ">
              <li>
                <a href="#medias_uploads" data-toggle="tab"> Tải tập tin lên </a>
              </li>
              <li class="active">
                <a href="#list_medias" data-toggle="tab"> Thư viện </a>
              </li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane " id="medias_uploads">
                <form action="{{route('medias.store')}}" class="dropzone dropzone-file-area" id="my-dropzone"  enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <h3 class="sbold">Thả tập tin vào đây</h3>
                  <p> Kéo thả tập tin vào đây hoặc click vào đây</p>
                </form>

              </div>
              <div class="tab-pane active clearfix" id="list_medias">
                <div class="col-md-9">
                  <ul tabindex="-1" class="list-unstyled list-attachments">
                    <li data-id="1" data-src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="2" data-src="http://minhhiep.info/wp-content/uploads/2017/09/cai-dat-composer-centos-300x57.png" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/09/cai-dat-composer-centos-300x57.png" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="3" data-src="/uploads/2017/10/3.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="4" data-src="/uploads/2017/10/4.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="5" data-src="/uploads/2017/10/5.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="6" data-src="/uploads/2017/10/6.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="7" data-src="/uploads/2017/10/7.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="8" data-src="/uploads/2017/10/8.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="9" data-src="/uploads/2017/10/9.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="10" data-src="/uploads/2017/10/10.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="11" data-src="/uploads/2017/10/11.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="12" data-src="/uploads/2017/10/12.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="13" data-src="/uploads/2017/10/13.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="14" data-src="/uploads/2017/10/14.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="15" data-src="/uploads/2017/10/15.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                    <li data-id="16" data-src="/uploads/2017/10/16.jpg" class="medias_attachment">
                      <div class="js-action-medias-attachment medias-attachment-preview landscape">
                        <div class="thumbnail">
                          <div class="centered">
                            <img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="button" class="button-link check" tabindex="0"><span class="fa fa-check-circle"></span></button>
                    </li>
                  </ul>
                </div>
                <div class="col-md-3">
                  Thông tin chi tiết
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng lại</button>
    <button type="button" class="btn green js-action-insert-image">Chọn ảnh tiêu biểu</button>
  </div>
</div>

@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/form-dropzone.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop
@push('custom-scripts')
<script src="{{ URL::asset ('manages/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset ('manages/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset ('manages/assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
@endpush