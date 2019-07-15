@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Home Accordions</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">{{ __('admin.about') }}</li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/home-accordions') }}">Home Accordions</a></li>
                <li class="breadcrumb-item active">{{ __('admin.addnew') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/home-accordions') }}">
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
                            <form method="post" action="{{ url('/admin/home-accordions') }}">
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
                                            <div class="form-group form-material{{ $errors->has('title') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.title') }}</label>
                                                <input type="text" name="title" class="form-control" placeholder="Title"
                                                       required/>
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('description') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.description') }}</label>
                                                <textarea name="description" class="form-control" rows="7"
                                                          required></textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ENTab" role="tabpanel">
                                            <div class="form-group form-material{{ $errors->has('title-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.title') }}</label>
                                                <input type="text" name="title-en" class="form-control"
                                                       placeholder="English Title"/>
                                                @if ($errors->has('title-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('description-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.description') }}</label>
                                                <textarea name="description-en" class="form-control"
                                                          rows="7"></textarea>
                                                @if ($errors->has('description-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description-en') }}</strong>
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