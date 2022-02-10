<form method="post" wire:submit.prevent="saveStock">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('Stock type') }} <span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select wire:model="stock_type" class="form-control form-control-sm @error('stock_type') is-invalid @enderror">
                    <option value="">{{ __('---छान्नुहोस्----') }}</option>
                    <option value="fertilizer">{{ __('मल') }}</option>
                    <option value="seed">{{ __('बिरुवा') }}</option>
                </select>
                @error('stock_type')
                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                        {{ __('STOCKको फिल्ड खाली छ ') }}
                    </p>
                @enderror
            </div>
        </div>
        @if ($is_crop)
            <div class="col-6">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{ __('बालीको प्रकार') }} <span class="text-danger px-1 font-weight-bold">*</span>
                        </span>
                    </div>
                    <select wire:model="crop_type_id" class="form-control form-control-sm @error('crop_type_id') is-invalid @enderror">
                        <option value="">{{ __('---छान्नुहोस्----') }}</option>
                        @foreach ($crop_types as $crop_type)
                            <option value="{{ $crop_type->id }}">{{ $crop_type->name }}</option>
                        @endforeach
                    </select>
                    @error('crop_type_id')
                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                            {{ __('STOCKको फिल्ड खाली छ ') }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-6 my-2">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{ __('बालि') }} <span class="text-danger px-1 font-weight-bold">*</span>
                        </span>
                    </div>
                    <select wire:model="crop_id" class="form-control form-control-sm @error('crop_id') is-invalid @enderror">
                        <option value="">{{ __('---छान्नुहोस्----') }}</option>
                        @foreach ($crops as $crop)
                            <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                        @endforeach
                    </select>
                    @error('crop_id')
                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                            {{ __('STOCKको फिल्ड खाली छ ') }}
                        </p>
                    @enderror
                </div>
                <input type="hidden" name="crop_id" value="{{ $crop_id ?? '' }}">
            </div>
        @endif
        @if ($is_fertilizer)
            <div class="col-6">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{ __('मल') }} <span class="text-danger px-1 font-weight-bold">*</span>
                        </span>
                    </div>
                    <select wire:model="fertilizer_id" class="form-control form-control-sm @error('fertilizer_id') is-invalid @enderror">
                        <option value="">{{ __('---छान्नुहोस्----') }}</option>
                        @foreach ($fertilizers as $fertilizer)
                            <option value="{{ $fertilizer->id }}">{{ $fertilizer->name }}</option>
                        @endforeach
                    </select>
                    @error('fertilizer_id')
                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                            {{ __('मलको फिल्ड खाली छ ') }}
                        </p>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-6 my-2">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('इकाई') }} <span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <select wire:model="unit_id" class="form-control form-control-sm @error('unit_id') is-invalid @enderror">
                    <option value="">{{ __('---छान्नुहोस्----') }}</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
                @error('unit_id')
                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                        {{ __('इकाईको फिल्ड खाली छ ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="col-6 my-2">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{ __('मात्रा') }} <span class="text-danger px-1 font-weight-bold">*</span>
                    </span>
                </div>
                <input type="number" value="{{ old('quantity') }}" wire:model="quantity"
                    class="form-control {{($quantityMessage ? 'is-valid' : 'is-invalid')}}  @error('quantity') is-invalid @enderror">
                @error('quantity')
                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                        {{ __('मात्राको फिल्ड खाली छ ') }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="col-4 my-2 ">
            <button type="submit" class="btn btn-sm btn-primary">पेश
                गर्नुहोस्</button>
        </div>
    </div>

</form>
