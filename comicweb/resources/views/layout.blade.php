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
                            <a href="#" class="dropdown-item"> <i class="far fa-arrow-alt-circle-right"></i> Dropdown Item 1</a>
                            <a href="#" class="dropdown-item"> <i class="far fa-arrow-alt-circle-right"></i> Dropdown Item 2</a>
                            <a href="#" class="dropdown-item"> <i class="far fa-arrow-alt-circle-right"></i> Dropdown Item 3</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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
