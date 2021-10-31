<!-- responsive -->
<div id="medias_contents_libraries" class="{{ $class or '' }} modal container fade" tabindex="-1"> <!-- Add data-width="920" -->
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
              <form action="{{route('manage.medias.store')}}" class="dropzone dropzone-file-area" id="my-dropzone-contents"
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
                        <li data-id="{{$media->id}}" data-src="{{Storage::url($media->name)}}"
                            class="medias_attachment_content selected details">
                      @else
                        <li data-id="{{$media->id}}" data-src="{{Storage::url($media->name)}}"
                            class="medias_attachment_content">
                          @endif
                          <div class="js-action-medias-attachment medias-attachment-preview landscape">
                            <div class="thumbnail">
                              <div class="centered">
                                <img src="{{Storage::url($media->name)}}" draggable="false" alt="">
                              </div>
                            </div>
                          </div>
                          <button type="button" class="button-link check" tabindex="0"><span
                              class="fa fa-check-circle"></span></button>
                        </li>
                        @endforeach
                  </ul>
                  {{ $medias->appends(request()->all())->links() }}
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
    <button type="button" data-dismiss="modal" class="btn green js-action-insert-content-image">Chèn vào bài viết</button>
  </div>
</div>
