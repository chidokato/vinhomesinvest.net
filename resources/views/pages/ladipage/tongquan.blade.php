<div class="section trangchu">
        <video class="d-none" id="myVideo" loop muted data-autoplay playsinline controls>
            <source data-src="vinhomes21.mp4" type="video/mp4">
        </video>
        <video class="m-none" id="myVideo" loop muted data-autoplay playsinline>
            <source data-src="vinhomes21.mp4" type="video/mp4">
        </video>
        <div class="layer">
            <h2>{!! $val->name !!}</h2>
            {!! $val->content !!}
        </div>
        <button class="m-none chitiet" data-toggle="modal" data-target="#trangchu" type="button">Chi tiết</button>
        <div class="modal fade bd-example-modal-lg" id="trangchu" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <h2>{!! $val->name !!}</h2>
                    {!! $val->content !!}
                </div>
              </div>
            </div>
        </div>
    </div>