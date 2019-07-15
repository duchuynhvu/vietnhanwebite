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
                <span class="breadcrumb-item active">{{ __('interface.search') }} {{ $key }}</span>
            </nav>
        </div>
        <div class="news-content">
            <div class="container">
                <div class="news-list wow fadeInDown">
                    <div class="row">
                        @if(count($results) == 0)
                            <p>{{ __('interface.nofound') }}</p>
                        @else
                            @foreach($results as $item)
                                <div class="col-md-12">
                                    <div class="post-thumbnail">
                                        <a href="{{ url('/news') }}/{{ $item->id }}/{{ $item->slug }}"
                                           title="{{ $item->showTitle() }}">
                                            <img src="{{ asset('/uploads/news') }}/{{ $item->image }}"
                                                 title="{{ $item->showTitle() }}" alt="{{ $item->showTitle() }}">

                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h3><a href="{{ url('/news') }}/{{ $item->id }}/{{ $item->slug }}"
                                               title="">{{ $item->showTitle() }}</a></h3>
                                        <p class="post-by">by <a href="#" title="">{{ $item->user->name }}</a>
                                            | {{ date('F dS, Y', strtotime($item->created_at)) }}</p>
                                        <div class="desc" style="height: 50px; overflow: hidden">
                                            <p>{{ $item->showDescription() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    {{ $results->render() }}
                </div>
            </div>
        </div>
    </section>
    @include('layouts.client')
    @include('layouts.map')
@endsection