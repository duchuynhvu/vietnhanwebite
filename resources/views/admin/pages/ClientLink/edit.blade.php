@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.clientlink') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/links') }}">{{ __('admin.clientlink') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.edit') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/links') }}">
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
                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form method="post" action="{{ url('/links') }}/{{ $link->id }}"
                                  enctype="multipart/form-data"
                                  files="true">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material{{ $errors->has('name') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           required value="{{ $link->name }}"/>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('link') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="Link" required
                                           value="{{ $link->link }}">
                                    @if ($errors->has('link'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <img src="{{ asset('/uploads/links') }}/{{ $link->logo }}"
                                     style="width: 400px; margin-bottom: 20px">
                                <div class="form-group form-material{{ $errors->has('logo') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Logo</label>
                                    <input type="file" id="input-file-now" data-plugin="dropify" name="logo"
                                           accept="image/*"/>
                                    <p>{{ __('admin.acceptimage') }}</p>
                                    @if ($errors->has('logo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                            </form>
                            <form method="post" action="{{ url('/links') }}/{{ $link->id }}"
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
@endsection