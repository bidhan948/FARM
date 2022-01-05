@extends('layouts.main')
@section('title', 'कृषि तथा पशुपन्छि सम्बन्धि आधारभूत जानकारी')
@section('main_content')
    <div class="card text-sm p-3 text-center">
        <div class="row">
            @foreach ($agriculture_animal_details as $agriculture_animal_detail)
                <div class="col-md-4 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon">
                            <a href="{{ asset($agriculture_animal_detail->getFeaturedImage()) }}" target="_blank"><img
                                    src="{{ asset($agriculture_animal_detail->getFeaturedImage()) }}" alt="" width="100"
                                    height="100"></a></span>
                        <div class="info-box-content">
                            <span class="info-box-text mt-2 mx-1">{{ $agriculture_animal_detail->title }}</span>
                            <span class="info-box-number mt-2"><a
                                    href="{{ route('dashboard.agriculture_animal', $agriculture_animal_detail) }}"
                                    class="text-dark mx-1">हेर्नुहोस् <i
                                        class="fas fa-arrow-circle-right px-1"></i></a></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
