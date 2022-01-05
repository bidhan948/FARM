@extends('layouts.main')
@section('title', 'हाम्रो बारेमा')
@section('main_content')
    <style>
        .card-body {
            overflow-x: scroll !important;
        }

    </style>
    <div class="card text-sm p-3 text-left">
        <div class="row">
            <div class="col-12">
                <div id="accordion">
                    @foreach ($pages as $key => $page)
                        @foreach ($parents as $parent)
                            @if ($page->page_id == $parent->id)
                                <h5 class="font-weight-bold">{{ $parent->title }}</h5>
                            @endif
                        @endforeach
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn" data-toggle="collapse"
                                        data-target="#collapseOne{{ $page->id }}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $page->title }}
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne{{ $page->id }}" class="collapse " aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    {!! $page->long_desc !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
