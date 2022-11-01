@extends('layout.index')

@section('title'){{ isset($head_setting->title) ? $head_setting->title : $head_setting->name }}@endsection
@section('description'){{$head_setting->description}}@endsection
@section('keywords'){{$head_setting->keywords}}@endsection
@section('robots'){{ $head_setting->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$head_setting['slug']}}@endsection

@section('css')

@endsection
@section('content')

<div id="fullpage">

    @foreach($ladipage as $key => $val)
        @if ($key == 0)
            @include('pages.ladipage.tongquan')
        @elseif ($key == 1)
            @include('pages.ladipage.vitri')
        @elseif ($key == 2)
            @include('pages.ladipage.tienich')
        @elseif ($key == 3)
            @include('pages.ladipage.matbang')
        @elseif ($key == 4)
            @include('pages.ladipage.hinhanh')
        @endif
    @endforeach
    
    

    

    

    


    <!-- <div class="section tintuc">
        <div class="container">
            <h2>TIN TỨC</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="iteam">
                        <img src="imgs/tinich.png">
                        <div class="info">
                            <h3 class="line2"><a href="">Sắp khai trương tổ hợp biển hồ tạo sóng tại Vinhomes Ocean Park 2 - The Empire</a></h3>
                            <p class="line2">Khách hàng và nhà đầu tư sẽ được mục sở thị tiện ích công viên Royal Wave Park 18ha với tổ hợp biển tạo sóng và hồ nước mặn Laguna đẳng cấp hàng đầu thế giới, cùng chuỗi lễ hội Summer Wave Park sôi động ngập tràn sắc màu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iteam">
                        <img src="imgs/tinich.png">
                        <div class="info">
                            <h3 class="line2"><a href="">Sắp khai trương tổ hợp biển hồ tạo sóng tại Vinhomes Ocean Park 2 - The Empire</a></h3>
                            <p class="line2">Khách hàng và nhà đầu tư sẽ được mục sở thị tiện ích công viên Royal Wave Park 18ha với tổ hợp biển tạo sóng và hồ nước mặn Laguna đẳng cấp hàng đầu thế giới, cùng chuỗi lễ hội Summer Wave Park sôi động ngập tràn sắc màu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iteam">
                        <img src="imgs/tinich.png">
                        <div class="info">
                            <h3 class="line2"><a href="">Sắp khai trương tổ hợp biển hồ tạo sóng tại Vinhomes Ocean Park 2 - The Empire</a></h3>
                            <p class="line2">Khách hàng và nhà đầu tư sẽ được mục sở thị tiện ích công viên Royal Wave Park 18ha với tổ hợp biển tạo sóng và hồ nước mặn Laguna đẳng cấp hàng đầu thế giới, cùng chuỗi lễ hội Summer Wave Park sôi động ngập tràn sắc màu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iteam">
                        <img src="imgs/tinich.png">
                        <div class="info">
                            <h3 class="line2"><a href="">Sắp khai trương tổ hợp biển hồ tạo sóng tại Vinhomes Ocean Park 2 - The Empire</a></h3>
                            <p class="line2">Khách hàng và nhà đầu tư sẽ được mục sở thị tiện ích công viên Royal Wave Park 18ha với tổ hợp biển tạo sóng và hồ nước mặn Laguna đẳng cấp hàng đầu thế giới, cùng chuỗi lễ hội Summer Wave Park sôi động ngập tràn sắc màu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iteam">
                        <img src="imgs/tinich.png">
                        <div class="info">
                            <h3 class="line2"><a href="">Sắp khai trương tổ hợp biển hồ tạo sóng tại Vinhomes Ocean Park 2 - The Empire</a></h3>
                            <p class="line2">Khách hàng và nhà đầu tư sẽ được mục sở thị tiện ích công viên Royal Wave Park 18ha với tổ hợp biển tạo sóng và hồ nước mặn Laguna đẳng cấp hàng đầu thế giới, cùng chuỗi lễ hội Summer Wave Park sôi động ngập tràn sắc màu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iteam">
                        <img src="imgs/tinich.png">
                        <div class="info">
                            <h3 class="line2"><a href="">Sắp khai trương tổ hợp biển hồ tạo sóng tại Vinhomes Ocean Park 2 - The Empire</a></h3>
                            <p class="line2">Khách hàng và nhà đầu tư sẽ được mục sở thị tiện ích công viên Royal Wave Park 18ha với tổ hợp biển tạo sóng và hồ nước mặn Laguna đẳng cấp hàng đầu thế giới, cùng chuỗi lễ hội Summer Wave Park sôi động ngập tràn sắc màu</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    

    <div class="section dangky">
        <h2>REGISTER INFORMATION</h2>
        <form action="" method="post">
            <input type="text" name="name" class="form-control" placeholder="Your Name">
            <input type="text" name="phone" class="form-control" placeholder="Phone number">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <p><div class="g-recaptcha" data-sitekey="6LfsErkiAAAAABhpVqPBI85ByiHOUvdQ-h2TT_X2"></div></p>
            <button class="form-control" type="submit">REGISTER</button>
        </form>
    </div>
    <div class="section lienhe">
        <h2>CONTACT</h2>
        <div><img src="imgs/logo.png"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h5>CONTACT</h5>
                    <p>Phone: 1900 23 23 89</p>
                    <p>Email: info@vinhomes.vn</p>
                    <p>Address: Trung tâm giao dịch Bất động sản Vinhomes, L3-01, Tầng 2, TTTM Vincom Mega Mall, Vinhomes Ocean Park, Gia Lâm, Hà Nội</p>
                </div>
                <div class="col-lg-6">
                    <h5>ATTENTION</h5>
                    <p>*Information, images and utilities on the website are approximate and can be adjusted according to the decision of the Investor from time to time to ensure compliance with the planning and actual construction of the Project. The official information and commitments will be specified in the Sales Contract. The management, operation and business of the urban area will follow the regulations of the Management Board.</p>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('script')


@endsection