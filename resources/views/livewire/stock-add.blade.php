<div class="row my-2">
    <div class="col-6">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('बालीको प्रकार') }} <span class="text-danger px-1 font-weight-bold">*</span>
                </span>
            </div>
            <select wire:model="crop_type_id" class="form-control form-control-sm">
                <option value="">{{ __('---छान्नुहोस्----') }}</option>
                @foreach ($crop_types as $crop_type)
                    <option value="{{ $crop_type->id }}">{{ $crop_type->name }}</option>
                @endforeach
            </select>
            @error('name')
                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                    {{ __('STOCKको फिल्ड खाली छ ') }}
                </p>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('STOCK') }} <span class="text-danger px-1 font-weight-bold">*</span>
                </span>
            </div>
            <select wire:model="crop_type_id" class="form-control form-control-sm">
                <option value="">{{ __('---छान्नुहोस्----') }}</option>
                @foreach ($crop_types as $crop_type)
                    <option value="{{ $crop_type->id }}">{{ $crop_type->name }}</option>
                @endforeach
            </select>
            @error('name')
                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                    {{ __('STOCKको फिल्ड खाली छ ') }}
                </p>
            @enderror
        </div>
    </div>
</div>
