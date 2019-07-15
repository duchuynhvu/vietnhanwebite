@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Videos</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/videos') }}">Video</a></li>
                <li class="breadcrumb-item active">{{ __('admin.edit') }}</li>
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
                            <form method="post" action="{{ url('/videos') }}/{{ $video->id }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material" id="youtube-link" data-plugin="formMaterial">
                                    <label class="form-control-label">Youtube iframe</label>
                                    <input type="text" class="form-control" name="youtube" value="{{ $video->video }}"
                                           required/>
                                    <p>Paste here youtube iframe code</p>
                                </div>
                                <div class="form-group form-material{{ $errors->has('page') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.page') }}</label>
                                    <select name="page" class="form-control">
                                        @if($video->page == "")
                                            <option value="" selected>Do not publish</option>
                                            <option value="home">Homepage</option>
                                            <option value="about">About</option>
                                            <option value="product">Product</option>
                                        @elseif($video->page == 'home')
                                            <option value="">Do not publish</option>
                                            <option value="home" selected>Homepage</option>
                                            <option value="about">About</option>
                                            <option value="product">Product</option>
                                        @elseif($video->page == 'about')
                                            <option value="">Do not publish</option>
                                            <option value="home">Homepage</option>
                                            <option value="about" selected>About</option>
                                            <option value="product">Product</option>
                                        @else
                                            <option value="">Do not publish</option>
                                            <option value="home">Homepage</option>
                                            <option value="about">About</option>
                                            <option value="product" selected>Product</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('page'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('page') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                            </form>
                            <form method="post" action="{{ url('/videos') }}/{{ $video->id }}" style="margin-top: 30px">
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