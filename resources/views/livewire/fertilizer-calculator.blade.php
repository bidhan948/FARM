<div class="row">
    @if ($message != '')
        <div class="col-12 my-2">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> {{ $message }}</h5>
            </div>
        </div>
    @endif
    <div class="col-md-3 my-2">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('बर्ग') }}
                </span>
            </div>
            <select wire:model="category_id" class="form-control form-control-sm">
                <option value="" selected>{{ __('---छान्नुहोस्---') }}
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 my-2">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('बाली') }}
            </div>
            <select wire:model="crop_id" name="crop_id" class="form-control form-control-sm">
                <option value="">{{ __('---छान्नुहोस्---') }}
                </option>
                @foreach ($crops as $crop)
                    <option value="{{ $crop->id }}">
                        {{ $crop->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 my-2">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('क्षेत्र') }}
            </div>
            <input type="number" step="0.1" min="0" max="100000000" wire:model="area" class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-md-3 my-2">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('बाली') }}
            </div>
            <select wire:model="area_id" class="form-control form-control-sm">
                <option value="">{{ __('---छान्नुहोस्---') }}
                </option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">
                        {{ $area->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 my-2 my-2">
        <a wire:click="calculate()" class="btn btn-sm btn-primary text-white"><i
                class="fas fa-search px-1"></i>{{ __('खोज्नुहोस्') }}</a>
    </div>

    @if ($bool)
        <div class="col-12 my-3 card p-2 shadow-lg">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td class="text-center">
                            <img src="{{asset('fertilizer/potash.png')}}" alt="potash">
                        </td>
                        <td class="text-center">
                            <p class="text-center mb-0 font-weight-bold text-lg" style="padding-top:35px;">
                                आवश्यक पोटसको मात्रा
                                {{ $fertilizerCrop->name ?? '' }}मा
                                {{ Nepali($calculation['potash'] ?? '') }} kg
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img src="{{asset('fertilizer/dap.png')}}" alt="dap">
                        </td>
                        <td class="text-center">
                            <p class="text-center mb-0 font-weight-bold text-lg" style="padding-top:35px;">
                                आवश्यक गेडेमल (डियपि)को मात्रा
                                {{ $fertilizerCrop->name ?? '' }}मा
                                {{ Nepali($calculation['dap'] ?? '') }} kg
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img src="{{asset('fertilizer/urea.png')}}" alt="urea">
                        </td>
                        <td class="text-center">
                            <p class="text-center mb-0 font-weight-bold text-lg" style="padding-top:35px;">
                                आवश्यक चिनीमल (युरिया)को मात्रा
                                {{ $fertilizerCrop->name ?? '' }}मा
                                {{ Nepali($calculation['urea'] ?? '') }} kg
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
