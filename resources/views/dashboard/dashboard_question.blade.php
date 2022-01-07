@extends('layouts.main')
@section('title', 'बारम्बार सोधिने प्रश्नहरु ')
@section('main_content')
    <div class="card text-sm p-3 text-center">
        <div class="row">
            @foreach ($crop_types as $crop_type)
                <div class="col-md-4 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon">
                            <a href="{{ asset($crop_type->getImage()) }}" target="_blank"><img
                                    src="{{ asset($crop_type->getImage()) }}" alt="" width="100"
                                    height="100"></a></span>
                        <div class="info-box-content">
                            <span class="info-box-text mt-2 mx-1">{{ $crop_type->name }}</span>
                            <span class="info-box-number mt-2"><a
                                    href="{{ route('dashboard.question_detail', $crop_type) }}"
                                    class="text-dark mx-1">हेर्नुहोस् <i
                                        class="fas fa-arrow-circle-right px-1"></i></a></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
