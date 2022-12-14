@extends('layout.index')

@section('title'){{ isset($articles->seo->title) ? $articles->seo->title : $articles->name }}@endsection
@section('description'){{$articles->seo->description}}@endsection
@section('keywords'){{$articles->seo->keywords}}@endsection
@section('robots'){{ $articles->seo->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$articles->category->slug.'/'.$articles->slug}}@endsection

@section('css')
<link href="{{asset('')}}frontend/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/swiper-bundle.min.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/fonts.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/common.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/header.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/footer.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/form.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/card.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/rating.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/widget.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/article.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/simpleLightbox.css" rel="stylesheet">
<link href="{{asset('')}}frontend/css/captcha.css" rel="stylesheet">

@endsection
@section('content')
<?php use App\section; ?>

<!------------------- BREADCRUMB ------------------->
<section class="sec-breadcrumb">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{asset('')}}#">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="{{asset('')}}{{$articles->category->slug}}">{{$articles->category->name}}</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{$articles->name}}</li>
			</ol>
		</nav>
	</div>
</section>
<!------------------- END: BREADCRUMB ------------------->
<!------------------- GALLERY DESKTOP ------------------->
<section class="sec-gallery d-none d-md-block pt-4">
	<div class="container">
		<div class="news-hightlight">
			<div class="row g-3">
				<div class="col-lg-6">
					<a class="card-overlay outline-effect" title="1/{{count($articles->images)}}" href="{{asset('')}}data/product/{{$articles->img}}">
						<span class="card-overlay-img"><img src="{{asset('')}}frontend/images/space-4.gif" alt="" class="w-100" style="background-image: url('{{asset('')}}data/product/{{$articles->img}}');"></span>
						<div class="card-overlay-body">
							<div>{{$articles->name}}</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3">
					<div class="card-overlay-flex">
						@foreach($articles->images as $key => $img)
						@if($key<2)
						<a class="card-overlay card-overlay-sm outline-effect" title="{{$key+2}}/{{count($articles->images)}}" href="{{asset('')}}data/product/{{$img->img}}">
							<span class="card-overlay-img"><img src="{{asset('')}}frontend/images/space-4.gif" alt="" class="w-100" style="background-image: url('{{asset('')}}data/product/{{$img->img}}');"></span>
						</a>
						@endif
						@endforeach
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card-overlay-flex">
						@foreach($articles->images as $key => $img)
						@if($key<4 && $key>1)
						<a class="card-overlay card-overlay-sm outline-effect" title="{{$key+2}}/{{count($articles->images)}}" href="{{asset('')}}data/product/{{$img->img}}">
							<span class="card-overlay-img"><img src="{{asset('')}}frontend/images/space-4.gif" alt="" class="w-100" style="background-image: url('{{asset('')}}data/product/{{$img->img}}');"></span>
						</a>
						<i class="btn-plus"></i>
						@endif
						@endforeach
					</div>
					<div class="more-item">
						@foreach($articles->images as $key => $img)
						<a class="card-overlay" title="{{$key+2}}/{{count($articles->images)}}" href="{{asset('')}}data/product/{{$img->img}}"></a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!------------------- GALLERY MOBILE ------------------->
<section class="sec-gallery pt-4 d-md-none">
	<div class="container">
		<div class="position-relative grid-view mb-4 pb-lg-4">
			<div class="swiper gallery-mobile">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a class="card-overlay outline-effect" title="1/4" href="{{asset('')}}data/product/{{$articles->img}}">
							<span class="card-overlay-img"><img src="{{asset('')}}frontend/images/space-4.gif" alt="" class="w-100" style="background-image: url('{{asset('')}}data/product/{{$articles->img}}');"></span>
						</a>
					</div>
					@foreach($articles->images as $key => $img)
					<div class="swiper-slide">
						<a class="card-overlay outline-effect" title="1/4" href="{{asset('')}}data/product/{{$img->img}}">
							<span class="card-overlay-img"><img src="{{asset('')}}frontend/images/space-4.gif" alt="" class="w-100" style="background-image: url('{{asset('')}}data/product/{{$img->img}}');"></span>
						</a>
					</div>
					@endforeach
				</div>
				<div class="swiper-pagination bullets"></div>
				<div class="swiper-pagination fraction" id="fraction"></div>
			</div>
		</div>
	</div>
</section>

<!------------------- CARD ------------------->
<section class="sale-detail-sec mt-4 pt-lg-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="main-content product-subpage">
					<div class="row">
						<div class="col-md-12">
							<div class="product-dt-header">
								<div class="product-dt-header-title">
									<h1>{{$articles->name}}</h1>
									<div class="mb-2 text-muted"><small><i class="icon-location me-1"></i>
										{{$articles->product->address}}{{isset($articles->product->street->name)? ', '.$articles->product->street->name:''}}{{isset($articles->product->ward->name)? ', '.$articles->product->ward->name:''}}{{isset($articles->product->district->name)? ', '.$articles->product->district->name:''}}{{isset($articles->product->province->name)? ', '.$articles->product->province->name:''}}
									</small></div>
									<div class="d-md-none" id="fix-ft">
										<div class="product-price">
											<div class="new-price">
												<span>Giá bán</span>
												<h5>@if($articles->product->price!='') {{$articles->product->price}} {{$articles->product->unit_price==1? 'VNĐ':''}}{{$articles->product->unit_price==1000000? 'Tr':''}}{{$articles->product->unit_price==1000000000? 'Tỷ':''}} @else Liên hệ @endif</h5>
											</div>
											<div class="old-price">@if($articles->product->oldprice>0) {{$articles->product->oldprice}} {{$articles->product->unit_price==1? 'VNĐ':''}}{{$articles->product->unit_price==1000000? 'Tr':''}}{{$articles->product->unit_price==1000000000? 'Tỷ':''}} @endif</div>
										</div>
										<div class="product-contact">
											<!-- <h2 class="d-none d-lg-block line-b"></h2> -->
											<a class="btn btn-tel"><i class="icon-phone-filled"></i></a>
											<a class="btn btn-mail" href="{{asset('')}}#info-customer" data-bs-toggle="modal"><i class="icon-mail-filled"></i></a>
										</div>
									</div>
									<div id="fix-ft-anchor"></div>
								</div>
							</div>
							<?php $section_list = section::where('articles_id', $articles->id)->orderBy('number','asc')->get(); ?>
							<div class="main-article">
								<div class="product-overview" id="overview">
									<ul class="nav scrollspy-product" id="scrollspy-product">
										@foreach($section_list as $key => $section)
										<li class="nav-item">
											<a class="nav-link {{ $key==0? 'active':'' }}" href="#{{$section->slug}}">{{$section->tab_heading}}</a>
										</li>
										@endforeach
									</ul>
									<div>
										@foreach($section_list as $key => $section)
										<div id="{{$section->slug}}" class="scrolloverview">
											<div class="product-detail product-utilities">
												<h2 class="line-b">{{$section->heading}}</h2>
												<div class="box-km">
													{!!$section->content!!}
												</div>
											</div>
											@if($section->note == 'style 1')
											@if(isset($section->images) && count($section->images) > 0)
											<div class="fullscreen-slider">
												<div class="position-relative agent-slider">
													<div class="swiper" id="template-apartment-area">
														<div class="swiper-wrapper">
															@foreach($section->images as $img)
															<div class="swiper-slide">
																<span><img src="{{asset('')}}frontend/images/space-5.gif" class="w-100 thumb" style="background-image: url('{{asset('')}}data/product/{{$img->img}}');" alt="..."></span>
															</div>
															@endforeach
														</div>
														<div class="swiper-button-next"></div>
														<div class="swiper-button-prev"></div>
														<div class="swiper-pagination d-md-none"></div>
													</div>
												</div>
											</div>
											@endif
											@elseif($section->note == 'style 2')
											<!------------------- ADS SLIDER ------------------->
											<div class="main-ads-slider">
												<div class="swiper">
													<div class="swiper-wrapper">
														@foreach($section->images as $img)
														<div class="swiper-slide">
															<picture>
																<source media="(min-width: 992px)" srcset="frontend/images/space-5.gif" class="mw-100 thumb" style="background-image: url('{{asset('')}}data/product/{{$img->img}}')">
																<img src="{{asset('')}}frontend/images/space-5.gif" class="w-100 thumb" style="background-image: url(data/product/{{$img->img}});">
															</picture>
														</div>
														@endforeach
													</div>
												</div>
											</div>
											<div class="container mg-b-40">
												<div class="thumb-ads-slider">
													<div class="swiper">
														<div class="swiper-wrapper">
															@foreach($section->images as $img)
															<div class="swiper-slide">
																<img src="{{asset('')}}frontend/images/space-4.gif" style="background-image: url('{{asset('')}}data/product/{{$img->img}}')" alt="" class="w-100 thumb">
															</div>
															@endforeach
														</div>
													</div>
												</div>
											</div>
											@elseif($section->note == 'style 3')
											<div class="fullscreen-slider fullscreen-slider-50">
												<div class="position-relative agent-slider">
													<div class="swiper" id="template-apartment-area">
														<div class="swiper-wrapper">
															@foreach($section->images as $img)
															<div class="swiper-slide">
																<span><img src="{{asset('')}}frontend/images/space-4.gif" class="w-100 thumb" style="background-image: url('{{asset('')}}data/product/{{$img->img}}');" alt="..."></span>
															</div>
															@endforeach
														</div>
														<div class="swiper-button-next"></div>
														<div class="swiper-button-prev"></div>
														<div class="swiper-pagination d-md-none"></div>
													</div>
												</div>
											</div>
											@endif
										</div>
										@endforeach

										<div class="tags" style="margin-bottom: 30px;">
											<span>tags</span>
											<ul style="z-index: 99999;">
												<li><a href="{{asset('')}}">Nhà Đất VN</a></li>
												<li><a href="{{asset('')}}{{$articles->category->slug}}">{{$articles->category->name}}</a></li>
												<li><a href="{{asset('')}}{{$articles->category->slug}}/{{$articles->slug}}">{{$articles->name}}</a></li>
											</ul>
										</div>

										<div id="product-detail" class="scrolloverview">
											<div class="product-detail product-utilities">
												<h5 class="line-b">Bình luận</h5>
												<div class="comment-input">
							                        <form id="add_comment" class="comment-item" method="post" action="post_comment">
							                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
							                            <div class="avatar">
							                                <img src="{{asset('')}}data/user.png">
							                            </div>
							                            <input id="input" class="form-control" placeholder="Viết bình luận ..." type="" name="content">
							                        </form>
							                    </div>
							                    <div class="comments">
								                    <div class="comment-list" id="load_comment">
								                        <div class="comment-item" id="comment_item">
								                            <input type="hidden" id="id" name="" value="" />
								                            <div class="avatar">
								                                <img src="{{asset('')}}data/user.png">
								                            </div>
								                            <div class="content-comment">
								                                <h4>Nguyễn Văn tuấn <span style="font-weight: 100; font-size: .9rem"></span></h4>
								                                <p>asasda asd asdas asd asda asd ádasd</p>
								                                <div class="info">
								                                    <span id="rep">Trả lời</span>
								                                    <i>52/5/2002</i>
								                                    <span style="margin-left: 10px;" onClick="delete_row(this)" id="dell_comment">Xóa</span>
								                                </div>
								                                
								                            </div>
								                        </div>
								                    </div>
								                </div>
											</div>
										</div>
										

										<!-- <div id="product-detail" class="scrolloverview">
											<div class="product-detail product-utilities">
												<h5 class="line-b">Chi tiết</h5>
												<div class="row g-5 justify-content-between">
													<div class="col-lg-6">
														<div class="utilitie-item">
															<div><i class="me-2 icon-bedroom-2"></i>Phòng ngủ</div>
															<span class="text-main">3</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-bathroom-2"></i>Phòng tắm</div>
															<span class="text-main">3</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-direction"></i>Hướng</div>
															<span class="text-main">Nam</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-home-status"></i>Hiện trạng nhà</div>
															<span class="text-main">Để trống</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-paper"></i>Giấy tờ</div>
															<span class="text-main">Sổ hồng</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-home-measure"></i>Kết cấu nhà</div>
															<span class="text-main">1 trệt + 1 lầu</span>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="utilitie-item">
															<div><i class="me-2 icon-acreage-2"></i>Diện tích đất</div>
															<span class="text-main">82.1 m<sup>2</sup></span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-home-acreage"></i>Diện tích sử dụng</div>
															<span class="text-main">130.6 m<sup>2</sup></span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-home-measure"></i>Chiều dài</div>
															<span class="text-main">15.44 m</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-home-measure"></i>Chiều rộng</div>
															<span class="text-main">5.28 m</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-stretch"></i>Độ rộng hẻm</div>
															<span class="text-main">5.0 m</span>
														</div>
														<div class="utilitie-item">
															<div><i class="me-2 icon-stretch"></i>Độ rộng mặt tiền đường</div>
															<span class="text-main">---</span>
														</div>
													</div>
												</div>
											</div>
										</div> -->
										
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>

			</div>
			<div class="col-lg-3 d-none d-lg-block">
				<div class="product-price affix">
					<div class="new-price">
						<span>Giá bán</span> 
						<h5>@if($articles->product->price!='') {{$articles->product->price}} {{$articles->product->unit_price==1? 'VNĐ':''}}{{$articles->product->unit_price==1000000? 'Tr':''}}{{$articles->product->unit_price==1000000000? 'Tỷ':''}} @else Liên hệ @endif</h5>
					</div>
					<div class="old-price">@if($articles->product->oldprice>0) {{$articles->product->oldprice}} {{$articles->product->unit_price==1? 'VNĐ':''}}{{$articles->product->unit_price==1000000? 'Tr':''}}{{$articles->product->unit_price==1000000000? 'Tỷ':''}} @endif</div>
					
					<div class="widget widget-appointment">
						<h4 class="line-b">Đăng ký nhận thông tin</h4>
						<form action="dang-ky" id="dangky" method="post">
							<div class="mb-3">
								<input type="text" class="form-control" id="" placeholder="Họ tên của bạn">
							</div>
							<div class="mb-3">
								<input type="email" class="form-control" id="" placeholder="Nhập email">
							</div>
							<div class="mb-3">
								<input type="number" class="form-control" id="" placeholder="Nhập số điện thoại">
							</div>
							<!-- <div class="mb-3 datepicker">
								<input type="date" class="form-control" id="" placeholder="Ngày xem">
								<i><img src="{{asset('')}}frontend/images/ico-datepicker.svg" alt=""></i>
							</div> -->

							<!-- <div id="captchaBackground">
					            <canvas id="captcha">captcha text</canvas>
					            <input id="textBox" type="text" name="text">
					            <div id="buttons">
					                <input id="submitButton" type="submit">
					                <button id="refreshButton" type="button">Refresh</button>
					            </div>
					            <span id="output"></span>
					        </div> -->

					        <button type="submit">đăng ký</button>

							<!-- <div class="text-center"><div class="cta-btn ir"><a class="" href="{{asset('')}}register2.htm"><span class="cta-text font-weight-semibold">Đăng ký ngay</span><span class="cta-ico"><i class="icon-next"></i></span></a></div></div> -->
						</form>

						



					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!------------------- END CARD ------------------->

<section class="related-sec">
	<div class="container">
		<h3 class="title-subpage">Sản phẩm liên quan</h3>
		<div class="row row-cols-2 row-cols-md-4 g-4 grid-view" id="show-setting">
			@if(count($lienquan)>0)
				@foreach($lienquan as $val)
				<div class="col">
					<div class="card card-s card-s4">
						<!-- <span class="hot"><img src="frontend/images/new-label.png"></span> -->
						<a href="{{asset('')}}{{$val->category->slug}}/{{$val->slug}}">
							<span><img src="{{asset('')}}frontend/images/space-3.gif" class="card-img-top" style="background-image: url('{{asset('')}}data/product/300/{{$val->img}}');" alt="..."></span>
						</a>
						<div class="card-body">
							<div class="card-body-wrap">
								<h5 class="card-title"><a href="{{asset('')}}{{$val->category->slug}}/{{$val->slug}}" class="text-truncate">{{$val->name}}</a></h5>
								<div class="card-info">
									<span><i class="icon-location me-2"></i>{{ isset($val->product->district->name)? $val->product->district->name.', ' : '' }}{{ isset($val->product->province->name)? $val->product->province->name : '' }}</span>
								</div>
							</div>
							<div class="card-footer">
								<div class="card-price">Giá: 
									@if($val->product->price!='')
									<span class="current-price">{{ isset($val->product->price)? $val->product->price:'' }} <?php if($val->product->unit_price==1000000000){ echo "Tỷ"; }elseif($val->product->unit_price==1000000){ echo "Triệu"; }elseif($val->product->unit_price==1){ echo "VNĐ"; } ?></span>
									@else
									<span class="current-price">Liên hệ</span>
									@endif
									@if($val->product->oldprice!='')
									<span class="old-price">{{ $val->product->oldprice }} <?php if($val->product->unit_price==1000000000){ echo "Tỷ"; }elseif($val->product->unit_price==1000000){ echo "Triệu"; }elseif($val->product->unit_price==1){ echo "VNĐ"; } ?></span>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
		</div>
	</div>
</section>

<!-- INFO CUSTOMER -->
<div class="modal fade info-customer" id="info-customer">
	<div class="modal-dialog modal-dialog-centered modal-lg">
	  <div class="modal-content">
		<div class="modal-body">
			<button type="button" class="close" data-bs-dismiss="modal"><img src="{{asset('')}}frontend/images/fs-p-close.png" class="mw-100" alt=""></button>
			<div class="info-customer-wrap">
				<img src="{{asset('')}}frontend/images/info-customer-figure.png" class="" alt="">
				<div class="info-customer-content">
					<div class="primary-form">
						<div class="account-form-content px-md-4 pt-3 pt-md-0">
							<h2 class="line-b mb-4">Liên hệ với tôi</h2>

							<form class="row g-3">
								<div class="col-12">
									<div class="form-floating">
										<input type="text" class="form-control" id="yourName" placeholder="Họ và tên">
										<label for="yourPhone">Họ và tên</label>
									</div>
								</div>

								<div class="col-12">
									<div class="form-floating">
										<input type="email" class="form-control" id="yourEmail" placeholder="Email">
										<label for="yourEmail">Email</label>
									</div>
								</div>

								<div class="col-12">
									<div class="form-floating">
										<input type="text" class="form-control" id="yourPhone" placeholder="Số điện thoại">
										<label for="yourPhone">Số điện thoại</label>
									</div>
								</div>
								<div class="load-more text-center mt-4 pt-2">
									<div class="cta-btn ir">
										<a class="" data-bs-dismiss="modal" href="{{asset('')}}#info-system" data-bs-toggle="modal"><span class="cta-text font-weight-semibold">Gửi đi</span><span class="cta-ico"><i class="icon-next"></i></span></a>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
</div>

<!-- SYSTEM POPUP -->
<div class="modal fade info-customer" id="info-system">
	<div class="modal-dialog modal-dialog-centered modal-lg">
	  <div class="modal-content">
		<div class="modal-body">
			<button type="button" class="close" data-bs-dismiss="modal"><img src="{{asset('')}}frontend/images/fs-p-close.png" class="mw-100" alt=""></button>
			<div class="info-customer-wrap">
				<img src="{{asset('')}}frontend/images/info-customer-figure.png" class="" alt="">
				<div class="info-customer-content">
					<div class="primary-form">
						<div class="account-form-content px-md-4 pt-3 pt-md-0">
							<div class="text-center text-md-start">
								<div class="primary-title pt-md-0">
									<h3><span class="cover-title-filled">NHẬN THÔNG TIN</span><span class="position-relative">ĐỊNH GIÁ NHÀ BẠN</span></h3>
								</div> 
							</div>
							<p class="mt-5">Bạn đã gửi thông tin thành công.</p>
							<p class="mb-0">Thông tin của bạn sẽ được <span class="text-sub font-weight-semibold">Nhà Ở Ngay</span><br> đánh giá trong 24h làm việc tiếp theo.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
</div>

@endsection
@section('script')
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script src="{{asset('')}}frontend/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('')}}frontend/js/swiper-bundle.min.js"></script>
<script src="{{asset('')}}frontend/js/custom.js"></script>
<script src="{{asset('')}}https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('')}}frontend/js/simpleLightbox.min.js"></script>
<script src="{{asset('')}}frontend/js/smoothscroll.js"></script>
<script src="{{asset('')}}frontend/js/captcha.js"></script>

<script type="text/javascript">
	$('form#dangky').submit(function(event) {
	    $.ajax({
	        method: $(this).attr('method'),
	        url: $(this).attr('action'),
	        data: $(this).serialize(),
	        success: function(datas){
	            $('#load_comment').html(datas);
	            $('#add_comment')[0].reset();
	        }

	    }).done(function(response) {
	        // alert('thành công');
	    });
	    event.preventDefault(); // <- avoid reloading
	});
</script>

<script>
		var swiper = new Swiper(".related-sec .mySwiper", {
			slidesPerView: 1,
			spaceBetween: 10,
			pagination: {
				el: ".related-sec .swiper-pagination",
				clickable: true,
			},
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 2,
					spaceBetween: 20
				},
				// when window width is >= 480px
				768: {
					slidesPerView: 3,
					spaceBetween: 30,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 4,
					spaceBetween: 20,
					navigation: {
						nextEl: ".related-sec .swiper-button-next",
						prevEl: ".related-sec .swiper-button-prev",
					},
				}
			},	
		});

		const fraction = document.getElementById("fraction");
		const slides = document.querySelectorAll(".swiper.gallery-mobile .swiper-slide");
		const slideCount = slides.length;
		fraction.textContent = `1 / ${slideCount}`;

		var swiper2 = new Swiper(".swiper.gallery-mobile", {
			slidesPerView: 1,
			spaceBetween: 0,
			loop:true,
			pagination: {
				el: ".swiper.gallery-mobile .bullets",
				clickable: true,
			},
			autoplay: {
				delay: 20500,
				disableOnInteraction: false,
			},
			on: {
				slideChange: (index) => {
					if(index.activeIndex > slideCount || index.activeIndex < 1) {
						if(index.activeIndex < 1) {
							fraction.textContent = `${slideCount} / ${slideCount}`;
						}
						else {
							fraction.textContent = `1 / ${slideCount}`;
						}	
					}
					else {
						fraction.textContent = `${index.activeIndex} / ${slideCount}`;
					}
			}
		}
		});

		var lightbox = new SimpleLightbox({
			elements: '.sec-gallery .card-overlay',
		});
</script>

<script type="text/javascript">
	var swiper = new Swiper(".agent-slider .swiper", {
			slidesPerView: 'auto',
        	centeredSlides: true,
			grabCursor: true,
			spaceBetween: 10,
			loop:true,
			pagination: {
				el: ".agent-slider .swiper-pagination",
				clickable: true,
			},
			autoplay: {
			  delay: 2500,
			  disableOnInteraction: false,
			},
			initialSlide : 1,
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					spaceBetween: 10
				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					spaceBetween: 10,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					spaceBetween: 10,
					navigation: {
						nextEl: ".agent-slider .swiper-button-next",
						prevEl: ".agent-slider .swiper-button-prev",
					},
				}
			},
		});
</script>


<script>
	var swiper5 = new Swiper(".thumb-ads-slider .swiper", {
		spaceBetween:1,
		lazy: true,
		slidesPerView:"auto",
		freeMode: true,
		watchSlidesProgress: true,
		// autoplay: {
		//   delay: 2500,
		// },
	});
	var swiper6 = new Swiper(".main-ads-slider .swiper", {
		spaceBetween:0,
		lazy: true,
		autoplay: {
		  delay: 2500,
		  disableOnInteraction: false,
		},
		thumbs: {
			swiper: swiper5,
		},
	});
</script>

<script type="text/javascript">
    $('form#add_comment').submit(function(event) {
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(datas){
                $('#load_comment').html(datas);
                $('#add_comment')[0].reset();
            }

        }).done(function(response) {
            // alert('thành công');
        });
        event.preventDefault(); // <- avoid reloading
    });

    $(document).ready(function(){
        $("button#download").click(function(){
            var id = $(this).parents('#downloadlist').find('input[id="id"]').val();
            // alert(id);
            $.ajax({
                url:  'admin/ajax/update_hits_articles/'+id, type: 'GET', cache: false, data: {
                    "id":id
                },
                success: function(data){
                    $('#luottai').html(data);
                }
            });
        });
    }); // update status

    $(document).ready(function(){
        $("span#dell_comment").click(function(){
            var id = $(this).parents('#comment_item').find('input[id="id"]').val();
            // alert(id);
            $.ajax({
                url: 'admin/ajax/dell_comment/'+id,
                type: 'GET',
                cache: false,
                data: {
                    "id":id
                },
            });
        });
    }); // xóa ảnh trong db

    function delete_row(e) {
        e.parentElement.parentElement.parentElement.remove();
    }
</script>



<script type="text/javascript">
let captcha;
let alphabets = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz";
console.log(alphabets.length);
let status = document.getElementById('status');
status.innerText = "Captcha Generator";

generate = () => {
// console.log(status)
let first = alphabets[Math.floor(Math.random() * alphabets.length)];
let second = Math.floor(Math.random() * 10);
let third = Math.floor(Math.random() * 10);
let fourth = alphabets[Math.floor(Math.random() * alphabets.length)];
let fifth = alphabets[Math.floor(Math.random() * alphabets.length)];
let sixth = Math.floor(Math.random() * 10);
captcha = first.toString()+second.toString()+third.toString()+fourth.toString()+fifth.toString()+sixth.toString();
console.log(captcha);
document.getElementById('generated-captcha').value = captcha;
document.getElementById("entered-captcha").value = '';
status.innerText = "Captcha Generator"
}
check = () => {
// console.log(status)
let userValue = document.getElementById("entered-captcha").value;
console.log(captcha);
console.log(userValue);
if(userValue == captcha){
// status.innerText = "Correct!!"



}else{
status.innerText = "Try Again!!"
document.getElementById("entered-captcha").value = '';
}
}
</script>


@endsection