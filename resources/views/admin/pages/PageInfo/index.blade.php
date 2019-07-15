@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.pageinfo') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ __('admin.pageinfo') }}</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="example-wrap">
                                <div class="example table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{ __('admin.page') }}</th>
                                            <th>{{ __('admin.title') }}</th>
                                            <th>{{ __('admin.description') }}</th>
                                            <th>{{ __('admin.keyword') }}</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($pages as $item)
                                            <tr>
                                                <td>{{ $item->showNamePage($item->page) }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->keyword }}</td>
                                                <td><a class="btn btn-default"
                                                       href="{{ url('/admin/page-info') }}/{{ $item->page }}/edit">{{ __('admin.edit') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection