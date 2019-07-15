<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Admin Panel | Việt Nhân</title>
    <link rel="apple-touch-icon" href="{{ asset('/img/footer-logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('/img/footer-logo.png') }}">
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
    <link rel="stylesheet" href="{{ asset('/global/vendor/chartist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/examples/css/dashboard/v1.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/examples/css/tables/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/examples/css/advanced/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/vendor/jsgrid/jsgrid.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/global/fonts/weather-icons/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!-- Scripts -->
    <script src="{{ asset('/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition dashboard">
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand navbar-brand-center site-gridmenu-toggle" href="{{ url('/dashboard') }}">
            <img class="navbar-brand-logo" src="{{ asset('/img/footer-logo.png') }}" title="Việt Nhân">
            <span class="navbar-brand-text hidden-xs-down"> Việt Nhân</span>
        </a>
        {{--<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"--}}
        {{--data-toggle="collapse">--}}
        {{--<span class="sr-only">Toggle Search</span>--}}
        {{--<i class="icon wb-search" aria-hidden="true"></i>--}}
        {{--</button>--}}
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                    <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                          <span class="avatar avatar-online">
                            <img src="{{ asset('/uploads/avatar') }}/{{ Auth::user()->avatar }}"
                                 title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}">
                            <i></i>
                          </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}" role="menuitem"><i
                                    class="icon wb-user"
                                    aria-hidden="true"></i>
                            {{ __('admin.profile') }}</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" role="menuitem"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="icon wb-power" aria-hidden="true"></i> {{ __('admin.logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">{{ csrf_field() }}</form>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    @if(Session::get('locale') == 'en')
                        <a class="nav-link" data-toggle="dropdown" data-animation="scale-up"
                           aria-expanded="false" role="button">
                            <span class="flag-icon flag-icon-gb"></span>
                        </a>
                    @else
                        <a class="nav-link" data-toggle="dropdown" data-animation="scale-up"
                           aria-expanded="false" role="button">
                            <span class="flag-icon flag-icon-vn"></span>
                        </a>
                    @endif
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{ url('/admin/lang/vi') }}" role="menuitem">
                            <span class="flag-icon flag-icon-vn"></span> Tiếng Việt</a>
                        <a class="dropdown-item" href="{{ url('/admin/lang/en') }}" role="menuitem">
                            <span class="flag-icon flag-icon-gb"></span> English</a>
                    </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-item">
                        <a href="{{ url('/dashboard') }}">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ url('/slider') }}">
                            <i class="site-menu-icon wb-image"></i>
                            <span class="site-menu-title">Slider</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ url('/videos') }}">
                            <i class="site-menu-icon wb-video"></i>
                            <span class="site-menu-title">Videos</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ __('admin.news') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/admin/news/create') }}">
                                    <span class="site-menu-title">{{ __('admin.addnew') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/admin/news') }}">
                                    <span class="site-menu-title">{{ __('admin.all') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/news-categories') }}">
                                    <span class="site-menu-title">{{ __('admin.category') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/admin/news-seo') }}">
                                    <span class="site-menu-title">SEO</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ url('/feedbacks') }}">
                            <i class="site-menu-icon wb-thumb-up"></i>
                            <span class="site-menu-title">{{ __('admin.testimonials') }}</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ url('/links') }}">
                            <i class="site-menu-icon wb-link"></i>
                            <span class="site-menu-title">{{ __('admin.clientlink') }}</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ url('/admin/benefits') }}">
                            <i class="site-menu-icon wb-extension"></i>
                            <span class="site-menu-title">{{ __('admin.benefit') }}</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-info" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ __('admin.about') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/content') }}">
                                    <span class="site-menu-title">{{ __('admin.about') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/regents') }}">
                                    <span class="site-menu-title">{{ __('admin.regent') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/information') }}">
                                    <span class="site-menu-title">{{ __('admin.information') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/admin/home-accordions') }}">
                                    <span class="site-menu-title">Home Accordions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-pluse" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ __('admin.product') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/services') }}">
                                    <span class="site-menu-title">{{ __('admin.service') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/packages') }}">
                                    <span class="site-menu-title">{{ __('admin.package') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/introduce') }}">
                                    <span class="site-menu-title">{{ __('admin.introduce') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ url('/admin/contact-requests') }}">
                            <i class="site-menu-icon wb-envelope-open"></i>
                            <span class="site-menu-title">{{ __('admin.contactrequest') }}</span>
                        </a>
                    </li>
                    @if(Auth::user()->role == 1)
                        <li class="site-menu-item">
                            <a href="{{ url('/admin/page-info') }}">
                                <i class="site-menu-icon wb-order"></i>
                                <span class="site-menu-title">{{ __('admin.pageinfo') }}</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="{{ url('/admin/users') }}">
                                <i class="site-menu-icon wb-users"></i>
                                <span class="site-menu-title">{{ __('admin.user') }}</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="{{ url('/admin/smtp') }}">
                                <i class="site-menu-icon wb-wrench"></i>
                                <span class="site-menu-title">{{ __('admin.smtpsetting') }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page -->
@yield('page')
<!-- End Page -->
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© {{ date('Y', time()) }} <a
                href="#">Việt Nhân</a></div>
    <div class="site-footer-right"></div>
</footer>
<!-- Core  -->
<script src="{{ asset('/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
<script src="{{ asset('/global/vendor/jquery/jquery.js') }}"></script>
{{--<script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>--}}
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
<script src="{{ asset('/global/vendor/skycons/skycons.js') }}"></script>
<script src="{{ asset('/global/vendor/aspieprogress/jquery-asPieProgress.min.js') }}"></script>
<script src="{{ asset('/global/vendor/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('/global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js') }}"></script>
<script src="{{ asset('/global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('/global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js') }}"></script>
<script src="{{ asset('/global/vendor/blueimp-load-image/load-image.all.min.js') }}"></script>
<script src="{{ asset('/global/vendor/jquery-ui/jquery-ui.js') }}"></script>
{{--<script src="{{ asset('/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>--}}
<script src="{{ asset('/global/vendor/blueimp-tmpl/tmpl.js') }}"></script>
<script src="{{ asset('/global/vendor/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/global/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('/global/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('/global/vendor/jsgrid/jsgrid.js') }}"></script>
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
<script src="{{ asset('/global/js/Plugin/matchheight.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/jvectormap.js') }}"></script>
<script src="{{ asset('/global/vendor/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/peity.js') }}"></script>
<script src="{{ asset('/global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/jquery-placeholder.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/material.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/dropify.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/asselectable.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/selectable.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/table.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/magnific-popup.js') }}"></script>
<script src="{{ asset('/assets/examples/js/advanced/lightbox.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/summernote.js') }}"></script>
<script src="{{ asset('/assets/examples/js/forms/editor-summernote.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/responsive-tabs.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/closeable-tabs.js') }}"></script>
<script src="{{ asset('/global/js/Plugin/tabs.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>