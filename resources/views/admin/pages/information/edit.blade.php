@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.information') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">{{ __('admin.about') }}</li>
                <li class="breadcrumb-item active">{{ __('admin.information') }}</li>
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
                                {{ __('admin.lastupdate') }}: {{ $info->updated_at }}
                            </div>
                            <form method="post" action="{{ url('/information/update') }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group form-material{{ $errors->has('hotline') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Hotline</label>
                                    <input type="text" name="hotline" class="form-control" placeholder="Hotline"
                                           value="{{ $info->hotline }}" required/>
                                    @if ($errors->has('hotline'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hotline') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('phone') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                                           value="{{ $info->phone }}"/>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('email') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                           value="{{ $info->email }}" required/>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('facebook') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook"
                                           value="{{ $info->facebook }}"/>
                                    @if ($errors->has('facebook'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('twitter') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter"
                                           value="{{ $info->twitter }}"/>
                                    @if ($errors->has('twitter'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('twitter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('youtube') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">Youtube</label>
                                    <input type="text" name="youtube" class="form-control" placeholder="Youtube"
                                           value="{{ $info->youtube }}"/>
                                    @if ($errors->has('youtube'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('youtube') }}</strong>
                                        </span>
                                    @endif
                                </div>
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
                                            <div class="form-group form-material{{ $errors->has('address') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">Address</label>
                                                <input type="text" name="address" class="form-control"
                                                       placeholder="Adress"
                                                       value="{{ $info->address }}" required/>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ENTab" role="tabpanel">
                                            <div class="form-group form-material{{ $errors->has('address-en') ? ' has-error' : '' }}"
                                                 data-plugin="formMaterial">
                                                <label class="form-control-label">Address</label>
                                                <input type="text" name="address-en" class="form-control"
                                                       placeholder="English Adress"
                                                       value="{{ $info->address_en }}"/>
                                                @if ($errors->has('address-en'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('address-en') }}</strong>
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