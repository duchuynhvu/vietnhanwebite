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
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="/"><img src="{{ asset('img/home-icon.png') }}" alt="home"></a>
                <span class="breadcrumb-item active">{{ __('interface.projectinfo') }}</span>
            </nav>
        </div>
        <div class="about-us-content projects">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 wow slideInLeft">
                        <div class="wapp-text">
                            <h1>{{ __('interface.projectinfo') }}</h1>
                            <h3>{{ __('interface.welcome') }}</h3>
                            <p>{{ __('interface.weprovide') }}</p>
                        </div>
                        <div class="list-service">
                            <ul>
                                @foreach($services as $key => $item)
                                    <li>
                                        <div class="left-num">
                                            {{ $key + 1 }}
                                        </div>
                                        <div class="right-text">
                                            <h4>{{ $item->showTitle() }}</h4>
                                            <p>{{ $item->showDescription() }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7 wow slideInRight">
                        <div class="project-video">
                            <div class="video">
                                {!! $video !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="projects-text">
                            <p>{!! $intro->showIntroduce() !!}</p>
                        </div>
                        <div class="btn-inline">
                            <a href="" class="btn btn-bordered btn-lg" data-toggle="modal"
                               data-target="#requestModal">{{ __('interface.trial') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials projects-testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading wow fadeInUp" data-wow-delay="0.5s">
                        <h1>{{ __('interface.stated') }}</h1>
                        <h3>{{ $intro->showFounder() }}</h3>
                    </div>
                </div>
                <div class="row wow fadeInDown" data-wow-delay="0.8s">
                    <div class="col-md-12">
                        <div class="popover popover-top" style="min-width: 100%">
                            <div class="popover-content" style="padding: 10px 50px;">
                                <span class="quote-left"><img src="{{ asset('/img/quote-left.png') }}"></span>
                                <p><span>{{ $intro->showStated() }}</span>
                                    <span><img src="{{ asset('/img/quote-right.png') }}"></span></p>
                            </div>
                        </div>
                        <div class="home-testi-avatar">
                            <img width="110" height="110" src="{{ asset('/uploads/introduce') }}/{{ $intro->image }}"
                                 alt="{{ $intro->showFounder() }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.client')
    @include('layouts.map')
@endsection