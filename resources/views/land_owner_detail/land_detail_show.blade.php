@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को जग्गाको विवरण')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ $land_owner->name_nepali . 'को जग्गाको विवरण' }}</p>
                </div>
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <button class="btn btn-sm btn-primary float-right d-print-none" onclick="window.print();"><i
                            class="fas fa-print px-1"></i>{{ __('प्रिन्ट गर्नुहोस्') }}</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            <h5 class="text-center my-3 font-weight-bold">{{ $land_owner->name_nepali . 'को जग्गाको विवरण' }}</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">{{ __('कित्ता नं') }}</th>
                        <th class="text-center">{{ $land_owner->landDetail[0]->region_id == 1 ? 'बिघाहा' : 'रोपनी' }}
                        </th>
                        <th class="text-center">{{ $land_owner->landDetail[0]->region_id == 1 ? 'कठ्ठा' : 'आना' }}</th>
                        <th class="text-center">{{ $land_owner->landDetail[0]->region_id == 1 ? 'धुर' : 'पैसा' }}</th>
                        @if ($land_owner->landDetail[0]->region_id == 2)
                            <th class="text-center">{{ 'दाम' }}</th>
                        @endif
                        <th class="text-center">{{ __('बर्ग मिटर') }}</th>
                        <th class="text-center">{{ __('बझों') }}</th>
                        <th class="text-center">{{ __('चरण खर्क') }}</th>
                        <th class="text-center">{{ __('कैफियत') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($land_owner->landDetail as $landDetail)
                        <tr>
                            <td class="text-center">{{ $landDetail->landType->name }}</td>
                            <td class="text-center">{{ Nepali($landDetail->kitta_no) }}</td>
                            <td class="text-center">{{ Nepali($landDetail->area1 ?? '--') }}</td>
                            <td class="text-center">{{ Nepali($landDetail->area2 ?? '--') }}</td>
                            <td class="text-center">{{ Nepali($landDetail->area3 ?? '--') }}</td>
                            @if ($land_owner->landDetail[0]->region_id == 2)
                                <td class="text-center">{{ Nepali($landDetail->area4 ?? '--') }}</td>
                            @endif
                            <td class="text-center">{{ Nepali($landDetail->bargha_area ?? '--') }}</td>
                            <td class="text-center">{!! $landDetail->is_bajho ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}</td>
                            <td class="text-center">{!! $landDetail->is_charan_kharka ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}</td>
                            <td class="text-center">{{ $landDetail->remark ?? '--'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr class="w-100">

            <table class="table table-bordered table-striped my-4">
                <tbody>
                    <tr>
                        <td class="text-center">{{ __('खेति योग्य क्षेत्र') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->landDetail[0]->cultivable_area) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('खेति गरिएको क्षेत्रफल') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->landDetail[0]->cultivated_area) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('कुल क्षेत्रफल') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->landDetail[0]->total_area) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('सिचाईको सुबिधा') }}</td>
                        <td class="text-center">
                            {{ Nepali($land_owner->landDetail[0]->irrigation_facility ? 'रहेको' : 'नरहेको') }}</td>
                    </tr>
                    @if ($land_owner->landDetail[0]->irrigation_facility)
                        <tr>
                            <td class="text-center">{{ __('सिंचित क्षेत्रफल') }}</td>
                            <td class="text-center">{{ Nepali($land_owner->landDetail[0]->irrigation_area) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('अ-सिंचित क्षेत्रफल') }}</td>
                            <td class="text-center">{{ Nepali($land_owner->landDetail[0]->unirrigation_area) }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="text-center">{{ __('सिचाईको प्रकार') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->landDetail[0]->irrigationType->name) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('सडकको सुबिधा') }}</td>
                        <td class="text-center">
                            {{ Nepali($land_owner->landDetail[0]->road_facility ? 'रहेको' : 'नरहेको') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
