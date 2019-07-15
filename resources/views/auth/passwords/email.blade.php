<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Forgot Password | Việt Nhân</title>
    <link rel="apple-touch-icon" href="{{ asset('/img/favico.ico') }}">
    <link rel="shortcut icon" href="{{ asset('/img/favico.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/examples/css/pages/login-v3.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!-- Scripts -->
    <script src="{{ asset('/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition page-login-v3 layout-full">
<!-- Page -->
<div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="panel">
            <div class="panel-body">
                <div class="brand" style="margin-bottom: 20px">
                    <img class="brand-img" src="{{ asset('/img/footer-logo.png') }}" title="Việt Nhân">
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <form method="post" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group form-material floating"
                         data-plugin="formMaterial">
                        <input type="email" class="form-control" name="email"/>
                        <label class="floating-label">Email</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg m-t-40">Send Password Reset Link</button>
                </form>
            </div>
        </div>
        <a href="{{ url('/admin') }}" style="color: #fff"><i class="icon wb-arrow-left" aria-hidden="true"></i> Back</a>
        <footer class="page-copyright page-copyright-inverse">
            <p>WEBSITE BY <a href="http://www.beetechone.com" target="_blank">BEE TECH ONE</a></p>
            <p>© {{ date('Y', time()) }}. All RIGHT RESERVED.</p>
        </footer>
    </div>
</div>
<!-- End Page -->
<!-- Core  -->
<script src="{{ asset('/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
<script src="{{ asset('/global/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('/global/vendor/tether/tether.js') }}"></script>
<script src="{{ asset('/global/vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('/global/vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
<script src="{{ asset('/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
<script src="{{ asset('/global/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('/global/vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('/global/vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('/global/vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<script src="{{ asset('/global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('/global/js/State.js') }}"></script>
<script src="{{ asset('/global/js/Component.js') }}"></script>
<script src="{{ asset('/global/js/Plugin.js') }}"></script>
<script src="{{ asset('/global/js/Base.js') }}"></script>
<script src="{{ asset('/global/js/Config.js') }}"></script>
<script src="{{ asset('/assets/js/Section/Menubar.js') }}"></script>
<script src="{{ asset('/assets/js/Section/GridMenu.js') }}"></script>
<script src="{{ asset('/assets/js/Section/Sidebar.js') }}"></script>
<script src="{{ asset('/assets/js/Section/PageAside.js') }}"></script>
<script src="{{ asset('/assets/js/Plugin/menu.js') }}"></script>
<script src="{{ asset('/global/js/config/colors.js') }}"></script>
<script src="{{ asset('/assets/js/config/tour.js') }}"></script>
<script>
    Config.set('assets', '/assets');
</script>
<!-- Page -->
<script src="{{ asset('/assets/js/Site.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/asscrollable.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/slidepanel.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/switchery.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/jquery-placeholder.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/material.js') }}"></script>
<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>