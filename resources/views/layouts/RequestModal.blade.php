{{--<div class="center">--}}
{{--<button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Click Me</button>--}}
{{--</div>--}}
<!-- line modal -->
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">{{ __('interface.register') }}</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form id="requestForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">{{ __('interface.fullname') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('interface.fullname') }}"
                               required name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('interface.phone') }}</label>
                        <input type="text" class="form-control" id="phone" placeholder="{{ __('interface.phone') }}"
                               required name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" required name="email">
                    </div>
                    {{--<div class="form-group">--}}
                    {{--<label for="password">Password</label>--}}
                    {{--<input type="password" class="form-control" id="password" placeholder="Password">--}}
                    {{--</div>--}}
                    <div class="login">
                        <button type="submit" class="btn">{{ __('interface.register') }}</button>
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