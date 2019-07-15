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
                        <li class="active"><a href="{{ url('/about-us') }}">
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
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="/"><img src="{{ asset('/img/home-icon.png') }}" alt="home"></a>
                <span class="breadcrumb-item active">{{ __('interface.about') }}</span>
            </nav>
        </div>
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow slideInLeft">
                        <div class="wapp-text">
                            <h1>{{ __('interface.about') }}</h1>
                            <div class="wow slideInRight" style="float: right;width: 58.33333333%;margin-left: 30px;">
                                <div class="about-video" style="position: relative;">
                                    <div class="video">
                                        {!! $video !!}
                                    </div>
                                </div>
                            </div>
                            {!! $about->showContent() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials about-testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading wow fadeInUp" data-wow-delay="0.5s">
                        <h1>{{ __('interface.regent') }}</h1>
                        <h3>{{ __('interface.enthu') }}</h3>
                    </div>
                </div>
                <div class="row wow fadeInDown" data-wow-delay="0.8s">
                    <div class="regent-slide owl-carousel owl-theme">
                        @foreach($regents as $item)
                            <div class="item">
                                <div class="popover popover-top">
                                    <div class="popover-content">
                                        <h2>{{ $item->showName() }}</h2>
                                        <h3>{{ $item->showRegency() }}</h3>
                                        <p><strong>{{ $item->showContent() }}</strong></p>
                                    </div>
                                </div>
                                <div class="home-testi-avatar">
                                    <img width="100" height="100"
                                         src="{{ asset('/uploads/regents') }}/{{ $item->image }}"
                                         alt="{{ $item->name }}" style="border-radius: 50%">
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