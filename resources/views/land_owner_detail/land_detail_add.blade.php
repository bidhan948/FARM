@extends('layouts.main')
@section('title', 'जग्गा विवरण भर्नुहोस्')
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
            <form method="post" action="{{ route('land-owner.store') }}">
                @csrf
                <div class="row">
                    @livewire('land-detail',['land_types'=> $land_types])
                    <div class="mt-3 col-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('खेति योग्य क्षेत्र') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('cultivable_area') }}" name="cultivable_area"
                                class="form-control  @error('cultivable_area') is-invalid @enderror" id="cultivable_area"
                                readonly>
                            @error('cultivable_area')
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
                                    {{ __('खेति गरिएको क्षेत्रफल') }}<span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="text" value="{{ old('cultivable_area') }}" name="cultivable_area"
                                class="form-control  @error('cultivable_area') is-invalid @enderror" id="cultivable_area"
                                readonly>
                            @error('cultivable_area')
                                <p class="invalid-feedback" style="font-size: 0.9rem">
                                    {{ __('टोलको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
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
        let j = 3;
        let k = 3;
        let z = 4;

        function addLandDetail(i) {
            j++;
            k++;
            if (i) {
                var html =
                    '<tr id="remove' + x +
                    '" colspan="4" class="text-danger text-center"><td><i class="fas fa-2x fa-trash-alt text-danger" onclick="removeLand(' +
                    x + ')"></i></td></tr>' +
                    '<tr id="remove_1_' + x + '">' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm" name="land_type_id[1]" value="नम्बरी जग्गा" readonly="true">' +
                    '</td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="kitta_no[1]" value="0"></td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="area1[1]" id="area1_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area2[1]" value="0" id="area2_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area3[1]" value="0" id="area3_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="bargha_area[1]" value="0" id="bargha_area_' + j + '"></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-control-sm" name="is_bajho[1]" id="is_bajho_' +
                    j + '">' +
                    '</td>' +
                    '<td class="text-center"><input type="checkbox" class=" form-control-sm"' +
                    'name="is_charan_kharka[1]" id="is_charan_kharka_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class=" form-control-sm" name="remark[1]"></td>' +
                    '</tr>' + '<tr id="remove_2_' + x + '">' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm" name="land_type_id[2]" value="ऐलानी जग्गा" readonly="true">' +
                    '</td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="kitta_no[2]" value="0"></td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' + (j++) +
                    'name="area1[2]" id="area1_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area2[2]" id="area2_' + j + '" value="0"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area3[2]" id="area3_' + j + '" value="0"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="bargha_area[2]" value="0" id="bargha_area_' + j + '"></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-control-sm" id="is_bajho_' + j +
                    '" name="is_bajho[2]">' +
                    '</td>' +
                    '<td class="text-center"><input type="checkbox" class=" form-control-sm"' +
                    'name="is_charan_kharka[2]" id="is_charan_kharka_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class=" form-control-sm" name="remark[2]"></td>' +
                    '</tr>' + '<tr id="remove_3_' + x + '">' + (j++) +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm" name="land_type_id[3]" value="सरकारी जग्गा" readonly="true">' +
                    '</td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="kitta_no[3]" value="0"></td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="area1[3]" id="area1_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area2[3]" value="0" id="area2_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area3[3]" value="0" id="area3_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="bargha_area[3]" value="0" id="bargha_area_' + j + '"></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-control-sm" id="is_bajho_' + j +
                    '" name="is_bajho[3]">' +
                    '</td>' +
                    '<td class="text-center"><input type="checkbox" class=" form-control-sm"' +
                    'name="is_charan_kharka[3]"  id="is_charan_kharka_' + j + '"></td>' +
                    '<td class="text-center"><input type="text" class=" form-control-sm" name="remark[3]"></td>' +
                    '</tr>';
                x++;
                $("#assignLandDetail").append(html);
            } else {
                var html =
                    '<tr id="remove' + x +
                    '" colspan="4" class="text-danger text-center"><td><i class="fas fa-2x fa-trash-alt text-danger" onclick="removeLand(' +
                    x + ')"></i></td></tr>' +
                    '<tr id="remove_1_' + x + '">' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm" name="land_type_id[1]" value="नम्बरी जग्गा" readonly="true">' +
                    '</td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="kitta_no[1]" value="0"></td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="area1[1]" id="area1_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area2[1]" value="0" id="area2_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area3[1]" value="0" id="area3_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area4[1]" value="0" id="area4_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="bargha_area[1]" value="0" id="bargha_area_' + k + '"></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-control-sm" name="is_bajho[1]" id="is_bajho_' +
                    j + '">' +
                    '</td>' +
                    '<td class="text-center"><input type="checkbox" class=" form-control-sm"' +
                    'name="is_charan_kharka[1]" id="is_charan_kharka_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class=" form-control-sm" name="remark[1]"></td>' +
                    '</tr>' + '<tr id="remove_2_' + x + '">' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm" name="land_type_id[2]" value="ऐलानी जग्गा" readonly="true">' +
                    '</td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="kitta_no[2]" value="0"></td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' + (k++) +
                    'name="area1[2]" id="area1_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area2[2]" id="area2_' + k + '" value="0"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area3[2]" id="area3_' + k + '" value="0"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area4[2]" id="area4_' + k + '" value="0"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="bargha_area[2]" value="0" id="bargha_area_' + k + '"></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-control-sm" id="is_bajho_' + k +
                    '" name="is_bajho[2]">' +
                    '</td>' +
                    '<td class="text-center"><input type="checkbox" class=" form-control-sm"' +
                    'name="is_charan_kharka[2]" id="is_charan_kharka_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class=" form-control-sm" name="remark[2]"></td>' +
                    '</tr>' + '<tr id="remove_3_' + x + '">' + (k++) +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm" name="land_type_id[3]" value="सरकारी जग्गा" readonly="true">' +
                    '</td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="kitta_no[3]" value="0"></td>' +
                    '<td class="text-center"> <input type="text" class="form-control form-control-sm"' +
                    'name="area1[3]" id="area1_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area2[3]" value="0" id="area2_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area3[3]" value="0" id="area3_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="area4[3]" value="0" id="area4_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class="form-control form-control-sm"' +
                    'name="bargha_area[3]" value="0" id="bargha_area_' + k + '"></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-control-sm" id="is_bajho_' + k +
                    '" name="is_bajho[3]">' +
                    '</td>' +
                    '<td class="text-center"><input type="checkbox" class=" form-control-sm"' +
                    'name="is_charan_kharka[3]"  id="is_charan_kharka_' + k + '"></td>' +
                    '<td class="text-center"><input type="text" class=" form-control-sm" name="remark[3]"></td>' +
                    '</tr>';
                x++;
                $("#assignLandDetail").append(html);
            }
        }

        function removeLand(x) {
            z--;
            console.log();
            $("#remove" + x).html("");
            $("#remove_1_" + x).html("");
            $("#remove_2_" + x).html("");
            $("#remove_3_" + x).html("");
        }
    </script>
@endsection
