@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">{{ __('admin.user') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ __('admin.user') }}</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ url('/admin/users/create') }}">
                    <i class="icon wb-plus" aria-hidden="true"></i>
                    <span class="hidden-sm-down">{{ __('admin.addnew') }}</span>
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
                                    <table class="table table-bordered" data-plugin="selectable"
                                           data-row-selectable="true">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('admin.name') }}</th>
                                            <th>Email</th>
                                            <th>{{ __('admin.role') }}</th>
                                            <th>{{ __('admin.createdat') }}</th>
                                            <th>{{ __('admin.updatedat') }}</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $key => $item)
                                            <tr>
                                                <td>{{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                @if($item->role == 1)
                                                    <td>Admin</td>
                                                @else
                                                    <td>Mod</td>
                                                @endif
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td><a class="btn btn-default"
                                                       href="{{ url('/admin/users') }}/{{ $item->id }}/edit">{{ __('admin.edit') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection