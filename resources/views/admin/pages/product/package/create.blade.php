@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.package') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">{{ __('admin.product') }}</li>
                <li class="breadcrumb-item"><a href="{{ url('/packages') }}">{{ __('admin.package') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.addnew') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/packages') }}">
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
                            <form method="post" action="{{ url('/packages') }}">
                                {{ csrf_field() }}
                                <div class="form-group form-material{{ $errors->has('from') ? ' has-error' : '' }}{{  $errors->has('to') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.employee') }}</label>
                                    <input type="number" name="from" class="form-control" placeholder="From"
                                           required/>
                                    @if ($errors->has('from'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('from') }}</strong>
                                        </span>
                                    @endif
                                    <input type="number" name="to" class="form-control" placeholder="To" required/>
                                    <p>{{ __('admin.unlimit') }}</p>
                                    @if ($errors->has('to'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('to') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-material{{ $errors->has('price') ? ' has-error' : '' }}"
                                     data-plugin="formMaterial">
                                    <label class="form-control-label">{{ __('admin.price') }}</label>
                                    <input type="number" name="price" class="form-control" step="0.01" required>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
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