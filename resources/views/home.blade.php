@extends('layouts.main')
@section('title', 'Dashboard')
@section('main_content')
    <div class="row mt-2">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/about.png') }}" alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('हाम्रो बारेमा') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.about_us') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
