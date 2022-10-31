<section class="sec-hero">
	<div class="hero-slider">
		<div class="swiper">
			<div class="swiper-wrapper">
				@foreach($slider as $val)
				<div class="swiper-slide"><span style='background-image: url("data/themes/{{$val->img}}")' class="w-100 thumb"></span></div>
				@endforeach
			</div>
			<div class="swiper-navigator">
				<div class="swiper-pagination"></div>
				<div class="swiper-navigator-btn">
					<div class="swiper-button-prev"><i class="icon-prev-thin"></i></div>
					<div class="swiper-button-next"><i class="icon-next-thin"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-content">
		<div class="container">
			<div class="hero-text">
				<h2>TÌM KIẾM NGAY</h2>
				<!-- <p><b>NHÀ ĐẤT VN</b> - CÓ <b>NGAY NHÀ Ở</b></p> -->
			</div>
			<div class="hero-search search-home">
				<form action="search" type="{{ url('/search') }}" method="GET">
					<input type="hidden" value="" name="key_province">
					<input type="hidden" value="" name="key_district">
				<div class="row g-0 justify-content-center">
					<div class="col-lg-8">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="sale-search">
								<div class="hero-search-wrap">
									<div class="row g-0">
										<div class="col-3">
											<select name="key_category" class="form-select select2">
												<option value="">Tất cả</option>
												@foreach($cat_pro as $val)
												<option value="{{$val->slug}}">{{$val->name}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-9">
											<div class="input-group">
												<span>
													<i class="icon-location"></i>
													<input type="text" name="name" class="form-control" placeholder="Tìm kiếm địa điểm, khu vực..">
												</span>
												<button type="submit" class="btn btn-submit"><i class="icon-search me-1"></i>TÌM KIẾM</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="tab-pane fade" id="rent-search">
								<div class="hero-search-wrap">
									<div class="row g-0">
										<div class="col-3">
											<select class="form-select" id="">
												<option selected>Loại nhà đất</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="col-9">
											<div class="input-group">
												<span>
													<i class="icon-location"></i>
													<input type="text" class="form-control" placeholder="Tìm kiếm địa điểm, khu vực..">
												</span>
												<button type="submit" class="btn btn-submit"><i class="icon-search me-1"></i>TÌM KIẾM</button>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</section>