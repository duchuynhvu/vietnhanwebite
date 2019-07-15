@extends('layouts.master')
@section('menu')
    <div class="top-nav">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="/">
                                <div class="menu-eff-wap">
                                    <div class="menu-eff"></div>
                                </div>
                                <span>{{ __('interface.home') }}</span>
                            </a>
                        </li>
                        <li><a href="{{ url('/about-us') }}">
                                <div class="menu-eff-wap">
                                    <div class="menu-eff"></div>
                                </div>
                                <span>{{ __('interface.about') }}</span>
                            </a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="menu-eff-wap">
                                    <div class="menu-eff"></div>
                                </div>
                                <span>{{ __('interface.project') }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/projects') }}">{{ __('interface.projectinfo') }}</a>
                                </li>
                                <li><a href="{{ url('/features') }}">{{ __('interface.benefit') }}</a>
                                </li>
                                <li><a href="{{ url('/pricing') }}">{{ __('interface.price') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="menu-eff-wap">
                                    <div class="menu-eff"></div>
                                </div>
                                <span>{{ __('interface.news') }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $item)
                                    <li>
                                        <a href="{{ url('/news/category') }}/{{ $item->id }}/{{ $item->showSlug() }}">{{ $item->showName() }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ url('/partner') }}">
                                <div class="menu-eff-wap">
                                    <div class="menu-eff"></div>
                                </div>
                                <span>{{ __('interface.partner') }}</span>
                            </a></li>
                        <li><a href="{{ url('/contact') }}">
                                <div class="menu-eff-wap">
                                    <div class="menu-eff"></div>
                                </div>
                                <span>{{ __('interface.contact') }}</span>
                            </a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs">
                        <form class="navbar-form navbar-left" method="get" action="{{ url('/search') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="key" placeholder="Search" required>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@stop
@section('content')
    <section id="content" class="content">
        <div class="slider-banner" data-parallax="scroll" data-position="0px 180px" data-image-src="img/banner.jpg">
            <div class="container">
                <div class="banner-content">
                    <div class="wow fadeInDown">
                        <h1>{{ __('interface.risk') }}</h1>
                        <div class="btn-inline">
                            <a href="" class="btn btn-bordered btn-lg" data-toggle="modal"
                               data-target="#requestModal">{{ __('interface.demo') }}</a>
                            <a href="" class="btn btn-bordered btn-lg" data-toggle="modal"
                               data-target="#loginModal" title="">{{ __('interface.member') }}</a>
                        </div>
                    </div>
                    <div class="slideshow-wap wow fadeInUp">
                        <div class="slidershow owl-carousel owl-theme">
                            @foreach($slider as $item)
                                <div class="item">
                                    <img src="{{ asset('/uploads/images') }}/{{ $item->image }}" alt="{{ $item->alt }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="features">
            <div class="container">
                <div class="row wow fadeInDown">
                    <div class="col-md-8 col-md-offset-2 heading">
                        <h1>{{ __('interface.welcome') }}</h1>
                        <h3>{{ __('interface.offer') }}</h3>
                    </div>
                </div>
            </div>

            <div class="feature-content">
                <div class="container">
                    <div class="row">
                        @foreach($benefits as $key => $item)
                            <div class="col-md-4">
                                <div class="box_wrapper wow fadeIn">
                                    <div class="feature-box">
                                        <div class="icon-box">
                                            <div class="icon">
                                                <img src="{{ asset('/uploads/benefits') }}/{{ $item->icon }}"
                                                     alt="{{ $item->title }}">
                                            </div>
                                        </div>
                                        <h2>{{ $item->showTitle() }}</h2>
                                        <div class="text-box">
                                            <p>{{ $item->showContent() }}</p>
                                            <p>
                                                <a href="{{ asset('/benefit') }}/{{ $item->id }}/{{ str_slug($item->title) }}"
                                                   title="">{{ __('interface.readmore') }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="home-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 wow bounceInLeft hidden-xs" data-wow-delay="0.5s">
                            <div class="about-banner">
                                <img src="{{ asset('/img/about-banner.png') }}" alt="about banner">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 wow bounceInRight" data-wow-delay="0.5s">
                            <div class="panel-group" id="accordion">
                                @foreach($accordions as $key => $item)
                                    @if($key == 0)
                                        @php
                                            $collapsed = "";
                                            $in = "in";
                                        @endphp
                                    @else
                                        @php
                                            $collapsed = "collapsed";
                                            $in = "";
                                        @endphp
                                    @endif
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle {{ $collapsed }}" data-toggle="collapse"
                                                   data-parent="#accordion"
                                                   href="#collapse{{ $key }}">{{ $item->showTitle() }}</a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $key }}" class="panel-collapse collapse {{ $in }}">
                                            <div class="panel-body">{{ $item->showDescription() }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-video">
                {!! $video !!}
            </div>
            <div class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 heading wow fadeInUp" data-wow-delay="0.5s">
                            <h1>{{ __('interface.testi') }}</h1>
                            <h3>{{ __('interface.testisay') }}</h3>
                        </div>
                    </div>
                    <div class="row wow fadeInDown" data-wow-delay="0.8s">
                        <div class="regent-slide owl-carousel owl-theme">
                            @foreach($feedbacks as $item)
                                <div class="item">
                                    <div class="popover popover-top">
                                        <div class="popover-content">
                                            <p><strong>{{ $item->showContent() }}</strong></p>
                                            <a>{{ $item->showName() }}</a>
                                        </div>
                                    </div>
                                    <div class="home-testi-avatar">
                                        <img width="100" height="100"
                                             src="{{ asset('/uploads/feedbacks') }}/{{ $item->image }}"
                                             alt="{{ $item->name }}" style="border-radius: 50%">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.client')
    @include('layouts.map')
@endsection