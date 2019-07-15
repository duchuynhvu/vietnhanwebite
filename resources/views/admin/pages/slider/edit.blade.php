@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Slider</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/slider') }}">Slider</a></li>
                <li class="breadcrumb-item active">{{ __('admin.edit') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/slider') }}">
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
                            <img style="width: 400px; margin-bottom: 20px"
                                 src="{{ asset('/uploads/images') }}/{{  $image->image }}">
                            <form method="post" action="{{ url('/slider') }}/{{ $image->id }}"
                                  enctype="multipart/form-data"
                                  files="true">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material{{ $errors->has('image') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.image') }}</label>
                                    <input type="file" id="input-file-now" data-plugin="dropify" name="image"
                                           accept="image/*"/>
                                    <p>{{ __('admin.acceptimage') }}</p>
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material" data-plugin="formMaterial">
                                    <label class="form-control-label">Alt</label>
                                    <input type="text" class="form-control" name="alt"
                                           placeholder="Alt Image" value="{{ $image->alt }}"/>
                                </div>
                                <div class="form-group form-material" data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.publish') }}</label>
                                    @if ($image->publish == 1)
                                        <input type="checkbox" name="publish" data-plugin="switchery" value="1"
                                               checked/>
                                    @else
                                        <input type="checkbox" name="publish" data-plugin="switchery"/>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                            </form>
                            <form method="post" action="{{ url('/slider') }}/{{ $image->id }}" style="margin-top: 30px">
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