@extends('layouts.main')
@section('title', 'crop: (बालि)')
@section('menu_show', 'menu-open')
@section('s_child_setting_formula', 'block')
@section('fertilizer_crop', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('crop: बालिको सुचिहरु') }}</p>
                </div>
                <div class="
                        col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus px-2"></i> {{ __('crop: (बालि) थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('बालि') }}</th>
                        <th class="text-center">{{ __('पोटसको मात्रा') }}</th>
                        <th class="text-center">{{ __('गेडेमल (डियपि) मात्रा') }}</th>
                        <th class="text-center">{{ __('चिनीमल (युरिया) मात्रा') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td class="text-center" colspan="6">{{ $category->name }}
                            </td>
                        </tr>
                        @foreach ($category->fertilizerCrop as $fertilizerCrop)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $fertilizerCrop->name }}
                                </td>
                                <td class="text-center">{{ Nepali($fertilizerCrop->potash) }}</td>
                                <td class="text-center">{{ Nepali($fertilizerCrop->dap) }}</td>
                                <td class="text-center">{{ Nepali($fertilizerCrop->urea) }}</td>
                                <td class="text-center"><a class="btn-sm btn-success text-white" data-toggle="modal"
                                        data-target="#modal-lg{{ $key + 1 }}" style="cursor: pointer;"><i
                                            class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>
                                    {{-- modal for adding crop status --}}
                                    <div class="modal fade text-sm" id="modal-lg{{ $key + 1 }}">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="">{{ __('crop: (बालि) थप्नुहोस') }}</h5>
                                                    <button type=" button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ route('Crop.update', $fertilizerCrop) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('बालि') }} <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="name"
                                                                        value="{{ $fertilizerCrop->name }}"
                                                                        class="form-control  @error('name') is-invalid @enderror">
                                                                    @error('name')
                                                                        <p class="invalid-feedback mb-0"
                                                                            style="font-size: 0.9rem">
                                                                            {{ __('crop: (बालि)को फिल्ड खाली छ ') }}
                                                                        </p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('बर्ग') }} <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <select name="category_id"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">{{ __('---छान्नुहोस्---') }}
                                                                        </option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                {{ $fertilizerCrop->id == $category->id ? 'selected' : '' }}>
                                                                                {{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('category_id')
                                                                        <p class="invalid-feedback mb-0"
                                                                            style="font-size: 0.9rem">
                                                                            {{ __('crop: (बालि)को फिल्ड खाली छ ') }}
                                                                        </p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6 my-3">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('पोटसको मात्रा') }} <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="potash"
                                                                        value="{{ $fertilizerCrop->potash }}"
                                                                        class="form-control  @error('potash') is-invalid @enderror">
                                                                    @error('potash')
                                                                        <p class="invalid-feedback mb-0"
                                                                            style="font-size: 0.9rem">
                                                                            {{ __('पोटसको मात्राको फिल्ड खाली छ ') }}
                                                                        </p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6 my-3">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('गेडेमल (डियपि) मात्रा') }} <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="dap"
                                                                        value="{{ $fertilizerCrop->dap }}"
                                                                        class="form-control  @error('dap') is-invalid @enderror">
                                                                    @error('dap')
                                                                        <p class="invalid-feedback mb-0"
                                                                            style="font-size: 0.9rem">
                                                                            {{ __('गेडेमल (डियपि) मात्राको फिल्ड खाली छ ') }}
                                                                        </p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('चिनीमल (युरिया) मात्रा') }} <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="urea"
                                                                        value="{{ $fertilizerCrop->urea }}"
                                                                        class="form-control  @error('urea') is-invalid @enderror">
                                                                    @error('urea')
                                                                        <p class="invalid-feedback mb-0"
                                                                            style="font-size: 0.9rem">
                                                                            {{ __('चिनीमल (युरिया) मात्राको फिल्ड खाली छ ') }}
                                                                        </p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-4 ">
                                                                <button type="submit" class="btn-sm btn btn-primary">पेश
                                                                    गर्नुहोस्</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    {{-- end of modal for adding crop status --}}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding crop status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('crop: (बालि) थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('Crop.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('बालि') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control  @error('name') is-invalid @enderror">
                                    @error('name')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('crop: (बालि)को फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('बर्ग') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select name="category_id" class="form-control form-control-sm">
                                        <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('crop: (बालि)को फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 my-3">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('पोटसको मात्रा') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('potash') }}" name="potash"
                                        class="form-control  @error('potash') is-invalid @enderror">
                                    @error('potash')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('पोटसको मात्राको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 my-3">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('गेडेमल (डियपि) मात्रा') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('dap') }}" name="dap"
                                        class="form-control  @error('dap') is-invalid @enderror">
                                    @error('dap')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('गेडेमल (डियपि) मात्राको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('चिनीमल (युरिया) मात्रा') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('urea') }}" name="urea"
                                        class="form-control  @error('urea') is-invalid @enderror">
                                    @error('urea')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('चिनीमल (युरिया) मात्राको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 ">
                                <button type="submit" class="btn-sm btn btn-primary">पेश
                                    गर्नुहोस्</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end of modal for adding crop status --}}
@endsection

@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        window.onload = function() {
            if ({{ $errors->any() }}) {
                $('#modal-lg').modal('show');
            }
        }
    </script>
@endsection
