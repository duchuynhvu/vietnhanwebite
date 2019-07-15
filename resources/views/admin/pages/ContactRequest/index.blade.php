@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.contactrequest') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ __('admin.contactrequest') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-danger btn-outline btn-round" id="delete-button" href="#">
                    <i class="icon wb-trash" aria-hidden="true"></i>
                    <span class="hidden-sm-down">{{ __('admin.delete') }}</span>
                </a>
            </div>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div id="jsGrid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="database" value="/admin/contact-requests">
@endsection