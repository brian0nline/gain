@extends('admin.layout.primary')
@section('title', $title)

@section('page-title', $title)

@section('panel')
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">{{ $cardHeader }}</h3>
                    </div>
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
