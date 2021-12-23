<div class="row">
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
                    <input type="radio" wire:model="is_foreign" name="is_foreign" id="radioSuccess2" value="0">
                    <label for="radioSuccess2">
                        {{ __('पहाड प्रचलित') }}
                    </label>
                </div>
            </div>
        </div>
    @endif
    <div class="col-12 mt-4">
        @if ($showTerai || $showPahad)
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-sm btn-primary text-white mb-2" onclick="addLandDetail({{ $is_foreign }})">
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
                                    name="land_type_id[{{ $land_type->id }}]" value="{{ $land_type->name }}"
                                    readonly>
                            </td>
                            <td class="text-center"> <input type="text" class="form-control form-control-sm"
                                    name="kitta_no[{{ $land_type->id }}]" value="0"></td>
                            <td class="text-center"> <input type="text" class="form-control form-control-sm"
                                    name="area1[{{ $land_type->id }}]" id="area1_{{$key+1}}"></td>
                            <td class="text-center"><input type="text" class="form-control form-control-sm"
                                    name="area2[{{ $land_type->id }}]" value="0" id="area2_{{$key+1}}"></td>
                            <td class="text-center"><input type="text" class="form-control form-control-sm"
                                    name="area3[{{ $land_type->id }}]" value="0" id="area3_{{$key+1}}"></td>
                            @if ($showPahad)
                                <td class="text-center"><input type="text" class="form-control form-control-sm"
                                        name="area4[{{ $land_type->id }}]" value="0" id="area4_{{$key+1}}"></td>
                            @endif
                            <td class="text-center"><input type="text" class="form-control form-control-sm"
                                    name="bargha_area[{{ $land_type->id }}]" value="0" id="bargha_area_{{$key+1}}"></td>
                            <td class="text-center"><input type="checkbox" class="form-control-sm" id="is_bajho_{{$key+1}}" name="is_bajho[{{ $land_type->id }}]">
                            </td>
                            <td class="text-center"><input type="checkbox" class=" form-control-sm" id="is_charan_kharka_{{$key+1}}"
                                    name="is_charan_kharka[{{ $land_type->id }}]"></td>
                            <td class="text-center"><input type="text" class=" form-control-sm" name="remark[{{ $land_type->id }}]"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
