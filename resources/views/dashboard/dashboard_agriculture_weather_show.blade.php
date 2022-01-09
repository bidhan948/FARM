@extends('layouts.main')
@section('title','कृषि - मौसम सल्लाह बुलेटिन')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ $agriculture_weather->title}}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! $agriculture_weather->long_desc !!}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
