@extends('layouts.main')
@section('title', $agriculture_animal_detail->title . ' विवरण')
@section('main_content')
    @include('include.accordion')
    <div class="card mt-4 text-sm p-3 text-left">
        <div class="row mt-4">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 my-2">
                            @foreach ($pages as $key => $page)
                                <h5 class="font-weight-bold">
                                    @if (!in_array($page->Parent->title, $checkForNotRepeatingParent))
                                        @php
                                            $checkForNotRepeatingParent[] = $page->Parent->title;
                                        @endphp
                                        {{ $page->Parent->title }}
                                    @endif
                                </h5>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseOne{{ $key + 1 }}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    {{ $page->title }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne{{ $key + 1 }}" class="panel-collapse collapse in"
                                            role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                {!! $page->long_desc !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
