@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को उधम्शिलता विवरण विवरण हेर्नुहोस्')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-center">{{ $land_owner->name_nepali . 'को पशु विवरण' }}</p>
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
                            <p class="text-center"><strong>{{ __('उधम्शिलता विवरण') }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($enterpreneurships as $item)
                            <table class="my-2 table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('संस्थाको नाम') }}</td>
                                        <td>{{ $item->organization_name_nepali }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('संस्थाको नाम(IN ENGLISH)') }}</td>
                                        <td>{{ $item->organization_name_nepali }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('संस्थाको प्रकार') }}</td>
                                        <td>{{ $item->organizationType->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('संस्थाको पुंजी') }}</td>
                                        <td>{{ Nepali($item->organization_budget) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पान नं') }}</td>
                                        <td>{{ Nepali($item->pan_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('प्रदेश') }}</td>
                                        <td>{{ Nepali($item->Province->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('जिल्ला') }}</td>
                                        <td>{{ $item->District->NepaliName }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पालिका') }}</td>
                                        <td>{{ $item->Municipality->NepaliName }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('वडा') }}</td>
                                        <td>{{ Nepali($item->ward) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('टोल') }}</td>
                                        <td>{{ $item->toll_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('सम्पर्क व्यक्ति') }}</td>
                                        <td>{{ Nepali($item->contact_person_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('नागरिकता नं') }}</td>
                                        <td>{{ Nepali($item->cit_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('सम्पर्क/मोबाईल नं') }}</td>
                                        <td>{{ Nepali($item->contact_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">
                                            {{ __('खेतीमा संग्लन कर्मचारी संख्या') }}</td>
                                        <td>{{ Nepali($item->no_of_staff_in_field) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पुरा समय रोजगार संख्या') }}</td>
                                        <td>{{ Nepali($item->ot_no_of_staff) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('आम्सिक समय रोजगार संख्या') }}
                                        </td>
                                        <td>{{ Nepali($item->amsik_no_of_staff) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach

                        <hr class="w-100 my-1">
                        <h5 class="text-center font-weight-bold my-3">{{ __('ब्यबसाय लगानी वा आम्दानी') }}</h5>
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र.सं') }}</th>
                                    <th class="text-center">{{ __('ब्यबसाय') }}</th>
                                    <th class="text-center">{{ __('बार्षिक लगानी') }}</th>
                                    <th class="text-center">{{ __('बार्षिक आम्दानी') }}</th>
                                    <th class="text-center">{{ __('कैफियत') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($business_details as $key => $business_detail)
                                    <tr>
                                        <td class="text-center">{{ Nepali($key + 1) }}</td>
                                        <td class="text-center">{{ $business_detail->Business->name }}</td>
                                        <td class="text-center">{{ Nepali($business_detail->yearly_investment) }}</td>
                                        <td class="text-center">{{ Nepali($business_detail->yearly_income) }}</td>
                                        <td class="text-center">{{ $business_detail->remark }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <hr class="w-100 my-1">
                        <h5 class="text-center font-weight-bold my-3">{{ __('आगामी योजनाहरु') }}</h5>
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र.सं') }}</th>
                                    <th class="text-center">{{ __('योजनाको नाम') }}</th>
                                    <th class="text-center">{{ __('योजनाको विवरण') }}</th>
                                    <th class="text-center">{{ __('कैफियत') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($upcoming_plans as $key => $upcoming_plan)
                                    <tr>
                                        <td class="text-center">{{ Nepali($key + 1) }}</td>
                                        <td class="text-center">{{ $upcoming_plan->name }}</td>
                                        <td class="text-center">{{ $upcoming_plan->plan_detail }}</td>
                                        <td class="text-center">{{ $upcoming_plan->remark }}</td>
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
