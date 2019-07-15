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
                        <li class="active"><a href="{{ url('/contact') }}">
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
                <span class="breadcrumb-item active">{{ __('interface.contact') }}</span>
            </nav>
        </div>
        <div class="contact">
            <div class="container">
                <div class="wow fadeInDown">
                    <h1>{{ __('interface.contactinfo') }}</h1>
                    <h4>{{ __('interface.contactdes') }}</h4>
                </div>
                <div class="row" style="margin-top: 35px;">
                    <div class="col-md-4 wow slideInLeft">
                        <div class="contact-item">
                            <ul>
                                <li><i class="fa fa-home fa-2x" aria-hidden="true"></i></li>
                                <li>
                                    <p>{{ __('interface.address') }}</p>
                                    <p>{{ $info->address }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-item">
                            <ul>
                                <li><i class="fa fa-phone fa-2x" aria-hidden="true"></i></li>
                                <li>
                                    <p>Phone: {{ $info->phone }}</p>
                                    <p>Hotline: {{ $info->hotline }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-item">
                            <ul>
                                <li><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></li>
                                <li>
                                    <p> Email: {{ $info->email }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 wow slideInRight">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form class="contact-form" method="post" action="{{ url('/contact') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ __('interface.name') }}</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>{{ __('interface.phone')}}</label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="form-group">
                                <label>{{ __('interface.message') }}</label>
                                <textarea name="message" rows="4" class="form-control"
                                          style="height: 120px;" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-send">{{ __('interface.send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.client')
    @include('layouts.map')
@endsection