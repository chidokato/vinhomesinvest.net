<div class="section thuvien">
        <div class="container">
            <div class="text-center">
                <div class="primary-title">
                    <h2>{{$val->name}}</h2>
                </div>
            </div>

            <div class="position-relative broker-slider1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($val->section as $sec)
                        <div class="swiper-slide">
                            <img data-toggle="modal" data-target="#myModal" src="data/ladipage/{{$sec->img}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination d-lg-none"></div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="position-relative broker-slider2">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach($val->section as $sec)
                                    <div class="swiper-slide">
                                        <img  src="data/ladipage/{{$sec->img}}">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>