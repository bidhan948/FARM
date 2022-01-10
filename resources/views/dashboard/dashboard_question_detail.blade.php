@extends('layouts.main')
@section('title', 'बारम्बार सोधिने प्रश्नहरु')
@section('main_content')
    <div class="card text-sm p-3 text-center">
        <div class="row">
            <div class="col-12">
                <h5 class="font-weight-bold">{{ $crop_type->name }}</h5>
            </div>
            @foreach ($crops->Crop as $crop)
                <div class="col-md-4 col-12 mt-4">
                    <a href="{{ route('dashboard.question_crop', $crop) }}"
                        class="btn btn-outline-primary px-5 rounded-pill">{{ $crop->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
