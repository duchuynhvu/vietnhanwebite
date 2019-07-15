@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.pageinfo') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/page-info') }}">{{ __('admin.pageinfo') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.edit') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/page-info') }}">
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
                            <form method="post" action="{{ url('/admin/page-info') }}/{{ $page->page }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material{{ $errors->has('title') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.title') }}</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title"
                                           value="{{ $page->title }}"/>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('description') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.description') }}</label>
                                    <input type="text" name="description" class="form-control" placeholder="Description"
                                           value="{{ $page->description }}"/>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('keyword') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.keyword') }}</label>
                                    <input type="text" name="keyword" class="form-control" placeholder="Keyword"
                                           value="{{ $page->keyword }}"/>
                                    @if ($errors->has('keyword'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keyword') }}</strong>
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