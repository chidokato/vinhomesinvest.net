<div class="section vitri row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 content">
        <h2>{!! $val->name !!}</h2>
        {!! $val->content !!}
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-8">
        <a data-toggle="modal" data-target="#vitri" href="#"><img src="data/ladipage/{{$val->img}}"></a>
    </div>
</div>

@foreach($val->section as $key => $sec)
<div class="modal fade bd-example-modal-lg vitri" id="vitri" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <img src="data/ladipage/{!! $sec->img !!}">
                </div>
                <div class="col-md-4 col-lg-4 content">
                    <h3>{!! $sec->name !!}</h3>
                    {!! $sec->content !!}
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endforeach