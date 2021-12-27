@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को पशु विवरण हेर्नुहोस्')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-center">{{ $land_owner->name_nepali . 'को पशु विवरण' }}</p>
                </div>
                <div class="col-12 my-1 text-center d-flex justify-content-center">
                    <button onclick="return window.print();" class="d-print-none btn-sm btn btn-primary">
                        <i class="fas fa-print px-1"></i>{{__('प्रिन्ट गर्नुहोस्')}}</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="text-center"><strong>{{ __('पशु तथ्याङ्ग') }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र.सं') }}</th>
                                    <th class="text-center">{{ __('पशु विवरण') }}</th>
                                    <th class="text-center">{{ __('स्रोत') }}</th>
                                    <th class="text-center">{{ __('कुल संख्या') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animal_details as $key => $animal_detail)
                                    <tr>
                                        <td class="text-center">{{ Nepali($key + 1) }}</td>
                                        <td class="text-center">{{ $animal_detail->Animal->name }}</td>
                                        <td class="text-center">{{ $animal_detail->Source->name }}</td>
                                        <td class="text-center">{{ Nepali($animal_detail->total) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="text-center"><strong>{{ __('पशुजन्य उत्पादन') }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र.सं') }}</th>
                                    <th class="text-center">{{ __('पशु विवरण') }}</th>
                                    <th class="text-center">{{ __('मात्रा') }}</th>
                                    <th class="text-center">{{ __('इकाई') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animal_product_details as $key => $animal_product_detail)
                                    <tr>
                                        <td class="text-center">{{ Nepali($key + 1) }}</td>
                                        <td class="text-center">{{ $animal_product_detail->Animal->name }}</td>
                                        <td class="text-center">{{ Nepali($animal_product_detail->production) }}</td>
                                        <td class="text-center">{{ $animal_product_detail->Unit->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="text-center"><strong>{{ __('पशु चौपाया बिमा') }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('बिमा गरिएको मिति') }}</th>
                                    <th class="text-center">{{ __('बिमा सकिएको मिति') }}</th>
                                    <th class="text-center">{{ __('बिमा रकम') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animal_other_details as $key => $animal_other_detail)
                                    <tr>
                                        <td class="text-center">{{ Nepali($animal_other_detail->insurance_start_date) }}</td>
                                        <td class="text-center">{{ Nepali($animal_other_detail->insurance_end_date) }}</td>
                                        <td class="text-center">{{ Nepali($animal_other_detail->insurance_amount)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="my-2" style="width: 100%">
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
