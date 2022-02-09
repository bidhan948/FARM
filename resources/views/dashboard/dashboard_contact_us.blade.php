@extends('layouts.main')
@section('title', 'सम्पर्क')
@section('main_content')
<div class="card text-sm p-3 text-center">
    <div class="row">
        <div class="col-12">
            {!! $contactus->contact_us ?? '' !!}
        </div>
    </div>
</div>
@endsection
