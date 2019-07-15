@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">SEO</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">SEO</li>
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
                                            <th>#</th>
                                            <th>{{ __('admin.news') }}</th>
                                            <th>{{ __('admin.title') }}</th>
                                            <th>{{ __('admin.description') }}</th>
                                            <th>{{ __('admin.keyword') }}</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($news as $key => $item)
                                            <tr>
                                                <td>{{ ($news->currentpage()-1) * $news->perpage() + $key + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->seo->title }}</td>
                                                <td>{{ $item->seo->description }}</td>
                                                <td>{{ $item->seo->keyword }}</td>
                                                <td>
                                                    <a class="btn btn-default"
                                                       href="{{ url('/admin/news-seo') }}/{{ $item->id }}/edit">{{ __('admin.edit') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $news->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection