@extends('layouts.main')
@section('title', 'हाम्रो बारेमा')
@section('main_content')
<div class="card text-sm p-3 text-center">
    <div class="row">
        <div class="col-12">
            <h2 class="font-weight-bold text-danger">{{config('constant.SITE_MUN_NAME')}}</h2>
            <h4 class="font-weight-bold text-danger mt-3">{{config('constant.SITE_MUN_NAME')}}</h4>
            <h3 class="font-weight-bold text-danger mt-3">{{config('constant.DISTRICT')}}</h3>
            <h5 class="font-weight-bold text-danger mt-3">{{config('constant.SITE_PROVINCE')}}</h5>
            <p class="mt-3 text-center font-weight-bold">{{__('सम्पर्क फोन')}} :</p>
            <p class="mt-2 text-center">{{__('इमेल')}} :</p>
        </div>
    </div>
</div>
@endsection
