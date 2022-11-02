<?php use App\category; ?>
<div class="section phankhu">
    <h2>{{$val->name}}</h2>
    <div class="d-none content">
        {!! $val->content !!}
    </div>
    <img data-src="data/ladipage/{{$val->img}}">
    <div class="">
        <div class="menu-matbang">
            <ul>
                @foreach($val->section as $key => $sec)
                <li><a data-toggle="modal" data-target="#matbang{{$sec->id}}" href="#"> <img data-src="frontend/imgs/<?php
                    if($key==0){echo 'daodua.png';}
                    if($key==1){echo 'sanho.png';}
                    if($key==2){echo 'haiau.png';}
                    if($key==3){echo 'chala.png';}
                    if($key==4){echo 'saobien.png';}
                    if($key==5){echo 'coxanh.png';}
                ?>"> {{$sec->name}} </a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @foreach($val->section as $key => $sec)
    <div class="modal fade bd-example-modal-lg" id="matbang{{$sec->id}}" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body matbangphankhu">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <img data-src="data/ladipage/{!! $sec->img !!}">
                    </div>
                    <div class="col-md-4 col-lg-4 content">
                        <h3>{!! $sec->name !!}</h3>
                        {!! $sec->content !!}
                        <button class="layout" data-toggle="modal" data-target="#mbtong{{$sec->id}}" data-dismiss="modal" aria-label="Close"> In common</button>
                        <button class="layout" data-toggle="modal" data-target="#layout{{$sec->id}}" data-dismiss="modal" aria-label="Close"> Layout of the low-rise area</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <?php $matbang = category::where('view', $sec->id)->first(); ?>
    @if($matbang)
    <div class="modal fade bd-example-modal-lg" id="mbtong{{$sec->id}}" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body matbangphankhu matbang">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="imgs"><img data-src="data/category/{!! $matbang->img !!}"></div>
                    </div>
                    <div class="col-md-4 col-lg-4 content">
                        <h3>{{$matbang->name}}</h3>
                        {!! $matbang->content !!}
                        <button class="layout" data-toggle="modal" data-target="#layout{{$sec->id}}" data-dismiss="modal" aria-label="Close"> Layout of the low-rise area</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <?php $layout = category::where('parent', $matbang->id)->get(); ?>
    @if($layout)
    <div class="modal fade bd-example-modal-lg" id="layout{{$sec->id}}" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body matbangphankhu layout">
                @foreach($layout as $key => $val)
                    @if($key==0)
                    <div id="data">
                        <img data-src="data/category/{{$val->img}}">
                    </div>
                    @endif
                @endforeach
                <div class="namelayout">
                    <ul class="nav nav-pills" role="tablist">
                        @foreach($layout as $key => $val)
                        <li role="presentation" id="presentation" class="{{ $key==0 ? 'active' : '' }}"><input type="hidden" id="idlayout" value="{{$val->id}}" name=""><a href="#" id="namelayout" aria-controls="home" role="tab" data-toggle="tab">{{$val->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
          </div>
        </div>
    </div>
    @endif

    @endif

    @endforeach

    

</div>

