@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.introduce') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">{{ __('admin.product') }}</li>
                <li class="breadcrumb-item active">{{ __('admin.introduce') }}</li>
            </ol>
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
                            <div class="alert alert-info">
                                {{ __('admin.lastupdate') }}: {{ $intro->updated_at }}
                            </div>
                            <form method="post" action="{{ url('/introduce/update') }}" enctype="multipart/form-data"
                                  files="true">
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
                                            <div class="form-group form-material{{ $errors->has('introduce') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.introduce') }}</label>
                                                <textarea data-plugin="summernote" name="introduce"
                                                          required>{{ $intro->introduce }}</textarea>
                                                @if ($errors->has('introduce'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('introduce') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('founder') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.founder') }}</label>
                                                <input type="text" name="founder" class="form-control"
                                                       placeholder="Founder"
                                                       value="{{ $intro->founder }}"/>
                                                @if ($errors->has('founder'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('founder') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('stated') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.stated') }}</label>
                                                <textarea class="form-control" rows="7" name="stated"
                                                          required>{{ $intro->stated }}</textarea>
                                                @if ($errors->has('stated'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('stated') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <img src="{{ asset('/uploads/introduce') }}/{{ $intro->image }}"
                                                 style="width: 400px; margin-bottom: 20px">
                                            <div class="form-group form-material" data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.image') }}</label>
                                                <input type="file" id="input-file-now" data-plugin="dropify"
                                                       name="image"
                                                       accept="image/*"/>
                                                <p>{{ __('admin.acceptimage') }}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ENTab" role="tabpanel">
                                            <div class="form-group form-material{{ $errors->has('introduce-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.introduce') }}</label>
                                                <textarea data-plugin="summernote"
                                                          name="introduce-en">{{ $intro->introduce_en }}</textarea>
                                                @if ($errors->has('introduce-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('introduce-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('founder-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.founder') }}</label>
                                                <input type="text" name="founder-en" class="form-control"
                                                       placeholder="English Founder"
                                                       value="{{ $intro->founder_en }}"/>
                                                @if ($errors->has('founder-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('founder-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-material{{ $errors->has('stated-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">{{ __('admin.stated') }}</label>
                                                <textarea class="form-control" rows="7" name="stated-en">{{ $intro->stated_en }}</textarea>
                                                @if ($errors->has('stated-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('stated-en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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