@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.category') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/news-categories') }}">{{ __('admin.category') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.addnew') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/news-categories') }}">
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
                            <form method="post" action="{{ url('/news-categories') }}">
                                {{ csrf_field() }}
                                <div class="nav-tabs-horizontal nav-tabs-inverse" data-plugin="tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-toggle="tab"
                                               href="#VITab"
                                               role="tab">VI</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-toggle="tab" href="#ENTab"
                                               role="tab">EN</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content p-20">
                                        <div class="tab-pane active" id="VITab" role="tabpanel">
                                            <div class="form-group form-material{{ $errors->has('name') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.name') }}</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Category Name"
                                                       required/>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ENTab" role="tabpanel">
                                            <div class="form-group form-material{{ $errors->has('name-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.name') }}</label>
                                                <input type="text" name="name-en" class="form-control"
                                                       placeholder="English Name"/>
                                                @if ($errors->has('name-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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