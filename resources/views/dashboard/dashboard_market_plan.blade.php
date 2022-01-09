@extends('layouts.main')
@section('title', 'ब्यबसायिक योजना बनाउन जान्नु पर्ने आधारभूत जानकारी')
@section('main_content')
    @include('include.accordion')
    <div class="card mt-4 text-sm p-3 text-left">
        <div class="row mt-4">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 my-2">
                            @foreach ($market_plan_details as $key => $market_plan_detail)
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseOne{{ $key + 1 }}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    {{ $market_plan_detail->title }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne{{ $key + 1 }}" class="panel-collapse collapse in"
                                            role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                {!! $market_plan_detail->description !!}
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

