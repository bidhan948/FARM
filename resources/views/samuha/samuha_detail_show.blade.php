@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को समूह / सहकारी / फारम विवरण हेर्नुहोस')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-center">{{ $land_owner->name_nepali . 'को समूह / सहकारी / फारम विवरण' }}</p>
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
                            <p class="text-center"><strong>{{ __('समूह / सहकारी / फारम विवरण') }}</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <!------------------------------------------------------------this is a bibaran of samuha--------------------------------------------------------->
                        <hr class="w-100 my-1">
                        <div class="col-12 mb-3">
                            <h5 class="text-center font-weight-bold">
                                {{ __('कृषि तथा पशुपालन सक्रिय प्रदायक समूह आबद्ध विवरण') }}</h5>
                        </div>
                        <table class="table table-bordered my-2">
                            <tbody>
                                @foreach ($agriculture_samuhas as $agriculture_samuha)
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('समुहको नाम') }}</td>
                                        <td class="text-center">{{ $agriculture_samuha->samuha_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पान नं') }}</td>
                                        <td class="text-center">{{ Nepali($agriculture_samuha->samuha_pan_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('दर्ता नं') }}</td>
                                        <td class="text-center">{{ Nepali($agriculture_samuha->samuha_reg_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('दर्ता मिति') }}</td>
                                        <td class="text-center">{{ Nepali($agriculture_samuha->samuha_issue_date) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold" colspan="2">{{ __('ठेगाना') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('प्रदेश') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_samuha->Province->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('जिल्ला') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_samuha->District->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पालिका') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_samuha->Municipality->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('वडा') }}</td>
                                        <td class="text-center">{{ Nepali($agriculture_samuha->samuha_ward) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('टोल') }}</td>
                                        <td class="text-center">{{ $agriculture_samuha->samuha_toll_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!------------------------------------------------------------this is a bibaran of copertaive(सहकारी )--------------------------------------------------------->
                        <hr class="w-100 my-1">
                        <div class="col-12 my-4">
                            <h5 class="text-center font-weight-bold">
                                {{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक सहकारीमा आबद्ध विवरण') }}</h5>
                        </div>
                        <table class="table table-bordered my-2">
                            <tbody>
                                @foreach ($agriculture_animal_cooperatives as $agriculture_animal_cooperative)
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('सहकारीको नाम') }}</td>
                                        <td class="text-center">
                                            {{ $agriculture_animal_cooperative->cooperative_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पान नं') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->cooperative_pan_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('दर्ता नं') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->cooperative_reg_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('दर्ता मिति') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->cooperative_issue_date) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold" colspan="2">{{ __('ठेगाना') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('प्रदेश') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->Province->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('जिल्ला') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->District->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पालिका') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->Municipality->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('वडा') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_animal_cooperative->cooperative_ward) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('टोल') }}</td>
                                        <td class="text-center">
                                            {{ $agriculture_animal_cooperative->cooperative_toll_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!------------------------------------------------------------this is a bibaran of copertaive(सहकारी )--------------------------------------------------------->
                        <hr class="w-100 my-1">
                        <div class="col-12 my-4">
                            <h5 class="text-center font-weight-bold">
                                {{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक कृषि फारममा आबद्ध विवरण') }}</h5>
                        </div>
                        <table class="table table-bordered my-2">
                            <tbody>
                                @foreach ($agriculture_farms as $agriculture_farm)
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('सहकारीको नाम') }}</td>
                                        <td class="text-center">
                                            {{ $agriculture_farm->farm_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पान नं') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->farm_pan_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('दर्ता नं') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->farm_reg_no) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('दर्ता मिति') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->farm_issue_date) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold" colspan="2">{{ __('ठेगाना') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('प्रदेश') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->Province->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('जिल्ला') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->District->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('पालिका') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->Municipality->NepaliName) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('वडा') }}</td>
                                        <td class="text-center">
                                            {{ Nepali($agriculture_farm->farm_ward) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ __('टोल') }}</td>
                                        <td class="text-center">
                                            {{ $agriculture_farm->farm_toll_name }}</td>
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
