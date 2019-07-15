<footer id="footer" class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-logo">
                        <a href="/" title="">
                            <img src="{{ asset('/img/footer-logo.png') }}" alt="Việt Nhân">
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-columns">
                        <h3>{{ __('interface.contact') }}</h3>
                        <p><a><span>Hotline:</span> {{ $info->hotline }}</a></p>
                        <p><a><span>Phone:</span> {{ $info->phone }}</a></p>
                        <p><a><span>Email:</span> {{ $info->email }}</a></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-columns">
                        <h3>Follow Us</h3>
                        <p><a href="{{ $info->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;
                                Facebook</a></p>
                        <p><a href="{{ $info->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                        </p>
                        <p><a href="{{ $info->youtube }}"><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-columns">
                        <h3>{{ __('interface.address') }}</h3>
                        <p>{{ $info->showAddress() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        Copyright 2015 © VIET NHAN Corp
    </div>
</footer>