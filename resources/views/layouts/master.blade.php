<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keyword" content="content">
    <meta name="viewport" id="viewport"
          content="user-scalable=no,width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0"/>
    {!! SEO::generate() !!}
    <link rel="apple-touch-icon" href="{{ asset('/img/footer-logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('/img/footer-logo.png') }}">
    <!-- Frame -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}"/>

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}"/>

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/responsive.css') }}">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<!-- header -->
@include('layouts.header')
<!-- /header -->

<!-- content -->
@yield('content')
<!-- /content -->

<!-- footer -->
@include('layouts.footer')
<!-- /footer -->
<div id="loading-screen"></div>
@include('layouts.LoginModal')
@include('layouts.RequestModal')
@include('layouts.SuccessModal')
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/wow.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/site.min.js') }}"></script>
<script>
    function initMap() {
        var uluru = {lat: <?php echo json_encode($geo['lat']) ?>, lng: <?php echo json_encode($geo['lng']) ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: "/img/marker.png"
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJXABPzPgo0vaR44LZ6yux3_V8svMr1Ew&callback=initMap"></script>
<script lang="javascript">(function () {
        var pname = ( (document.title != '') ? document.title : document.querySelector('h1').innerHTML );
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = 1;
        ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=acdbeaf5d2e5f9440168d1505f7dc2af&data=eyJzc29faWQiOjExNzE5NTMsImhhc2giOiJjZTA0ZWFjNmQ1NTI3ZTIwZjk4Y2M4ZjRkODViMGM1MCJ9&pname=' + pname;
        var s = document.getElementsByTagName('script');
        s[0].parentNode.insertBefore(ga, s[0]);
    })();</script>
</body>
</html>