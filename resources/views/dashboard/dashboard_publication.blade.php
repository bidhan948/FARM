@extends('layouts.main')
@section('title', 'प्रकाशन')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class=" col-12">
                    <h5 class="font-weight-bold">{{ __('प्रकाशनहरु') }}</h5>
                </div>
                <div class="col-12 mt-2">
                    <p>{{ __('जम्मा प्रकाशन : ') . Nepali($publications->count()) }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($publications as $publication)
                <h5 class="text-center font-weight-bold font-16">{{ $publication->title }}</h5>
                <div class="card mt-2 p-3">
                    <a href="{{ route('dashboard.publication.download', $publication) }}"
                        class="text-danger text-center font-weight-bold font-12">{{ $publication->sub_title }}</a>
                </div>
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
@endsection
