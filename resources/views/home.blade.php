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
        
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/contact.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('सम्पर्क') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.contact_us') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/notice.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('सूचना') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.notice') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12 mt-3">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/publication.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('प्रकाशन') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.publication') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12 mt-3">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/farmer.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('कृषक विवरण') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.farmer_detail') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12 mt-3">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/farm-animal.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('कृषि तथा पशुपंक्षी सम्बन्धि आधारभुत जानकारी') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.animal_agriculture') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12 mt-3">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/fram-technology.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('कृषि प्रबिधि') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.agriculture_technology') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12 mt-3">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/question.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('बारम्बार सोधिने प्रश्नहरु ') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.question') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12 mt-3">
            <div class="info-box">
                <span class="info-box-icon"><img src="{{ asset('farm/insurance.png') }}" alt=""></span>
                <div class="info-box-content">
                    <span class="info-box-text mt-2 mx-1">{{ __('कृषि तथा पशुपंक्षी बिमा जानकारी') }}</span>
                    <span class="info-box-number mt-2"><a href="{{ route('dashboard.insurance') }}"
                            class="text-dark mx-1">हेर्नुहोस् <i class="fas fa-arrow-circle-right px-1"></i></a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
