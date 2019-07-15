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
                        <li>
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
                        <li class="dropdown active">
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
        <div class="feature-page-banner" data-parallax="scroll" data-position="0px 180px"
             data-image-src="{{ asset('/img/feature-banner.jpg') }}">
            <div class="container">
                <div class="banner-content">
                    <div class="wow fadeInDown">
                        <h1>{{ __('interface.risk') }}</h1>
                        <div class="btn-inline">
                            <a href="" class="btn btn-bordered btn-lg" data-toggle="modal"
                               data-target="#requestModal">{{ __('interface.demo') }}</a>
                            <a href="" class="btn btn-bordered btn-lg" data-toggle="modal"
                               data-target="#loginModal">{{ __('interface.member') }}</a>
                        </div>
                    </div>
                    <div class="slideshow-wap wow fadeInUp">
                        <img src="{{ asset('/img/feature-banner-2.png') }}" alt="feature banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="features feature2">
            <div class="pricing-feature">
                <div class="container">
                    <div class="row">
                        @foreach($benefits as $item)
                            <div class="col-md-4 wow fadeInDown animated">
                                <div class="item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img width="60" height="60"
                                                 src="{{ asset('/uploads/benefits') }}/{{ $item->icon }}"
                                                 alt="{{ $item->title }}">
                                        </div>
                                    </div>
                                    <h5>{{ $item->showTitle() }}</h5>
                                    <p>{!! $item->showContent() !!} <a
                                                href="{{ asset('/benefit') }}/{{ $item->id }}/{{ str_slug($item->title) }}">{{ __('interface.readmore') }}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.client')
    @include('layouts.map')
@endsection