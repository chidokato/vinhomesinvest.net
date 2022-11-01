<?php use App\menu; ?>
<!------------------- NAVIGATOR ------------------->

<div id="menu" class="menu">
    <div class="logo">
        <a href="{{asset('')}}"><img src="data/themes/{{$head_logo_trang->img}}"></a>
    </div>
    <ul class="m-none">
        @foreach($menu as $key => $val)
        <li data-menuanchor="{{$val->slug}}" class="<?php if($key==0) echo 'active'; ?>"><a href="#{{$val->slug}}">{{$val->name}}</a></li>
        @endforeach
        <!-- <li data-menuanchor="vitri"><a href="#vitri">Vị trí</a></li>
        <li data-menuanchor="tienich"><a href="#tienich">Tiện ích</a></li>
        <li data-menuanchor="phankhu"><a href="#phankhu">Phân khu</a></li>
        <li data-menuanchor="tintuc"><a href="#tintuc">Tin tức</a></li>
        <li data-menuanchor="thuvien"><a href="#thuvien">Thư viện</a></li>
        <li data-menuanchor="dangky"><a href="#dangky">Đăng ký</a></li>
        <li data-menuanchor="lienhe"><a href="#lienhe">Liên hệ</a></li> -->
    </ul>

    <div class="dropdown d-none">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-reorder"></i></button>
        <ul class="dropdown-menu">
            @foreach($menu as $key => $val)
            <li data-menuanchor="{{$val->slug}}" class="<?php if($key==0) echo 'active'; ?>"><a href="#{{$val->slug}}">{{$val->name}}</a></li>
            @endforeach
        </ul>
    </div>

</div>