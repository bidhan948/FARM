@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को कृषिको विवरण')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ $land_owner->name_nepali . 'को कृषिको विवरण' }}</p>
                </div>
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <button class="btn btn-sm btn-primary float-right d-print-none" onclick="window.print();"><i class="fas fa-print px-1"></i>{{__('प्रिन्ट गर्नुहोस्')}}</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            @foreach ($crop_types as $crop_type)
                <h5 class="text-center my-3 font-weight-bold">{{ $crop_type->name }}</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('क्र.स.') }}</th>
                            <th class="text-center">{{ __('बाली') }}</th>
                            @foreach ($crop_areas as $crop_area)
                                <th class="text-center">{{ $crop_area->name }}</th>
                            @endforeach
                            <th class="text-center">{{ __('कुल क्षेत्रफल') }}</th>
                            <th class="text-center">{{ __('उत्पादन (किलो)') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agriculture_details as $key => $agriculture_detail)
                            @if ($agriculture_detail->cropType->id == $crop_type->id)
                                <tr>
                                    <td class="text-center">{{ Nepali($key + 1) }}</td>
                                    <td class="text-center">{{ $agriculture_detail->Crop->name }}</td>
                                    <td class="text-center">{{ Nepali($agriculture_detail->area1) }}</td>
                                    <td class="text-center">{{ Nepali($agriculture_detail->area2) }}</td>
                                    <td class="text-center">{{ Nepali($agriculture_detail->area3) }}</td>
                                    <td class="text-center">{{ Nepali($agriculture_detail->area4) }}</td>
                                    <td class="text-center">{{ Nepali($agriculture_detail->total_area) }}</td>
                                    <td class="text-center">{{ Nepali($agriculture_detail->total_production) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <hr class="w-100">
            @endforeach

            <table class="table table-bordered table-striped my-2">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('बीउबिजनको स्रोत') }}</th>
                        <th class="text-center">{{ __('बीउबिजनको प्रदायक') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seed_details as $key => $seed_detail)
                        <tr>
                            <td class="text-center">{{Nepali($key+1)}}</td>
                            <td class="text-center">{{$seed_detail->seedSource->name}}</td>
                            <td class="text-center">{{$seed_detail->seedSupplier->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
