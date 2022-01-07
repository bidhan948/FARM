<div class="col-12">
    <div class="row">
        <div class="col-6 no_insurance my-2">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('बालीको प्रकार') }} <span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select wire:model="crop_type" name="crop_type" class="form-control form-control-sm @error('crop_type_id') is-invalid @enderror">
                    <option value="">{{ __('---छान्नुहोस्---') }}</option>
                    @foreach ($crop_types as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('crop_type_id')
                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                        {{ __('बालीको प्रकार फिल्ड खाली छ ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="col-6 no_insurance my-2">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('बाली') }} <span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select wire:model="crop" name="crop" class="form-control form-control-sm @error('crop_id') is-invalid @enderror">
                    <option value="">{{ __('---छान्नुहोस्---') }}</option>
                    @foreach ($crops as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('crop_id')
                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                        {{ __('बाली फिल्ड खाली छ ') }}
                    </p>
                @enderror
            </div>
        </div>

        <input type="hidden" name="crop_type_id" value="{{ $crop_type}}">
        <input type="hidden" name="crop_id" value="{{ $crop }}">
    </div>
</div>
