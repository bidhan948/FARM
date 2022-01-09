@extends('layouts.main')
@section('title', $crop->cropType->name . ' -' . $crop->name)
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-center">{{ $crop->cropType->name . ' -' . $crop->name }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body text-center">
            @foreach ($agriculture_technologies as $agriculture_technology)
                <div class="col-md-12 col-12 mt-4">
                    <a href="{{ route('dashboard.agriculture_technology_download', $agriculture_technology->document) }}"
                        class="font-12">{{ $agriculture_technology->title }}</a>
                </div>
                <div class="col-12 mt-2">
                    <span class="font-11">Author: {{ $agriculture_technology->author }}</span>
                </div>
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
@endsection
