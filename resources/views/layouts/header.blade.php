<header id="header" class="">
    @yield('menu')
    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="/" title="Việt Nhân">
                            <img src="{{ asset('/img/logo.png') }}" alt="Việt Nhân">
                        </a>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 hidden-xs">
                    <div class="hotline-login-lang">
                        <ul>
                            <li>
                                <div class="hotline">
                                    <span><i class="fa fa-phone fa-3x" aria-hidden="true"></i></span>
                                    <span>Hotline<br> {{ $hotline }} ({{ __('interface.support') }})</span>
                                </div>
                            </li>
                            <li>
                                <div class="login">
                                    <button type="button" class="btn" data-toggle="modal"
                                            data-target="#loginModal">{{ __('interface.signin') }}</button>
                                </div>
                            </li>
                            @if(Session::get('locale') == 'en')
                                <li>
                                    <div class="languages">
                                        <a href="{{ url('/lang/vi') }}"><img src="{{ asset('/img/vi.png') }}"
                                                                             alt="Vietnamese"></a>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <div class="languages">
                                        <a href="{{ url('/lang/en') }}"><img src="{{ asset('/img/en.png') }}"
                                                                             alt="English"></a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>