@extends('layouts.main')
@section('title', 'हाम्रो बारेमा')
@section('main_content')
<div class="card text-sm p-3 text-center">
    <div class="row">
        <div class="col-12">
            {!! $aboutus->about_us ?? '' !!}
        </div>
    </div>
</div>
@endsection
