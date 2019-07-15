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
        <div class="pricing-banner" data-parallax="scroll" data-position="center 0px"
             data-image-src="{{ asset('/img/pricing-banner.jpg') }}">
            <div class="container">
                <div class="top-banner">
                    <h1>{{ __('interface.ourprice') }}</h1>
                </div>
            </div>
        </div>
        <div class="employees">
            <div class="container">
                <div class="row">
                    @foreach($packages as $key => $item)
                        <div class="col-md-3">
                            <div class="wapp-employ employ{{ $key + 1 }} wow fadeInUp animated">
                                <div class="employ-img">
                                    <img src="{{ asset('/img/employ-img.png') }}" alt="employees">
                                </div>
                                @if($item->to != 0)
                                    <div class="number">
                                        {{ $item->from }} - {{ $item->to }}
                                    </div>
                                @else
                                    <div class="number">
                                        {{ $item->from }} +
                                    </div>
                                @endif
                                <div class="employ-text">
                                    {{ __('interface.employee') }}
                                </div>
                                <div class="price">
                                    ${{ number_format($item->price) }}/{{ __('interface.month') }}
                                </div>
                                <div class="employ-btn">
                                    <a href="{{ url('/contact') }}"
                                       class="btn btn-default">{{ __('interface.buy') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pricing-feature">
            <div class="container">
                <div class="row">
                    @foreach($benefits as $item)
                        <div class="col-md-4 wow fadeInDown animated">
                            <div class="item">
                                <div class="icon-box">
                                    <div class="icon">
                                        <img src="{{ asset('/uploads/benefits') }}/{{ $item->icon }}"
                                             alt="{{ $item->title }}">
                                    </div>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <p>{{ $item->content }} <a
                                            href="{{ asset('/benefit') }}/{{ $item->id }}/{{ str_slug($item->title) }}">{{ __('interface.readmore') }}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pricing-banner training" data-parallax="scroll" data-position="center 0px"
             data-image-src="img/training-banner.jpg">
            <h1 class="training-text">{{ __('interface.onlinetrain') }}</h1>
            <a href="#" class="btn btn-training" data-toggle="modal"
               data-target="#requestModal">{{ __('interface.freetrain') }}</a>
        </div>
    </section>
    @include('layouts.client')
    @include('layouts.map')
@endsection