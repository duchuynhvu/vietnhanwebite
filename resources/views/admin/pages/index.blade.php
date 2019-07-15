@extends('admin.layouts.master')
@section('page')
    <div class="page">
        <div class="page-content container-fluid">
            <div class="col-xl-3 col-md-6 col-xs-12 info-panel">
                <div class="card card-shadow">
                    <div class="card-block bg-white p-20">
                        <button type="button" class="btn btn-floating btn-sm btn-warning">
                            <i class="icon wb-envelope-open"></i>
                        </button>
                        <a href="{{ url('/admin/contact-requests') }}">
                            <span class="m-l-15 font-weight-400">CONTACT</span>
                        </a>
                        <div class="content-text text-xs-center m-b-0">
                            <i class="text-danger icon wb-triangle-up font-size-20">
                            </i>
                            <span class="font-size-40 font-weight-100">{{ $contacts }}</span>
                            <p class="blue-grey-400 font-weight-100 m-0">new contact requests</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h4 class="text-uppercase">{{ __('admin.newpost') }}</h4>
                @foreach($news as $item)
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"><a href="{{ url('/admin/news') }}/{{ $item->id }}/edit">{{ $item->showTitle() }}</a></h4>
                            <div class="card-text">{{ $item->showDescription() }}</div>
                        </div>
                        <div class="card-footer card-footer-transparent card-footer-bordered text-muted">
                            {{ $item->created_at }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop