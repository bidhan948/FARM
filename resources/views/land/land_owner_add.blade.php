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
        <div class="card-body">
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
                                    {{ __('उमेरको फिल्ड खाली छ ') }}
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
                    <input type="hidden" name="issue_dateAd" id="issue_dateAd" value="{{old('issue_dateAd')}}">
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
                                class="form-control  @error('birth_dateBs') is-invalid @enderror" id="birth_dateBs"
                                readonly>
                            @error('birth_dateBs')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('जन्म मितिको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="birth_dateAd" id="birth_dateAd" value="{{old('birth_dateAd')}}">
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('मातृभाषा') }}<span class="text-danger px-1 font-weight-bold">*</span>
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
                    <div class="col-12 mt-3">
                        <hr class="my-2" style="width: 100%">
                    </div>
                    <div class="col-12 mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('परिबारको संख्या') }}</th>
                                    <th class="text-center">{{ __('१८ बर्ष मुनिका') }} <span
                                            class="text-danger px-1">*</span></th>
                                    <th class="text-center">{{ __('१८ देखि ५९ सम्मको') }} <span
                                            class="text-danger px-1">*</span></th>
                                    <th class="text-center">{{ __('६० देखि देखि माथिको') }} <span
                                            class="text-danger px-1">*</span></th>
                                    <th class="text-center">{{ __('कैफियत (अपाङ्ग / असक्त)') }} <span
                                            class="text-danger px-1">*</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genders as $gender)
                                    <tr>
                                        <td class="text-center">{{ $gender->name }}</td>
                                        <td class="text-center"><input type="number"
                                                class="form-control-sm form-control" name="below_18[{{ $gender->id }}]">
                                        </td>
                                        <td class="text-center"><input type="number"
                                                class="form-control-sm form-control"
                                                name="eighteen_to_fiftynine[{{ $gender->id }}]">
                                        </td>
                                        <td class="text-center"><input type="number"
                                                class="form-control-sm form-control" name="above_60[{{ $gender->id }}]">
                                        </td>
                                        <td class="text-center"><input type="text" class="form-control-sm form-control"
                                                name="remark[{{ $gender->id }}]">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बैवाहिक स्थिति') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="marital_status_id"
                                class="custom-select select2 @error('marital_status_id') is-invalid @enderror">
                                <option value="">
                                    {{ __('----बैवाहिक स्थिति छान्नुहोस् ----') }}
                                </option>
                                @foreach ($marital_statuses as $marital_status)
                                    <option value="{{ $marital_status->id }}">{{ $marital_status->name }}</option>
                                @endforeach
                            </select>
                            @error('marital_status_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बैवाहिक स्थितिको फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="mt-4 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('दम्पतिको नाम ') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('couple_name') }}" name="couple_name"
                                class="form-control  @error('couple_name') is-invalid @enderror">
                            @error('couple_name')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('दम्पतिको नामको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('दम्पतिको नागरिकता नं ') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('couple_cit_no') }}" name="couple_cit_no"
                                class="form-control  @error('couple_cit_no') is-invalid @enderror">
                            @error('couple_cit_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('दम्पतिको नागरिकता नंको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बाबुको नाम थर') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('father_name') }}" name="father_name"
                                class="form-control  @error('father_name') is-invalid @enderror">
                            @error('father_name')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बाबुको नाम थरको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('आमाको नाम थर') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('mother_name') }}" name="mother_name"
                                class="form-control  @error('mother_name') is-invalid @enderror">
                            @error('mother_name')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('आमाको नाम थरको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बाबुको नागरिकता नं') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('father_cit_no') }}" name="father_cit_no"
                                class="form-control  @error('father_cit_no') is-invalid @enderror">
                            @error('father_cit_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बाबुको नागरिकता नंको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('आमाको नागरिकता नं') }}<span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('mother_cit_no') }}" name="mother_cit_no"
                                class="form-control  @error('mother_cit_no') is-invalid @enderror">
                            @error('mother_cit_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('आमाको नागरिकता नंको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('ब्यबसाय') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="bussiness_id"
                                class="custom-select select2 @error('bussiness_id') is-invalid @enderror">
                                <option value="">
                                    {{ __('----ब्यबसाय छान्नुहोस् ----') }}
                                </option>
                                @foreach ($bussinesses as $bussiness)
                                    <option value="{{ $bussiness->id }}">{{ $bussiness->name }}</option>
                                @endforeach
                            </select>
                            @error('bussiness_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('ब्यबसायको फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('शैक्षिक योग्यता') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="education_qualification_id"
                                class="custom-select select2 @error('education_qualification_id') is-invalid @enderror">
                                <option value="">
                                    {{ __('----शैक्षिक योग्यता छान्नुहोस् ----') }}
                                </option>
                                @foreach ($education_qualifications as $education_qualification)
                                    <option value="{{ $education_qualification->id }}">
                                        {{ $education_qualification->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('education_qualification_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('शैक्षिक योग्यताको फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!------------------------------------------- start of permanent address------------------------------------------->
                    <div class="col-md-12 mt-5">
                        <p class="text-center font-weight-bold" style="font-size: 1.5rem;">{{ __('स्थायी ठेगाना') }}</p>
                        <hr class="w-100">
                    </div>

                    {{-- this is for address dropdown component --}}
                    <x-address-dropdown />

                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('वार्ड नं ') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="permanent_ward" class="custom-select select2 @error('permanent_ward') is-invalid @enderror">
                                <option value="">
                                    {{ __('----छान्नुहोस् ----') }}
                                </option>
                                @for ($i = 1; $i <=19; $i++)
                                    <option value="{{$i}}">{{Nepali($i)}}</option>
                                @endfor
                            </select>
                            @error('permanent_ward')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('वार्ड नं फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('टोल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('permanent_tole') }}" name="permanent_tole"
                                class="form-control  @error('permanent_tole') is-invalid @enderror">
                            @error('permanent_tole')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('टोलको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बिदेशिको हकमा देश') }}
                            </div>
                            <input type="text" value="{{ old('permanent_country_name') }}" name="permanent_country_name"
                                class="form-control  @error('permanent_country_name') is-invalid @enderror">
                            @error('permanent_country_name')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बिदेशिको हकमा फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('राहदानी नं ') }}
                            </div>
                            <input type="text" value="{{ old('permanent_passport_no') }}" name="permanent_passport_no"
                                class="form-control  @error('permanent_passport_no') is-invalid @enderror">
                            @error('permanent_passport_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('राहदानी नं फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <!------------------------------------------- end of permanent address------------------------------------------->


                    <!------------------------------------------- start of Temporary address------------------------------------------->
                    <div class="col-md-12 mt-5">
                        <p class="text-center font-weight-bold" style="font-size: 1.5rem;">{{ __('अस्थायी ठेगाना') }}
                        </p>
                        <hr class="w-100">
                    </div>

                    {{-- this is for address dropdown component --}}
                    <x-permanentaddress-dropdown />

                    <div class="col-6 mt-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('वार्ड नं ') }}
                                    <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <select name="temporary_ward" class="custom-select select2 @error('temporary_ward') is-invalid @enderror">
                                <option value="">
                                    {{ __('----छान्नुहोस् ----') }}
                                </option>
                                @for ($i = 1; $i <=19; $i++)
                                    <option value="{{$i}}">{{Nepali($i)}}</option>
                                @endfor
                            </select>
                            @error('temporary_ward')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('वार्ड नं फिल्ड खाली छ |') }}
                                </p>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('टोल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('temporary_tole') }}" name="temporary_tole"
                                class="form-control  @error('temporary_tole') is-invalid @enderror">
                            @error('temporary_tole')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('टोलको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बिदेशिको हकमा देश') }}
                            </div>
                            <input type="text" value="{{ old('temporary_country_name') }}" name="temporary_country_name"
                                class="form-control  @error('temporary_country_name') is-invalid @enderror">
                            @error('temporary_country_name')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बिदेशिको हकमा फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('राहदानी नं ') }}
                            </div>
                            <input type="text" value="{{ old('temporary_passport_no') }}" name="temporary_passport_no"
                                class="form-control  @error('temporary_passport_no') is-invalid @enderror">
                            @error('temporary_passport_no')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('राहदानी नं फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <!------------------------------------------- end of temporary address------------------------------------------->
                    <!------------------------------------------- start of Bank detail------------------------------------------->
                    <div class="col-md-12 mt-5">
                        <p class="text-center font-weight-bold" style="font-size: 1.5rem;">{{ __('बैंक विवरण ') }}
                        </p>
                        <hr class="w-100">
                        <a class="btn btn-sm btn-primary text-white mb-0" id="addBank">
                            <i class="fas fa-plus-circle px-1"></i>{{ __('बैंक विवरण थप्नुहोस') }}</a>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र. स.') }}</th>
                                    <th class="text-center">{{ __('बैंक नाम') }}</th>
                                    <th class="text-center">{{ __('खाता नं') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="banks">
                                <tr class="addPrposal">
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <input name="name[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td class="text-center">
                                        <input name="account_no[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!------------------------------------------- end of Bank detail------------------------------------------->

                    <div class=" col-12">
                        <div class="form-group clearfix mt-3">
                            <div class="icheck-success d-inline">
                                <label for="radioSuccess3" style="margin-left:-25px;">
                                    {{ __('परिवारको सदस्य बैदेशिक रोजगारमा') }}
                                </label>
                            </div>
                            <div class=" px-3 icheck-success d-inline">
                                <input type="radio" name="is_foreign" id="radioSuccess1" value="1"
                                    onclick="assignForeign(1)">
                                <label for="radioSuccess1">
                                    {{ __('रहेको') }}
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="is_foreign" id="radioSuccess2" value="0"
                                    onclick="removeForeign(0)">
                                <label for="radioSuccess2">
                                    {{ __('नरहेको') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="my-2 col-6" id="country_name" style="display: none;">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('देशको नाम') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('country_name') }}" name="country_name"
                                class="form-control  @error('country_name') is-invalid @enderror">
                            @error('country_name')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('देशको नामको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="my-2 col-6" id="foreign_member" style="display: none;">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('कति जना ?') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('foreign_member') }}" name="foreign_member"
                                class="form-control  @error('foreign_member') is-invalid @enderror">
                            @error('foreign_member')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('कति जनाको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 my-2">
                        <button type="submit" class="btn btn-sm btn-primary" >{{ __('सम्पादन गर्नुहोस्') }}</button>
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
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 10,
                onChange: function() {
                    var dateString = mainInput.value;
                    var dateAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD(NepaliFunctions
                        .ConvertToDateObject(dateString, "YYYY-MM-DD")), "YYYY-MM-DD");
                    var issueDateAd = document.getElementById("issue_dateAd");
                    issueDateAd.setAttribute('value', dateAd);
                }
            });
            mainInput1.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 200,
                onChange: function() {
                    var dateString = mainInput1.value;
                    var dateAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD(NepaliFunctions
                        .ConvertToDateObject(dateString, "YYYY-MM-DD")), "YYYY-MM-DD");
                    var birth_dateAd = document.getElementById("birth_dateAd");
                    birth_dateAd.setAttribute('value', dateAd);
                }
            });
        };
    </script>
    <script>
        $(document).ready(function() {
            let i = 2;
            let j = 2;
            $('#addBank').on("click", function() {
                var html = '<tr id="rem_bank' + i + '">' +
                    '<td class="text-center">' + i + '</td>' +
                    '<td class="text-center">' +
                    '<input name="name[]" id="" class="form-control-sm form-control">' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<input name="account_no[]" id="" class="form-control-sm form-control">' +
                    '</td>' +
                    '<td><i class="fas fa-trash-alt text-danger" onclick="removeBank(' + i +
                    ')"></i></td>' +
                    '</tr>';
                i++;
                $("#banks").append(html);
            });
        });
    </script>
    <script>
        function assignForeign(i) {
            $("#country_name").css("display", "block");
            $("#foreign_member").css("display", "block");
        }

        function removeForeign(i) {
            $("#country_name").css("display", "none");
            $("#foreign_member").css("display", "none");
        }

        function removeBank(i) {
            $("#rem_bank" + i).html("");
        }
    </script>
@endsection
