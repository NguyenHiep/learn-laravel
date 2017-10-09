<!-- responsive -->
<div id="medias_contents_libraries" class="modal container fade" tabindex="-1"> <!-- Add data-width="920" -->
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Chèn nội dung đa phương tiện vào</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable-custom ">
          <ul class="nav nav-tabs ">
            <li>
              <a href="#medias_uploads_contents" data-toggle="tab"> Tải tập tin lên </a>
            </li>
            <li class="active">
              <a href="#list_medias_contents" data-toggle="tab"> Thư viện </a>
            </li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane " id="medias_uploads_contents">
              <form action="{{route('medias.store')}}" class="dropzone dropzone-file-area" id="my-dropzone"
                    enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3 class="sbold">Thả tập tin vào đây</h3>
                <p> Kéo thả tập tin vào đây hoặc click vào đây</p>
              </form>

            </div>
            <div class="tab-pane active clearfix" id="list_medias_contents">
              <div class="col-md-12">
                @if(!empty($medias))
                  <ul class="list-unstyled list-attachments">
                    @foreach($medias as $media)
                      @if(isset($id) && $media->id == $id )
                        <li data-id="{{$media->id}}" data-src="{{Storage::url(UPLOAD_MEDIAS.$media->name)}}"
                            class="medias_attachment_content selected details">
                      @else
                        <li data-id="{{$media->id}}" data-src="{{Storage::url(UPLOAD_MEDIAS.$media->name)}}"
                            class="medias_attachment_content">
                          @endif
                          <div class="js-action-medias-attachment medias-attachment-preview landscape">
                            <div class="thumbnail">
                              <div class="centered">
                                <img src="{{Storage::url(UPLOAD_MEDIAS.$media->name)}}" draggable="false" alt="">
                              </div>
                            </div>
                          </div>
                          <button type="button" class="button-link check" tabindex="0"><span
                              class="fa fa-check-circle"></span></button>
                        </li>
                        @endforeach
                  </ul>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng lại</button>
    <button type="button" class="btn green js-action-insert-content-image">Chèn vào bài viết</button>
  </div>
</div>

@push('custom-scripts')
<script src="{{ asset('/manages/assets/global/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/manages/assets/pages/scripts/form-dropzone.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset ('manages/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}"
        type="text/javascript"></script>
<script src="{{ URL::asset ('manages/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}"
        type="text/javascript"></script>
<script src="{{ URL::asset ('manages/assets/pages/scripts/ui-extended-modals.min.js')}}"
        type="text/javascript"></script>
@endpush