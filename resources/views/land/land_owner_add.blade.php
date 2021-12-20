@extends('layouts.main')
@section('title', 'जग्गाधनीको विवरण थप्नुहोस')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-danger text-center">{{ __('कृपया  * चिन्न भएको ठाउँ खाली नछोड्नु होला |') }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            <form method="post" action="{{ route('land-owner.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('पुरा नाम (नेपालीमा) ') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('name_nepali') }}" name="name_nepali"
                                class="form-control  @error('name_nepali') is-invalid @enderror">
                            @error('name_nepali')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('नेपाली नामको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('पुरा नाम (अंग्रेजीमा) ') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('name_english') }}" name="name_english"
                                class="form-control  @error('name_english') is-invalid @enderror">
                            @error('name_english')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('अंग्रेजी नामको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('उमेर ') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="number" value="{{ old('age') }}" name="age"
                                class="form-control  @error('age') is-invalid @enderror">
                            @error('age')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('अंग्रेजी नामको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('लिङ्ग') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="gender_id" class="custom-select select2 @error('gender_id') is-invalid @enderror">
                                <option value="">
                                    {{ __('----छान्नुहोस् ----') }}
                                </option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('उमेरको फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('जातीय समूह') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="ethnic_group_id"
                                class="custom-select select2 @error('ethnic_group_id') is-invalid @enderror">
                                <option value="">
                                    {{ __('----छान्नुहोस् ----') }}
                                </option>
                                @foreach ($ethnic_groups as $ethnic_group)
                                    <option value="{{ $ethnic_group->id }}">{{ $ethnic_group->name }}</option>
                                @endforeach
                            </select>
                            @error('ethnic_group_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('जातीय समूहको फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('नागरिकताको किसिम') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="citizenship_type_id"
                                class="custom-select select2 @error('citizenship_type_id') is-invalid @enderror">
                                <option value="">
                                    {{ __('----नागरिकताको किसिम ----') }}
                                </option>
                                @foreach ($citizenship_types as $citizenship_type)
                                    <option value="{{ $citizenship_type->id }}">{{ $citizenship_type->name }}</option>
                                @endforeach
                            </select>
                            @error('citizenship_type_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('नागरिकता किसिमको फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('जारी मिति') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('issue_dateBs') }}" placeholder="YYYY-MM-DD"
                                name="issue_dateBs" class="form-control  @error('issue_dateBs') is-invalid @enderror"
                                id="nepali_datepicker" readonly>
                            @error('issue_dateBs')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('जारी मितिको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('नागरिकता नं') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('cit_no') }}" name="cit_no"
                                class="form-control  @error('cit_no') is-invalid @enderror">
                            @error('cit_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('नागरिकता नंको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('जारी गरिएको कार्यलय') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('issue_office') }}" name="issue_office"
                                class="form-control  @error('issue_office') is-invalid @enderror">
                            @error('issue_office')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('जारी गरिएको कार्यलयको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('जन्म मिति ') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('birth_dateBs') }}" name="birth_dateBs"
                                class="form-control  @error('birth_dateBs') is-invalid @enderror" id="birth_dateBs" readonly>
                            @error('birth_dateBs')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('जन्म मितिको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('मातृभाषा') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('mother_tongue') }}" name="mother_tongue"
                                class="form-control  @error('mother_tongue') is-invalid @enderror">
                            @error('mother_tongue')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('मातृभाषाको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('सम्पर्क / मोबाईलन नं :') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('contact_no') }}" name="contact_no"
                                class="form-control  @error('contact_no') is-invalid @enderror">
                            @error('contact_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('सम्पर्क / मोबाईलन नंको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 my-2">
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('सम्पादन गर्नुहोस्') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('scripts')
    <script>
        window.onload = function() {
            var mainInput = document.getElementById("nepali_datepicker");
            var mainInput1 = document.getElementById("birth_dateBs");
            mainInput.nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                disableDaysBefore: 0,
            });
            mainInput1.nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                disableDaysBefore: 0,
            });
        };
    </script>
@endsection
