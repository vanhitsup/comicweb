
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/layout.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /* You can remove these code below*/
        :root {
            --primary: #40869b;
            --secondary: #13D2B8;
            --purple: #bd93f9;
            --pink: #ff6bcb;
            --blue: #8be9fd;
            --gray: #333;
            --font: "Poppins", sans-serif;
            --gradient: linear-gradient(40deg, #ff6ec4, #7873f5);
            --shadow: 0 0 15px 0 rgba(0,0,0,0.05);
        }*{box-sizing:border-box;}input,button,textarea{border:0;outline:none;}
        /* Main code */

        .subscribe-form {
            width: 35%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .subscribe-form-input {
            flex: 1;
            width: 100%;
            outline: none;
            padding: 10px 7px;
            border: 1px solid #eee;
            border-radius: 4px;
            transition: all 0.2s linear;
        }
        .subscribe-form-input:focus {
            border-color:#40869b;
        }
        .subscribe-form-input:focus + .subscribe-form-button {
            background-color: #40869b;
        }
        .subscribe-form-button {
            padding: 2px 10px;
            background-color: #999;
            color: white;
            outline: none;
            cursor: pointer;
            font-weight: 500;
            border-radius: 4px;
            flex-shrink: 0;
            transition: all 0.2s linear;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
        ::placeholder{
            font-size: 13px;
            font-style: italic;
        }
        .nav-sub{
            margin: 5px 0 10px 0;
        }
    </style>
</head>
<body class="antialiased">
<header class="header-area overlay" style="margin-bottom: 10px">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a href="{{url('/')}}" class="navbar-brand">TruyenTranh.xyz</a>

            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="menu-icon-bar"></span>
                <span class="menu-icon-bar"></span>
                <span class="menu-icon-bar"></span>
            </button>

            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li><a href="{{url('/')}}" class="nav-item nav-link active"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li><a href="#" class="nav-item nav-link"> <i class="fas fa-book"></i> Truyện Tranh</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-item nav-link" data-toggle="dropdown">
                            <i class="fas fa-book-open"></i> Sách</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-item nav-link" data-toggle="dropdown">
                            <i class="fas fa-list-ul"></i>
                            Danh mục truyện
                            <i class="fas fa-chevron-down" style="font-size: 12px"></i>
                        </a>
                        <div class="dropdown-menu">
                            @foreach($category as $key=>$value)
                            <a href="{{url('view-category/'.$value->slug)}}" class="dropdown-item">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                {{$value->namecate}}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-item nav-link" data-toggle="dropdown">
                            <i class="fas fa-tags"></i>
                            Thể Loại
                            <i class="fas fa-chevron-down" style="font-size: 12px"></i>
                        </a>
                        <div class="dropdown-menu">
                            @foreach($story_type as $key=>$type)
                            <a href="{{url('story-type/'.$type->slug)}}" class="dropdown-item"> <i class="far fa-arrow-alt-circle-right"></i> {{$type->name}}</a>
                            @endforeach

                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </nav>
</header>
<div class="container" align="right">
    <div class="nav-sub">
        <form autocomplete="off" action="{{url('search')}}" method="GET">
        <div class="subscribe-form">
            <input type="search" name="keyword" id="keywords" class="subscribe-form-input" placeholder="Nhập truyện, tác giả bạn muốn tìm ..."/>
            <button class="subscribe-form-button">Tìm kiếm</button>
        </div>
        </form>
    </div>

</div>

<!-- Start Carousel -->
@yield('slider')
<!-- End Carousel -->

<!-- Start Main -->
@yield('content')
<!--end Main -->

<!-- start Footer -->
<footer class="bg-dark text-center text-lg-start" style="margin-top: 10px">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #40869b; color: white">
        © 2020 Copyright:
        <a class="text-light" href="https://mdbootstrap.com/">PTVA</a>
    </div>
</footer>
<!-- end Footer -->
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=3218353928210088&autoLogAppEvents=1" nonce="5PvCMasK"></script>
<script type="text/javascript">
    CKEDITOR.replace('content_chapter');
</script>
<script>
    jQuery(function($) {
        $(window).on('scroll', function() {
            if ($(this).scrollTop() >= 200) {
                $('.navbar').addClass('fixed-top');
            } else if ($(this).scrollTop() === 0) {
                $('.navbar').removeClass('fixed-top');
            }
        });

        function adjustNav() {
            var winWidth = $(window).width(),
                dropdown = $('.dropdown'),
                dropdownMenu = $('.dropdown-menu');

            if (winWidth >= 768) {
                dropdown.on('mouseenter', function() {
                    $(this).addClass('show')
                        .children(dropdownMenu).addClass('show');
                });

                dropdown.on('mouseleave', function() {
                    $(this).removeClass('show')
                        .children(dropdownMenu).removeClass('show');
                });
            } else {
                dropdown.off('mouseenter mouseleave');
            }
        }

        $(window).on('resize', adjustNav);

        adjustNav();
    });
</script>
<script>
    $(document).ready(function(){
        $(".wish-icon i").click(function(){
            $(this).toggleClass("fa-heart fa-heart-o");
        });
    });
</script>
<script>
    $(".select-chapter").on('change',function (){
        const url = $(this).val();
        if(url){
            window.location=url;
        }
        return false;
    });
    current_chapter();
    function current_chapter(){
        var url=window.location.href;
        $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
    }
</script>

</body>

</html>
