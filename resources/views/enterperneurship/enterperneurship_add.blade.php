@extends('layouts.main')
@section('title', 'उधम्शिलता/फारम विवरण थप्नुहोस')
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
            <form method="post" action="{{ route('enterperneurship_detail_store',$land_owner) }}">
                @csrf
                <div class="col-12 mt-3">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                {{ __('उधम्शिल्ता/फारम संचालनमा आबद्ध') }}
                                <span class="text-danger px-1 font-weight-bold">*</span>
                            </span>
                        </div>
                        <select id="arrogance_status" name="arrogance_status"
                            class="custom-select select2 @error('arrogance_status') is-invalid @enderror">
                            <option value="">
                                {{ __('----छान्नुहोस् ----') }}
                            </option>
                            <option value="1">{{ __('रहेको') }}</option>
                            <option value="0">{{ __('नरहेको') }}</option>
                        </select>
                        @error('arrogance_status')
                            <p class="invalid-feedback" style="font-size: 0.9rem">
                                {{ __('उधम्शिल्ता/फारम संचालनमा आबद्ध फिल्ड खाली छ |') }}
                            </p>
                        @enderror
                    </div>
                </div>
                <!------------------------------------------------------below field is all for organization------------------------------------------------------->
                <div id="org_detail" style="display: block;">
                    <div class="row" class="mt-3">
                        <hr class="w-100">
                        <div class="col-6 mt-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('संस्थाको नाम') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('organization_name_nepali') }}"
                                    name="organization_name_nepali"
                                    class="form-control  @error('organization_name_nepali') is-invalid @enderror">
                                @error('organization_name_nepali')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('संस्थाको नामको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('संस्थाको नाम (अंग्रेजीमा)') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('organization_name_english') }}"
                                    name="organization_name_english"
                                    class="form-control  @error('organization_name_english') is-invalid @enderror">
                                @error('organization_name_english')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('संस्थाको नाम (अंग्रेजीमा)को फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('संस्थाको प्रकार') }}
                                        <span class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <select id="organization_type_id" name="organization_type_id"
                                    class="custom-select select2 @error('organization_type_id') is-invalid @enderror">
                                    <option value="">
                                        {{ __('----छान्नुहोस् ----') }}
                                    </option>
                                    @foreach ($organization_types as $organization_type)
                                        <option value="{{ $organization_type->id }}">{{ $organization_type->name }}</option>
                                    @endforeach
                                </select>
                                @error('organization_type_id')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('संस्थाको प्रकारको फिल्ड खाली छ |') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('संस्थाको पुंजी') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('organization_budget') }}" name="organization_budget"
                                    class="form-control  @error('organization_budget') is-invalid @enderror">
                                @error('organization_budget')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('संस्थाको पुंजीको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 my-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('पान नं') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('pan_no') }}" name="pan_no"
                                    class="form-control  @error('pan_no') is-invalid @enderror">
                                @error('pan_no')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('पान नंको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 my-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('सम्पर्क व्यक्ति') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('contact_person_name') }}" name="contact_person_name"
                                    class="form-control  @error('contact_person_name') is-invalid @enderror">
                                @error('contact_person_name')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('सम्पर्क व्यक्तिको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- this is for address dropdown component --}}
                        <x-address-dropdown />

                        <div class="col-6 my-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('वडा') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <select id="ward" name="ward"
                                    class="custom-select select2 @error('ward') is-invalid @enderror">
                                    <option value="">
                                        {{ __('----छान्नुहोस् ----') }}
                                    </option>
                                    @for ($i = 1; $i <= 19; $i++)
                                        <option value="{{ $i }}">{{ Nepali($i) }}</option>
                                    @endfor
                                </select>
                                @error('ward')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('वडाको फिल्ड खाली छ |') }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 my-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('टोल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('toll_name') }}" name="toll_name"
                                    class="form-control  @error('toll_name') is-invalid @enderror">
                                @error('toll_name')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('टोलको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('सम्पर्क/मोबाईल नं') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('contact_person_name') }}" name="contact_person_name"
                                    class="form-control  @error('contact_person_name') is-invalid @enderror">
                                @error('contact_person_name')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('सम्पर्क/मोबाईल नंको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('खेतीमा संग्लन कर्मचारी संख्या') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('no_of_staff_in_field') }}" name="no_of_staff_in_field"
                                    class="form-control  @error('no_of_staff_in_field') is-invalid @enderror">
                                @error('no_of_staff_in_field')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('खेतीमा संग्लन कर्मचारी संख्याको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('पुरा समय रोजगार संख्या') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('ot_no_of_staff') }}" name="ot_no_of_staff"
                                    class="form-control  @error('ot_no_of_staff') is-invalid @enderror">
                                @error('ot_no_of_staff')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('पुरा समय रोजगार संख्याको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('आम्सिक समय रोजगार संख्या') }}<span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <input type="text" value="{{ old('amsik_no_of_staff') }}" name="amsik_no_of_staff"
                                    class="form-control  @error('amsik_no_of_staff') is-invalid @enderror">
                                @error('amsik_no_of_staff')
                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                        {{ __('आम्सिक समय रोजगार संख्याको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------start of business field ----------------------------------------------------------------------------->
                    <hr class="w-100 my-2">
                    <div class="col-12">
                        <h5 class="text-center my-2 font-weight-bold">{{ __('ब्यबसाय लगानी वा आम्दानी') }}</h5>
                    </div>
                    <div class="col-md-12 mt-5">
                        <hr class="w-100">
                        <a class="btn btn-sm btn-primary text-white mb-0" id="addBusinessDetail">
                            <i class="fas fa-plus-circle px-1"></i>{{ __('ब्यबसाय लगानी वा आम्दानी थप्नुहोस') }}</a>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र. स.') }}</th>
                                    <th class="text-center">{{ __('ब्यबसाय') }}</th>
                                    <th class="text-center">{{ __('बार्षिक लगानी') }}</th>
                                    <th class="text-center">{{ __('बार्षिक आम्दानी') }}</th>
                                    <th class="text-center">{{ __('कैफियत') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="business">
                                <tr class="addPrposal">
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <select name="business_id[]" class="form-control form-control-sm">
                                            @foreach ($businesses as $business)
                                               <option value="{{$business->id}}">{{$business->name}}</option> 
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <input name="yearly_investment[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td class="text-center">
                                        <input name="yearly_income[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td class="text-center">
                                        <input name="remark[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!------------------------------------------------start of upcoming plan ----------------------------------------------------------------------------->
                    <hr class="w-100 my-2">
                    <div class="col-12">
                        <h5 class="text-center my-2 font-weight-bold">{{ __('आगामी योजनाहरु') }}</h5>
                    </div>
                    <div class="col-md-12 mt-5">
                        <hr class="w-100">
                        <a class="btn btn-sm btn-primary text-white mb-0" id="addUpcomingPlan">
                            <i class="fas fa-plus-circle px-1"></i>{{ __('आगामी योजनाहरु थप्नुहोस') }}</a>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('क्र. स.') }}</th>
                                    <th class="text-center">{{ __('योजनाको नाम') }}</th>
                                    <th class="text-center">{{ __('योजनाको बिवरण') }}</th>
                                    <th class="text-center">{{ __('कैफियत') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="upcoming_plan">
                                <tr class="addPrposal">
                                    <td class="text-center">1</td>
                                    <td class="text-center">
                                        <input name="name[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td class="text-center">
                                        <input name="plan_detail[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td class="text-center">
                                        <input name="remark_plan[]" id="" class="form-control-sm form-control">
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm('कृपया संचालन सुनिस्चित गर्नुहोस्');">{{ __('सम्पादन गर्नुहोस्') }}</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('scripts')
    <script>
        $("#arrogance_status").on("change", function() {
            if ($("#arrogance_status").val() == 1) {
                $("#org_detail").css("display", "block");
            } else {
                $("#org_detail").css("display", "none");
            }
        });
        let i = 2;
        let j = 2;
        $("#addBusinessDetail").on("click",function(){
            var html = '<tr id="r'+i+'">'+
                        '<td class="text-center">'+i+'</td>'+
                        '<td class="text-center">'+
                        '<select name="business_id[]" class="form-control form-control-sm">'+
                            '@foreach ($businesses as $business)'+
                                '<option value="{{$business->id}}">{{$business->name}}</option>'+ 
                            '@endforeach'+
                        '</select>'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<input name="yearly_investment[]" id="" class="form-control-sm form-control">'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<input name="yearly_income[]" id="" class="form-control-sm form-control">'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<input name="remark[]" id="" class="form-control-sm form-control">'+
                        '</td>'+
                        '<td><i class="fas fa-trash-alt text-danger fa-2x" onclick="removeBusiness('+i+')"></i></td>'+
                    '</tr>';
                     i++;
            $("#business").append(html);
        });

        function removeBusiness(params) {
            $("#r"+params).html("");
        }

        $("#addUpcomingPlan").on("click",function() {
            var html = '<tr id="r_p'+j+'">'+
                        '<td class="text-center">'+j+'</td>'+
                        '<td class="text-center">'+
                            '<input name="name[]" id="" class="form-control-sm form-control">'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<input name="plan_detail[]" id="" class="form-control-sm form-control">'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<input name="remark_plan[]" id="" class="form-control-sm form-control">'+
                        '</td>'+
                        '<td><i class="fas fa-trash-alt text-danger fa-2x" onclick="removePlan('+j+')"></i></td>'+
                    '</tr>';
                    j++;
                $("#upcoming_plan").append(html);
        });

        function removePlan(params) {
            $("#r_p"+params).html("");
        }
    </script>
@endsection
