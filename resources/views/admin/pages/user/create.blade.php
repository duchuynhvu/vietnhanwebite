@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.user') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">{{ __('admin.user') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.addnew') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/users') }}">
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                    <span class="hidden-sm-down">{{ __('admin.back') }}</span>
                </a>
            </div>
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
                            <form method="post" action="{{ url('/admin/users') }}">
                                {{ csrf_field() }}
                                <div class="form-group form-material{{ $errors->has('name') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           required/>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('email') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                           required/>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('password') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.pass') }}</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                           required/>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.confirm') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="Password Confirmation"
                                           required/>
                                </div>
                                <div class="form-group form-material"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.role') }}</label>
                                    <select name="role" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="0">Mod</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.addnew') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection