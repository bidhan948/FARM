@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को सरकारी तथा गैरसरकारी विवरण हेर्नुहोस्')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-center">{{ $land_owner->name_nepali . 'को सरकारी तथा गैरसरकारी विवरण' }}</p>
                </div>
                <div class="col-12 my-1 text-center d-flex justify-content-center">
                    <button onclick="return window.print();" class="d-print-none btn-sm btn btn-primary">
                        <i class="fas fa-print px-1"></i>{{ __('प्रिन्ट गर्नुहोस्') }}</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="text-center"><strong>{{ __('सरकारी तथा गैरसरकारी विवरण') }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <hr class="w-100 my-1">
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र.सं') }}</th>
                                    <th class="text-center">{{ __('विवरण') }}</th>
                                    <th class="text-center">{{ __('छ/छैन') }}</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facility_details as $key => $facility_detail)
                                    <tr>
                                        <td class="text-center">{{ Nepali($key + 1) }}</td>
                                        <td class="text-center">{{ $facility_detail->Facility->name }}</td>
                                        <td class="text-center">{{ $facility_detail->is_facility ? 'छ' : 'छैन' }}</td>
                                        <td class="text-center">
                                            {{ $facility_detail->anudanDetail == null ? '' : $facility_detail->anudanDetail->anudan_detail }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-bordered mt-4">
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ __('सहयोगी संस्थाको नाम') }}</td>
                                    <td class="text-center">
                                        @foreach ($helping_organization_details as $helping_organization_detail)
                                            {{$helping_organization_detail->helpingOrganization->name , ","}}
                                        @endforeach
                                    </td>
                                </tr>
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
