@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Home Accordions</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">{{ __('admin.about') }}</li>
                <li class="breadcrumb-item active">Home Accoirdions</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/home-accordions/create') }}">
                    <i class="icon wb-plus" aria-hidden="true"></i>
                    <span class="hidden-sm-down">{{ __('admin.addnew') }}</span>
                </a>
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
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <div class="example-wrap">
                                <div class="example table-responsive">
                                    <table class="table table-bordered" data-plugin="selectable" data-row-selectable="true">
                                        <thead>
                                        <tr>
                                            <th>
                                                <span class="checkbox-custom checkbox-primary">
                                                    <input class="selectable-all" type="checkbox">
                                                    <label></label>
                                                </span>
                                            </th>
                                            <th>#</th>
                                            <th>{{ __('admin.title') }}</th>
                                            <th>{{ __('admin.createdat') }}</th>
                                            <th>{{ __('admin.updatedat') }}</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($accordions as $key => $item)
                                            <tr>
                                                <td>
                                                    <span class="checkbox-custom checkbox-primary">
                                                        <input class="selectable-item" name="del"
                                                               value="{{ $item->id }}" type="checkbox">
                                                        <label></label>
                                                    </span>
                                                </td>
                                                <td>{{ ($accordions->currentpage()-1) * $accordions->perpage() + $key + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td><a class="btn btn-default" href="{{ url('/admin/home-accordions') }}/{{ $item->id }}/edit">{{ __('admin.edit') }}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $accordions->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="database" name="_token" value="/admin/home-accordions">
@endsection