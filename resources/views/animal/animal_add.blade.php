@extends('layouts.main')
@section('title', $land_owner->name_nepali .'को पशु विवरण भर्नुहोस्')
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
            <form method="post" action="{{ route('animal_detail_store', $land_owner) }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center float-left font-weight-bold">{{ __('पशु तथ्याङ्ग') }}</p>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-primary text-white mb-0 float-right" onclick="addAnimalDetail()">
                                    <i class="fas fa-plus-circle px-1"></i>{{ __('पशु तथ्याङ्ग थप्नुहोस') }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('पशु विवरण') }}</th>
                                        <th class="text-center">{{__('स्रोत')}}</th>
                                        <th class="text-center">{{ __('कुल संख्या') }}</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody id="animal_detail">
                                    <tr>
                                        <td class="text-center">
                                            <select name="animal_id[]" class="form-control-sm form-control">
                                                @foreach ($animals as $animal)
                                                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select name="seed_source_id[]" class="form-control-sm form-control">
                                                @foreach ($seed_sources as $seed_source)
                                                    <option value="{{ $seed_source->id }}">{{ $seed_source->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                      
                                        <td class="text-center"><input type="number" class="form-control form-control-sm"
                                                name="total_number[]"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="my-2" style="width: 100%">
                </div>
                <!-- this is for animal poroduction -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center float-left font-weight-bold">{{ __('पशुजन्य उत्पादन') }}</p>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-primary text-white mb-0 float-right" onclick="addAnimalProduct()">
                                    <i class="fas fa-plus-circle px-1"></i>{{ __('पशुजन्य उत्पादन थप्नुहोस') }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('पशु विवरण') }}</th>
                                        <th class="text-center">{{__('इकाई')}}</th>
                                        <th class="text-center">{{ __('उत्पादन') }}</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody id="animal_product">
                                    <tr>
                                        <td class="text-center">
                                            <select name="animal_id[]" class="form-control-sm form-control">
                                                @foreach ($animals as $animal)
                                                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select name="unit_id[]" class="form-control-sm form-control">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                      
                                        <td class="text-center"><input type="number" class="form-control form-control-sm"
                                                name="production[]"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- this is end for animal poroduction -->

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
    let x = 2;
    let j = 2;
    function addAnimalDetail(){
        var html = '<tr id="removedetail'+x+'">'+
                    '<td class="text-center">'+
                        '<select name="animal_id[]" class="form-control-sm form-control">'+
                            '@foreach ($animals as $animal)'+
                                '<option value="{{ $animal->id }}">{{ $animal->name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td class="text-center">'+
                        '<select name="seed_source_id[]" class="form-control-sm form-control">'+
                            '@foreach ($seed_sources as $seed_source)'+
                                '<option value="{{ $seed_source->id }}">{{ $seed_source->name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td class="text-center"><input type="number" class="form-control form-control-sm"'+
                            'name="total_number[]"></td>'+
                    '<td class="text-center"><i class="fas fa-trash-alt text-danger fa-2x" onclick="removeAnimalDetail('+x+')"></i></td>'+
                '</tr>';
        x++;
        $("#animal_detail").append(html);
    }
    
    function removeAnimalDetail(param) {
        $("#removedetail"+param).html("");    
    }
    function addAnimalProduct() {
        var html ='<tr id="removeAnimalProduct'+j+'">'+
                    '<td class="text-center">'+
                        '<select name="animal_id[]" class="form-control-sm form-control">'+
                            '@foreach ($animals as $animal)'+
                                '<option value="{{ $animal->id }}">{{ $animal->name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td class="text-center">'+
                        '<select name="unit_id[]" class="form-control-sm form-control">'+
                            '@foreach ($units as $unit)'+
                                '<option value="{{ $unit->id }}">{{ $unit->name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td class="text-center"><input type="number" class="form-control form-control-sm"'+
                            'name="production[]"></td>'+
                    '<td class="text-center"><i class="fas fa-trash-alt text-danger fa-2x" onclick="removeAnimalProduct('+j+')"></i></td>'+
                '</tr>';
                j++;
        $("#animal_product").append(html);
    }

    function removeAnimalProduct(params) {
        $("#removeAnimalProduct"+params).html("");
    }
</script>
@endsection
