@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को समूह / सहकारी / फारम विवरण विवरण हेर्नुहोस्')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-danger text-center">{{ __('कृपया  * चिन्न भएको ठाउँ खाली नछोड्नु होला |') }}</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('facility_detail_store', $land_owner) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h5 class="text-center">
                                        <strong>{{ __('कृषि तथा पशुपालन सक्रिय प्रदायक समूह आबद्ध विवरण') }}</strong>
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('samuha_detail_store', $land_owner) }}" method="post">
                                    <!--------------------------------------------------------------samuha name---------------------------------------------------------------------------->
                                    <div class="col-12 mt-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    {{ __('कृषि तथा पशुपालन सक्रिय प्रदायक समूह आबद्ध') }}
                                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                                </span>
                                            </div>
                                            <select id="samuha_status" name="samuha_status"
                                                class="custom-select select2 @error('samuha_status') is-invalid @enderror">
                                                <option value="">
                                                    {{ __('----छान्नुहोस् ----') }}
                                                </option>
                                                <option value="1">{{ __('रहेको') }}</option>
                                                <option value="0">{{ __('नरहेको') }}</option>
                                            </select>
                                            @error('samuha_status')
                                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                                    {{ __('कृषि तथा पशुपालन सक्रिय प्रदायक समूह आबद्ध फिल्ड खाली छ |') }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="samuha">
                                        <div class="row ">
                                            <hr class="w-100">
                                            <div class="col-6 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('समुहको नाम') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('samuha_name') }}"
                                                        name="samuha_name"
                                                        class="form-control  @error('samuha_name') is-invalid @enderror">
                                                    @error('samuha_name')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('समुहको नामको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('समुहको पान नं') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('samuha_pan_no') }}"
                                                        name="samuha_pan_no"
                                                        class="form-control  @error('samuha_pan_no') is-invalid @enderror">
                                                    @error('samuha_pan_no')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('समुहको पान नंको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 my-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('समुहको दर्ता नं') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('samuha_reg_no') }}"
                                                        name="samuha_reg_no"
                                                        class="form-control  @error('samuha_reg_no') is-invalid @enderror">
                                                    @error('samuha_reg_no')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('समुहको दर्ता नंको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 my-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('समुहको दर्ता मिति') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('samuha_issue_date') }}"
                                                        name="samuha_issue_date" id="nepali_datepicker"
                                                        class="form-control @error('samuha_issue_date') is-invalid @enderror"
                                                        readonly>
                                                    @error('samuha_issue_date')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('समुहको दर्ता मितिको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- this is for address dropdown component --}}
                                            <x-address-dropdown />

                                            <div class="col-6 mt-2">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('वडा') }}
                                                            <span class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <select id="samuha_ward" name="samuha_ward"
                                                        class="custom-select select2 @error('samuha_ward') is-invalid @enderror">
                                                        <option value="">
                                                            {{ __('----छान्नुहोस् ----') }}
                                                        </option>
                                                        @for ($i = 1; $i < 20; $i++)
                                                            <option value="{{ $i }}">{{ Nepali($i) }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('samuha_ward')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('वडा फिल्ड खाली छ |') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('टोल') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('samuha_toll_name') }}"
                                                        name="samuha_toll_name"
                                                        class="form-control @error('samuha_toll_name') is-invalid @enderror">
                                                    @error('samuha_toll_name')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('टोलको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------------------------------------------------------------Coperative name---------------------------------------------------------------------------->
                                    <div class="col-md-12 text-center my-5">
                                        <h5 class="text-center">
                                            <strong>{{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक सहकारीमा आबद्ध विवरण') }}</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    {{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक सहकारीमा आबद्ध') }}
                                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                                </span>
                                            </div>
                                            <select id="cooperative_status" name="cooperative_status"
                                                class="custom-select select2 @error('cooperative_status') is-invalid @enderror">
                                                <option value="">
                                                    {{ __('----छान्नुहोस् ----') }}
                                                </option>
                                                <option value="1">{{ __('रहेको') }}</option>
                                                <option value="0">{{ __('नरहेको') }}</option>
                                            </select>
                                            @error('cooperative_status')
                                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                                    {{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक सहकारीमा आबद्ध फिल्ड खाली छ |') }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="cooperative">
                                        <div class="row ">
                                            <hr class="w-100">
                                            <div class="col-6 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('सहकारीको नाम') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('cooprative_name') }}"
                                                        name="cooprative_name"
                                                        class="form-control  @error('cooprative_name') is-invalid @enderror">
                                                    @error('cooprative_name')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('सहकारीको नामको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('सहकारीको पान नं') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('coopertaive_pan_no') }}"
                                                        name="coopertaive_pan_no"
                                                        class="form-control  @error('coopertaive_pan_no') is-invalid @enderror">
                                                    @error('coopertaive_pan_no')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('सहकारीको पान नंको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 my-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('सहकारीको दर्ता नं') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('cooperative_reg_no') }}"
                                                        name="cooperative_reg_no"
                                                        class="form-control  @error('cooperative_reg_no') is-invalid @enderror">
                                                    @error('cooperative_reg_no')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('सहकारीको दर्ता नंको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 my-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('सहकारीको दर्ता मिति') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('cooperative_issue_date') }}"
                                                        name="cooperative_issue_date" id="nepali_datepicker1"
                                                        class="form-control @error('cooperative_issue_date') is-invalid @enderror"
                                                        readonly>
                                                    @error('cooperative_issue_date')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('सहकारीको दर्ता मितिको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- this is for address dropdown component --}}
                                            <x-permanentaddress-dropdown />

                                            <div class="col-6 mt-2">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('वडा') }}
                                                            <span class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <select id="cooperative_ward" name="cooperative_ward"
                                                        class="custom-select select2 @error('cooperative_ward') is-invalid @enderror">
                                                        <option value="">
                                                            {{ __('----छान्नुहोस् ----') }}
                                                        </option>
                                                        @for ($i = 1; $i < 20; $i++)
                                                            <option value="{{ $i }}">{{ Nepali($i) }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('cooperative_ward')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('वडा फिल्ड खाली छ |') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('टोल') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('cooperative_toll_name') }}"
                                                        name="cooperative_toll_name"
                                                        class="form-control @error('cooperative_toll_name') is-invalid @enderror">
                                                    @error('cooperative_toll_name')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('टोलको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------------------------------------------------------------farm name---------------------------------------------------------------------------->
                                    <div class="col-md-12 text-center my-5">
                                        <h5 class="text-center">
                                            <strong>{{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक कृषि फारम आबद्ध विवरण') }}</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    {{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक कृषि फारममा आबद्ध') }}
                                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                                </span>
                                            </div>
                                            <select id="farm_status" name="farm_status"
                                                class="custom-select select2 @error('farm_status') is-invalid @enderror">
                                                <option value="">
                                                    {{ __('----छान्नुहोस् ----') }}
                                                </option>
                                                <option value="1">{{ __('रहेको') }}</option>
                                                <option value="0">{{ __('नरहेको') }}</option>
                                            </select>
                                            @error('farm_status')
                                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                                    {{ __('कृषि तथा पशुपालनमा सक्रिय सेवा प्रदायक कृषि फारममा आबद्ध फिल्ड खाली छ |') }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="farm">
                                        <div class="row ">
                                            <hr class="w-100">
                                            <div class="col-6 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('कृषि फारमको नाम') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('farm_name') }}" name="farm_name"
                                                        class="form-control  @error('farm_name') is-invalid @enderror">
                                                    @error('farm_name')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('कृषि फारमको नामको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('कृषि फारमको पान नं') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('farm_pan_no') }}"
                                                        name="farm_pan_no"
                                                        class="form-control  @error('farm_pan_no') is-invalid @enderror">
                                                    @error('farm_pan_no')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('कृषि फारमको पान नंको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 my-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('कृषि फारमको दर्ता नं') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('farm_reg_no') }}"
                                                        name="farm_reg_no"
                                                        class="form-control  @error('farm_reg_no') is-invalid @enderror">
                                                    @error('farm_reg_no')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('कृषि फारमको दर्ता नंको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 my-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ __('कृषि फारमको दर्ता मिति') }}<span
                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ old('farm_issue_date') }}"
                                                        name="farm_issue_date" id="nepali_datepicker2"
                                                        class="form-control @error('farm_issue_date') is-invalid @enderror"
                                                        readonly>
                                                    @error('farm_issue_date')
                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                            {{ __('कृषि फारमको दर्ता मितिको फिल्ड खाली छ ') }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- this is a address down componnet of farm --}}
                                            <x-farmaddresscomponent />
                                        </div>
                                    </div>
                                    <div class="row farm">
                                        <div class="col-6 mt-1">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{ __('वडा') }}
                                                        <span class="text-danger px-1 font-weight-bold">*</span>
                                                    </span>
                                                </div>
                                                <select id="farm_ward" name="farm_ward"
                                                    class="custom-select select2 @error('farm_ward') is-invalid @enderror">
                                                    <option value="">
                                                        {{ __('----छान्नुहोस् ----') }}
                                                    </option>
                                                    @for ($i = 1; $i < 20; $i++)
                                                        <option value="{{ $i }}">{{ Nepali($i) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('farm_ward')
                                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                                        {{ __('वडा फिल्ड खाली छ |') }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 mt-">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{ __('टोल') }}<span
                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" value="{{ old('farm_toll_name') }}"
                                                    name="farm_toll_name"
                                                    class="form-control @error('farm_toll_name') is-invalid @enderror">
                                                @error('farm_toll_name')
                                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                                        {{ __('टोलको फिल्ड खाली छ ') }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="my-2" style="width: 100%">
                        <div class="col-12">
                            <button class="btn btn-sm btn-primary mt-3"
                                onclick="return confirm('कृपया संचालन सुनिस्चित गर्नुहोस्');"
                                type="submit">{{ __('सम्पादन गर्नुहोस्') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        window.onload = function() {
            var mainInput = document.getElementById("nepali_datepicker");
            var mainInput1 = document.getElementById("nepali_datepicker1");
            var mainInput2 = document.getElementById("nepali_datepicker2");
            mainInput.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 10,
            });

            mainInput1.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 10,
            });

            mainInput2.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 10,
            });
        };

        $("#samuha_status").on("change", function() {
            if ($("#samuha_status").val() == 1) {
                $("#samuha").css("display", "block");
            } else {
                $("#samuha").css("display", "none");
            }
        });

        $("#cooperative_status").on("change", function() {
            if ($("#cooperative_status").val() == 1) {
                $("#cooperative").css("display", "block");
            } else {
                $("#cooperative").css("display", "none");
            }
        });

        $("#farm_status").on("change", function() {
            if ($("#farm_status").val() == 1) {
                $(".farm").css("display", "block");
            } else {
                $(".farm").css("display", "none");
            }
        });
    </script>
@endsection
