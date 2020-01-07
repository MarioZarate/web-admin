<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

   @include('web.common.metatags')

    <!-- inicio favicon  iphone retina, ipad, iphone en orden-->
    <link rel="icon" type="image/png" href="{{ $STATIC_URL }}img/favicon/256.png?v=1.1"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $STATIC_URL }}img/favicon/114.png?v=1.1">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $STATIC_URL }}img/favicon/72.png?v=1.1">
    <link rel="apple-touch-icon-precomposed" href="{{ $STATIC_URL }}img/favicon/57.png?v=1.1">
    <!-- end favicon -->

    @yield('cssadicional')

    <link rel="stylesheet" type="text/css" href="{{ $STATIC_URL }}css/styles.css?v=3"/>
    <link rel="stylesheet" type="text/css" href="{{ $STATIC_URL }}css/blocks_styl.css?v=2"/>

</head>

<body class="@yield('classbody')">

<!-- html solo para el menu responsive -->
<div  class="menu-mobile-open icon-menu"></div>
<div class="menu-mobile-close icon-close"></div>
<div class="menu-overlay"></div>
<!-- html solo para el menu responsive -->

<div class="cnt-wrapper">
    <div class="wrapper">
        <!-- HEADER START -->
        @include('web.common.header')
        <!-- HEADER END -->

        <!-- CONTENT START -->
        @yield('content')
        <!-- CONTENT END -->
    </div>
</div>

<!-- FOOTER START -->
@include('web.common.footer')
<!-- FOOTER END -->

<!-- contenedor del menu responsive -->
<div class="responsive-tool"></div>
<div class="menu-sidebar" data-menu="right-in">
    <div class="menu-sidebar-cnt"></div>
</div>


<script src="{{ $STATIC_URL }}js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{ $STATIC_URL }}js/main.js" type="text/javascript"></script>


<!-- JSADD START -->
@yield('jsfinal')
<!-- JSADD END -->


<script type="text/javascript">

    //para los formularios
    $.ajaxSetup({
		headers: { 'X-CSRF-Token' : "{{ csrf_token() }}" }
	});
   
    $(function(){
            
            var menu_data = $('.menu-sidebar').attr('data-menu');
            if (menu_data == 'left-in') {
                $('body').removeClass('right-in');
                $('body').removeClass('top-in');
                $('body').addClass('left-in');
            }
            if (menu_data == 'right-in') {
                $('body').removeClass('left-in');
                $('body').removeClass('left-in');
                $('body').addClass('right-in');
            }
            if (menu_data == 'top-in') {
                $('body').removeClass('left-in');
                $('body').removeClass('right-in');
                $('body').addClass('top-in');
                
            }
           
        })
        function height_header(){
            var height_header = $('.header').height(),
                sidebar_cout = $('.menu-sidebar').attr('data-header', 'sidebar-bottom').length;
            // console.log(sidebar_cout)
            
            // CUANDO EL MENU SIDEBAR ESTA DEBAJO DEL HEADER
                $('.cnt-wrapper').css('padding-top', height_header); 
                if ($('body').hasClass('left-in') || $('body').hasClass('right-in')) {
                    $('.menu-overlay').css('top', height_header); 
                    $('.menu-sidebar').css({
                        top: height_header,
                        height: 'calc(100% - '+height_header+'px)'
                    });
                }
                if ($('body').hasClass('top-in')) {
                    $('.menu-sidebar').css({
                        top: height_header,
                        height: 'calc(100% - '+height_header+'px)'
                    });
                }
            // CUANDO EL MENU SIDEBAR ESTA DEBAJO DEL HEADER
        }
        height_header();
        $(window).on('load', function() {height_header();});
        $(window).on('resize', function() {height_header();});

</script>
</body>
</html>
