@extends('layouts.main')
@section('title', 'कृषि विवरण भर्नुहोस्')
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
            <form method="post" action="{{ route('agriculture_detail_store', $land_owner) }}">
                @csrf
                <div class="row">
                    @foreach ($crop_types as $crop_type)
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-center float-left font-weight-bold">{{ $crop_type->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-sm btn-primary text-white mb-0 float-right"
                                        onclick="addCropType({{ $crop_type->id }})">
                                        <i
                                            class="fas fa-plus-circle px-1"></i>{{ $crop_type->name }}{{ __(' थप्नुहोस') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('बाली') }}</th>
                                            @foreach ($crop_areas as $crop_area)
                                                <th class="text-center">{{ $crop_area->name }}</th>
                                            @endforeach
                                            <th class="text-center">{{ __('उत्पादन(किलो)') }}<span class="text-danger font-weight-bold px-1">*</span></th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="crop{{ $crop_type->id }}">
                                        <tr>
                                            <td class="text-center">
                                                <select name="crop_id[{{ $crop_type->id }}][]"
                                                    class="form-control select2 form-control-sm @error('crop_id') is-invalid @enderror">
                                                    <option value="">
                                                        {{ __('----छान्नुहोस् ----') }}
                                                    </option>
                                                    @foreach ($crop_type->Crop as $crop)
                                                        <option value="{{ $crop->id }}">{{ $crop->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('crop_id')
                                                    <p class="invalid-feedback" style="font-size: 0.9rem">
                                                        {{ __('उमेरको फिल्ड खाली छ |') }}
                                                    </p>
                                                @enderror
                                            </td>
                                            <td class="text-center">
                                                <input name="area1[{{ $crop_type->id }}][]" id=""
                                                    class="form-control-sm form-control">
                                            </td>
                                            <td class="text-center">
                                                <input name="area2[{{ $crop_type->id }}][]" id=""
                                                    class="form-control-sm form-control">
                                            </td>
                                            <td class="text-center">
                                                <input name="area3[{{ $crop_type->id }}][]" id=""
                                                    class="form-control-sm form-control">
                                            </td>
                                            <td class="text-center">
                                                <input name="area4[{{ $crop_type->id }}][]" id=""
                                                    class="form-control-sm form-control">
                                            </td>
                                            <td class="text-center">
                                                <input name="total_production[{{ $crop_type->id }}][]" id=""
                                                    class="form-control-sm form-control">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="my-2" style="width: 100%">
                    @endforeach
                </div>
                <div class="row">
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बीउबिजनको स्रोत ') }}  <span class="text-danger font-weight-bold px-1">*</span>
                            </div>
                            <select name="seed_source_id"
                                class="form-control form-control-sm @error('seed_source_id') is-invalid @enderror">
                                <option value="">{{ __('----छान्नुहोस्----') }}</option>
                                @foreach ($seed_sources as $seed_source)
                                    <option value="{{ $seed_source->id }}">{{ $seed_source->name }}</option>
                                @endforeach
                            </select>
                            @error('seed_source_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बीउबिजनको स्रोत फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('बीउबिजनको प्रदायक ') }}  <span class="text-danger font-weight-bold px-1">*</span>
                            </div>
                            <select name="seed_supplier_id[]" multiple="multiple"
                                class="form-control select2 form-control-sm @error('seed_supplier_id') is-invalid @enderror" data-placeholder="----छान्नुहोस्----">
                                @foreach ($seed_suppliers as $seed_supplier)
                                    <option value="{{ $seed_supplier->id }}">{{ $seed_supplier->name }}</option>
                                @endforeach
                            </select>
                            @error('seed_supplier_id')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('बीउबिजनको प्रदायक फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 my-3">
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
        let x = 4;

        function addCropType(landTypeId) {
            var html = '<tr id="removecrop'+x+'">'
                    +'<td class="text-center">'
                        +'<select name="crop_id['+landTypeId+'][]"'
                            +'class="form-control select2 form-control-sm">'
                            +'<option value="">'
                               +'छान्नुहोस्'
                            +'</option>'
                            +'@foreach ($crops as $crop)'
                                    +'<option value="{{ $crop->id }}">{{ $crop->name }}'
                                    +'</option>'
                            +'@endforeach'
                        +'</select>'
                    +'</td>'
                    +'<td class="text-center">'
                        +'<input name="area1['+landTypeId+'][]" id="" class="form-control-sm form-control">'
                    +'</td>'
                    +'<td class="text-center">'
                        +'<input name="area2['+landTypeId+'][]" id="" class="form-control-sm form-control">'
                    +'</td>'
                    +'<td class="text-center">'
                        +'<input name="area3['+landTypeId+'][]" id="" class="form-control-sm form-control">'
                    +'</td>'
                    +'<td class="text-center">'
                        +'<input name="area4['+landTypeId+'][]" id="" class="form-control-sm form-control">'
                    +'</td>'
                    +'<td class="text-center">'
                        +'<input name="total_production['+landTypeId+'][]" id="" class="form-control-sm form-control">'
                    +'</td>'
                    +'<td><i class="fas fa-trash-alt fa-2x text-danger" onclick="removeCrop('+x+')"></i></td>'
                    +'</tr>';
                    x++;
            $("#crop" + landTypeId).append(html);
        }

        function removeCrop(param) {
            $("#removecrop" + param).html("");
        }
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('.select2').select2()
        });
    </script>
@endsection
