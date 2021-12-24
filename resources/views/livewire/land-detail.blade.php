<div class="row" style="width: 100%">
    @if ($checkBox)
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="form-group clearfix mt-3">
                <div class="icheck-success d-inline">
                    <label for="radioSuccess3" style="margin-left:-25px;">
                        {{ __('क्षेत्र') }}
                    </label>
                </div>
                <div class=" px-3 icheck-success d-inline">
                    <input type="radio" wire:model="is_foreign" name="is_foreign" id="radioSuccess1" value="1">
                    <label for="radioSuccess1">
                        {{ __('तराई प्रचलित') }}
                    </label>
                </div>
                <div class="icheck-success d-inline">
                    <input type="radio" wire:model="is_foreign" name="is_foreign" id="radioSuccess2" value="0" >
                    <label for="radioSuccess2">
                        {{ __('पहाड प्रचलित') }}
                    </label>
                </div>
            </div>
        </div>
    @endif
    <input type="hidden" name="region_id" value="{{$is_foreign}}">
    <div class="col-12 mt-4">
        @if ($showTerai || $showPahad)
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-sm btn-primary text-white mb-2" onclick="addLandDetail({{$is_foreign}})">
                        <i class="fas fa-plus-circle px-1"></i>{{ __('जग्गा विवरण थप्नुहोस') }}</a>
                </div>
                <div class="col-6 ">
                    <a class="btn float-right btn-sm btn-primary text-white mb-2"
                        onclick="calculate({{ $is_foreign }})">
                        <i class="fas fa-calculator px-1"></i>{{ __('calculate') }}</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">{{ __('कित्ता नं') }}</th>
                        <th class="text-center">{{ $showTerai ? 'बिघाहा' : 'रोपनी' }}<span
                                class="text-danger px-1">*</span></th>
                        <th class="text-center">{{ $showTerai ? 'कठ्ठा' : 'आना' }}<span
                                class="text-danger px-1">*</span></th>
                        <th class="text-center">{{ $showTerai ? 'धुर' : 'पैसा' }}<span
                                class="text-danger px-1">*</span></th>
                        @if ($showPahad)
                            <th class="text-center">{{ __('दाम') }}<span class="text-danger px-1">*</span></th>
                        @endif
                        <th class="text-center">{{ __('बर्ग मिटर') }}</th>
                        <th class="text-center">{{ __('बझों') }}</th>
                        <th class="text-center">{{ __('चरण खर्क') }}</th>
                        <th class="text-center">{{ __('कैफियत') }} <span class="text-danger px-1">*</span></th>
                    </tr>
                </thead>
                <tbody id="assignLandDetail">
                    @foreach ($land_types as $key => $land_type)
                        <tr>
                            <td class="text-center">
                                <input type="text" class="form-control form-control-sm"
                                    name="land_type_id[{{ $land_type->id }}][]" value="{{ $land_type->name }}"
                                    readonly>
                            </td>
                            <td class="text-center"> <input type="text" class="form-control form-control-sm"
                                    name="kitta_no[{{ $land_type->id }}][]" ></td>
                            <td class="text-center"> <input type="text" class="form-control form-control-sm" name="area1[{{$land_type->id}}][]" id="area1_{{ $key + 1 }}"></td>
                            <td class="text-center"><input type="text" class="form-control form-control-sm"
                                    name="area2[{{ $land_type->id }}][]"  id="area2_{{ $key + 1 }}">
                            </td>
                            <td class="text-center"><input type="text" class="form-control form-control-sm"
                                    name="area3[{{ $land_type->id }}][]"  id="area3_{{ $key + 1 }}">
                            </td>
                            @if ($showPahad)
                                <td class="text-center"><input type="text" class="form-control form-control-sm"
                                        name="area4[{{ $land_type->id }}][]"  id="area4_{{ $key + 1 }}">
                                </td>
                            @endif
                            <td class="text-center"><input type="text" class="form-control form-control-sm"
                                    name="bargha_area[{{ $land_type->id }}][]" 
                                    id="bargha_area_{{ $key + 1 }}"></td>
                            <td class="text-center"><input type="checkbox" class="form-control-sm"
                                    id="is_bajho_{{ $key + 1 }}" name="is_bajho[{{ $land_type->id }}][]">
                            </td>
                            <td class="text-center"><input type="checkbox" class=" form-control-sm"
                                    id="is_charan_kharka_{{ $key + 1 }}"
                                    name="is_charan_kharka[{{ $land_type->id }}][]"></td>
                            <td class="text-center"><input type="text" class=" form-control-sm"
                                    name="remark[{{ $land_type->id }}][]"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @if (!$checkBox)
        <div class="mt-3 col-4">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('खेति योग्य क्षेत्र') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <input type="text" value="{{ old('cultivable_area') }}" name="cultivable_area"
                    class="form-control  @error('cultivable_area') is-invalid @enderror" id="cultivable_area" readonly>
                @error('cultivable_area')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('खेति योग्य क्षेत्र फिल्ड खाली छ ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-4">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('खेति गरिएको क्षेत्रफल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <input type="number" value="{{ old('cultivated_area') }}" name="cultivated_area"
                    class="form-control  @error('cultivated_area') is-invalid @enderror" id="cultivated_area"
                    id="cultivated_area">
                @error('cultivated_area')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('खेति गरिएको क्षेत्रफल') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-4">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('कुल क्षेत्रफल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <input type="text" value="{{ old('total_area') }}" name="total_area"
                    class="form-control  @error('total_area') is-invalid @enderror" id="total_area" readonly>
                @error('total_area')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('कुल क्षेत्रफल') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-4">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('सिचाईको सुबिधा') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select name="irrigation_facility" class="form-control form-control-sm" id="irrigation_facility">
                    <option value="">{{ __('--छान्नुहोस् --') }}</option>
                    <option value="1">{{ __('रहेको') }}</option>
                    <option >{{ __('नरहेको') }}</option>
                </select>
                @error('irrigation_facility')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('सिचाईको सुबिधा खाली छ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-4" style="display:none;" id="s_a">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('सिंचित क्षेत्रफल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <input type="text" value="{{ old('irrigation_area') }}" name="irrigation_area"
                    class="form-control  @error('irrigation_area') is-invalid @enderror" id="irrigation_area">
                @error('irrigation_area')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('सिंचित क्षेत्रफल खाली छ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-4" style="display: none;" id="uns_a">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('अ-सिंचित क्षेत्रफल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <input type="text" value="{{ old('unirrigation_area') }}" name="unirrigation_area"
                    class="form-control  @error('unirrigation_area') is-invalid @enderror" id="unirrigation_area">
                @error('unirrigation_area')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('अ-सिंचित क्षेत्रफल खाली छ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-6">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('सिचाईको प्रकार') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select name="irrigation_type_id" class="form-control form-control-sm" id="irrigation_type_id">
                    <option value="">{{ __('--छान्नुहोस् --') }}</option>
                    @foreach ($irrigation_types as $irrigation_type)
                        <option value="{{ $irrigation_type->id }}"
                            {{ old('irrigation_type_id') == $irrigation_type->id ? 'selected' : '' }}>
                            {{ $irrigation_type->name }}</option>
                    @endforeach
                </select>
                @error('irrigation_type_id')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('सिचाईको प्रकार खाली छ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mt-3 col-6">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('सडकको सुबिधा') }}<span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select name="road_facility" class="form-control form-control-sm" id="road_facility">
                    <option value="">{{ __('--छान्नुहोस् --') }}</option>
                    <option value="1" {{ old('road_facility') == 1 ? 'selected' : '' }}>
                        {{ __('पुगेको') }}</option>
                    <option >
                        {{ __('नपुगेको') }}</option>
                </select>
                @error('road_facility')
                    <p class="invalid-feedback" style="font-size: 0.9rem">
                        {{ __('सडकको सुबिधा खाली छ') }}
                    </p>
                @enderror
            </div>
        </div>
    @endif
    <script>
        const irrigation = document.querySelector("#irrigation_facility");
        const irrigation_area = document.querySelector("#s_a");
        const unirrigation_area = document.querySelector("#uns_a");
        const cultivated_area = document.querySelector("#cultivated_area");
        const cultivable_area = document.querySelector("#cultivable_area");

        cultivated_area.addEventListener("keyup", function() {
            console.log(cultivable_area.value,cultivated_area.value);
            if (+cultivable_area.value < +cultivated_area.value) {
                cultivated_area.value = "";
                alert("provided area is inavlid");
            }
        });
        irrigation.addEventListener("change", function() {
            if (irrigation.value == 1) {
                irrigation_area.style.display = "block";
                unirrigation_area.style.display = "block";
            } else {
                irrigation_area.style.display = "none";
                unirrigation_area.style.display = "none";
            }
        });
    </script>
</div>
