{{--<div class="center">--}}
{{--<button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Click Me</button>--}}
{{--</div>--}}
<!-- line modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">{{ __('interface.signin') }}</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form id="loginForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('interface.password') }}</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="{{ __('interface.password') }}" name="password">
                    </div>
                    <div class="login">
                        <button type="submit" class="btn">{{ __('interface.signin') }}</button>
                    </div>
                </form>
            </div>
            {{--<div class="modal-footer">--}}
            {{--<div class="btn-group btn-group-justified" role="group" aria-label="group button">--}}
            {{--<div class="btn-group" role="group">--}}
            {{--<button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close</button>--}}
            {{--</div>--}}
            {{--<div class="btn-group btn-delete hidden" role="group">--}}
            {{--<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"--}}
            {{--role="button">Delete--}}
            {{--</button>--}}
            {{--</div>--}}
            {{--<div class="btn-group" role="group">--}}
            {{--<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save"--}}
            {{--role="button">Save--}}
            {{--</button>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>