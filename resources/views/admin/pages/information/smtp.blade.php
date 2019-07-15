@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.smtpsetting') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ __('admin.smtpsetting') }}</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <div class="alert alert-info">
                                {{ __('admin.lastupdate') }}: {{ $smtp->updated_at }}
                            </div>
                            <form method="post" action="{{ url('/admin/smtp/update') }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material{{ $errors->has('host') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Host</label>
                                    <input type="text" name="host" class="form-control" placeholder="Host"
                                           value="{{ $smtp->host }}" required/>
                                    @if ($errors->has('host'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('host') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('port') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Port</label>
                                    <input type="text" name="port" class="form-control" placeholder="Port"
                                           value="{{ $smtp->port }}"/>
                                    @if ($errors->has('port'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('port') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('encryption') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Encryption</label>
                                    <input type="text" name="encryption" class="form-control" placeholder="Encryption"
                                           value="{{ $smtp->encryption }}" required/>
                                    @if ($errors->has('encryption'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('encryption') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('username') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                           value="{{ $smtp->username }}"/>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('password') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                           value="{{ $smtp->password }}"/>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection