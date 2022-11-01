<!DOCTYPE HTML>
<html lang="vi-VN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
<!-- <base href="{{asset('')}}"> -->
<!-- seo -->
<title>@yield('title')</title>
<meta name="description" content="@yield('description')"/>
<meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
<meta name="news_keywords" content="@yield('keywords')" />
<meta name="robots" content="@yield('robots')"/>
<link rel="shortcut icon" href="{{asset('')}}data/themes/{{$head_setting->img}}" />
<link rel="canonical" href="@yield('url')"/>
<link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
<!-- and seo -->
<!-- og -->
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:url" content="@yield('url')" />
<meta property="og:site_name" content="site_name" />
<meta property="og:images" content="@yield('img')" />
<meta property="og:image" content="@yield('img')" />
<meta property="og:image:alt" content="@yield('title')" />
<!-- and og -->
<!-- twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<!-- and twitter -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="article:author" content="admin" />

<!-- ================= Style ================== --> 
<link rel="stylesheet" type="text/css" href="frontend/fullpage.css" />
<link rel="stylesheet" type="text/css" href="frontend/examples.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- front chữ -->
<link rel="stylesheet" type="text/css" href="frontend/css/slider-tienich.css" /> <!-- tiện ích -->
<!-- thư viện -->
<link href="frontend/css/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="frontend/css/custom.css" /> <!-- main -->
<link rel="stylesheet" type="text/css" href="frontend/css/responsive.css" /> <!-- responsive -->

@yield('css')

{!! $head_setting->codeheader !!}

</head>
@include('layout.function')
<body> 
@include('layout.header')

@yield('content')

@include('layout.footer')

<!------------------- JS core------------------->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="frontend/fullpage.js"></script>
<!-- <script type="text/javascript" src="examples.js"></script> -->

<!-- slider tiện ích -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://unpkg.com/imagesloaded@5.0.0/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/CSSPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/TextPlugin.min.js"></script>
<script src="frontend/js/demo.js"></script>

<!-- thư viện -->
<script src="frontend/js/swiper-bundle.min.js"></script>
<script src="frontend/js/thuvien.js"></script>

<script type="text/javascript">
    var myFullpage = new fullpage('#fullpage', {
        verticalCentered: true,
        // sectionsColor: ['#0c254e', '#1f4481', '#0c254e', '#0c254e', '#0c254e', '#0c254e', '#0c254e'], // backgroud corlor

        anchors: ['home', 'location', 'utilities', 'project-area', 'library', 'payment-schedule', 'subscribe', 'contact'],
        // verticalCentered: false,
        navigation:true,
        navigationTooltips: ['Home', 'Location', 'Utilities', 'Project area', 'Library', 'Payment schedule', 'Subscribe', 'Contact'],
        showActiveTooltip: true,
        
        navigationPosition: "left",

        menu: '#menu', // menu
        continuousVertical: true, // lăn chuột quay vòng lên đầu
        
        // Slider
        // controlArrows: false, // ẩn nút slider
        controlArrows: true, // hiện nút slider
        controlArrowsHTML: ['<div class="my-arrow"><i class="fas fa-arrow-alt-circle-left"></i></i></div>','<div class="my-arrow"><i class="fas fa-arrow-alt-circle-right"></i></div>',], // sửa icon slider
        slidesNavigation: true, // chấm tròn bên dưới slider
        // end slider
        css3:false,

        responsiveWidth: 900,

        onLeave: function(origin, destination, direction){
          if(destination.index === 2){
             destination.item.classList.add('load-background');
          }
        }

    });

</script>

@yield('script')

{!! $head_setting->codebody !!}

</body>
</html>