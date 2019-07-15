@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.contactrequest') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/contact-requests') }}">{{ __('admin.contactrequest') }}</a></li>
                <li class="breadcrumb-item active">{{ __('admin.detail') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/contact-requests') }}">
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
                            <ul>
                                <li>Name: {{ $contact->name }}</li>
                                <li>Phone: {{ $contact->phone }}</li>
                                <li>Email: {{ $contact->email }}</li>
                            </ul>
                            <label>Message</label>
                            <div class="contact-message">{{ $contact->message }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection