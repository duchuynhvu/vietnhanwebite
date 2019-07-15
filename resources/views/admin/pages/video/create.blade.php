@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Videos</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/videos') }}">Videos</a></li>
                <li class="breadcrumb-item active">{{ __('admin.addnew') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/videos') }}">
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
                            <form method="post" action="{{ url('/videos') }}">
                                {{ csrf_field() }}
                                <div class="form-group form-material" data-plugin="formMaterial">
                                    <label class="form-control-label">Youtube iframe</label>
                                    <input type="text" class="form-control" name="youtube" required/>
                                    <p>Paste here youtube iframe code</p>
                                </div>
                                <div class="form-group form-material{{ $errors->has('page') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.page') }}</label>
                                    <select name="page" class="form-control">
                                        <option value="">Do not publish</option>
                                        <option value="home">Homepage</option>
                                        <option value="about">About</option>
                                        <option value="product">Product</option>
                                    </select>
                                    @if ($errors->has('page'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('page') }}</strong>
                                        </span>
                                    @endif
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