@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.user') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">{{ __('admin.user') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.edit') }}</li>
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
                            @if ($errors->has('password'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                            <form method="post" action="{{ url('/admin/users') }}/{{ $user->id }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material{{ $errors->has('name') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
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
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                           required/>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.pass') }}</label>
                                    <a href="#" class="form-control" data-target="#passwordModal"
                                       data-toggle="modal">{{ __('admin.changepass') }}</a>
                                </div>
                                <div class="form-group form-material"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.role') }}</label>
                                    <select name="role" class="form-control">
                                        @if($user->role == 1)
                                            <option value="1" selected>Admin</option>
                                            <option value="0">Mod</option>
                                        @else
                                            <option value="1">Admin</option>
                                            <option value="0" selected>Mod</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                            </form>
                            <form method="post" action="{{ url('/admin/users') }}/{{ $user->id }}"
                                  style="margin-top: 30px">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="passwordModal" aria-hidden="false">
        <div class="modal-dialog">
            <form class="modal-content" method="post"
                  action="{{ url('/admin/users/change-password') }}/{{ $user->id }}">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ __('admin.changepass') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="password" placeholder="{{ __('admin.newpass') }}"
                                   required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="{{ __('admin.confirm') }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection