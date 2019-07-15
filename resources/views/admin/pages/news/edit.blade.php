@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.news') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/news') }}">{{ __('admin.news') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.edit') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/news') }}">
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
                            <form method="post" action="{{ url('/admin/news') }}/{{ $news->id }}"
                                  enctype="multipart/form-data" files="true">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
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
                                                       value="{{ $news->title }}"
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
                                                <input type="text" name="description" class="form-control"
                                                       placeholder="Description"
                                                       value="{{ $news->description }}"
                                                       required/>
                                                @if($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.category') }}</label>
                                                <select name="category" class="form-control">
                                                    @foreach($categories as $item)
                                                        @if($item->id == $news->category_id)
                                                            <option value="{{ $item->id }}"
                                                                    selected>{{ $item->name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('admin.content') }}</label>
                                                <textarea data-plugin="summernote" name="content"
                                                          required>{{ $news->content }}</textarea>
                                            </div>
                                            <img src="{{ asset('/uploads/news') }}/{{ $news->image }}"
                                                 style="width: 400px; margin-bottom: 20px">
                                            <div class="form-group form-material{{ $errors->has('image') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.image') }}</label>
                                                <input type="file" id="input-file-now" data-plugin="dropify"
                                                       name="image"
                                                       accept="image/*"/>
                                                <p>{{ __('admin.acceptimage') }}</p>
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material" data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.publish') }}</label>
                                                @if ($news->publish == 1)
                                                    <input type="checkbox" name="publish" data-plugin="switchery"
                                                           value="1"
                                                           checked/>
                                                @else
                                                    <input type="checkbox" name="publish" data-plugin="switchery"/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ENTab" role="tabpanel">
                                            <div class="form-group form-material{{ $errors->has('title-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.title') }}</label>
                                                <input type="text" name="title-en" class="form-control"
                                                       placeholder="English Title"
                                                       value="{{ $news->title_en }}"/>
                                                @if ($errors->has('title-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('description-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.description') }}</label>
                                                <input type="text" name="description-en" class="form-control"
                                                       placeholder="English Description"
                                                       value="{{ $news->description_en }}"/>
                                                @if($errors->has('description-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('admin.content') }}</label>
                                                <textarea data-plugin="summernote"
                                                          name="content-en">{{ $news->content_en }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                            </form>
                            <form method="post" action="{{ url('/admin/news') }}/{{ $news->id }}"
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