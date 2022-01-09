@extends('layouts.main')
@section('title', 'कृषि - मौसम सल्लाह बुलेटिन')
@section('main_content')
    <div class="card text-sm p-3 text-center">
        <div class="row">
            <div class="card-hedaer">
                <h5 class="font-weight-bold my-2 mx-1">
                    कृषि - मौसम सल्लाह बुलेटिन
                </h5>
            </div>
        </div>
        <div class="card-body">
            @foreach ($agriculture_weathers as $agriculture_weather)
                <div class="col-12 my-3">
                    <a href="{{ route('dashboard.agriculture_weather_show', $agriculture_weather) }}"
                        class="font-12 font-weight-bold">{{ $agriculture_weather->title }} (वर्ष :
                        {{ $agriculture_weather->getYear() }}, अंक : {{ $agriculture_weather->getIndex() }})</a>
                    <p class="text-center font-weight-bold my-2 font-11">
                        {{ $agriculture_weather->getDateDesc() . ' , ' . Nepali(date('Y', strtotime($agriculture_weather->dateFromBs))) }}
                    </p>
                    <hr class="w-100 mt-2">
                </div>
            @endforeach
            {{ $agriculture_weathers->links() }}
        </div>
    </div>
@endsection
