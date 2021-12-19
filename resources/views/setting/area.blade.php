@extends('layouts.main')
@section('title', 'छेत्रफल')
@section('menu_open', 'menu-open')
@section('s_child', 'block')
@section('setting_area', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('छेत्रफलको सुचिहरु') }}</p>
                </div>
                <div class="
                        col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('छेत्रफल थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('छेत्रफल') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($regions as $region)
                        @foreach ($region->Area as $area)
                            <tr>
                                <td class="text-center">{{ Nepali($i++) }}</td>
                                <td class="text-center">{{ $area->name }} / {{ $region->name }}
                                </td>
                                <td class="text-center"><a class="btn-sm btn-success text-white" data-toggle="modal"
                                        data-target="#modal-lg{{ $i }}" style="cursor: pointer;"><i
                                            class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>

                                    {{-- modal for adding area status --}}
                                    <div class="modal fade text-sm" id="modal-lg{{ $i }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="">{{ __('छेत्रफल सच्याउनुहोस् ') }}</h5>
                                                    <button type=" button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('area.update', $area) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('छेत्रफल') }} <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" value="{{ $area->name }}"
                                                                        name="name"
                                                                        class="form-control  @error('name') is-invalid @enderror">
                                                                    @error('name')
                                                                        <p class="invalid-feedback mb-0"
                                                                            style="font-size: 0.9rem">
                                                                            {{ __('छेत्रफलको फिल्ड खाली छ ') }}
                                                                        </p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            {{ __('छेत्र') }}
                                                                            <span
                                                                                class="text-danger px-1 font-weight-bold">*</span>
                                                                        </span>
                                                                    </div>
                                                                    <select name="region_id"
                                                                        class="custom-select select2 @error('region_id') is-invalid @enderror">
                                                                        @foreach ($regions as $region)
                                                                            <option value="{{ $region->id }}"
                                                                                {{ $region->id == $area->region_id ? 'selected' : '' }}>
                                                                                {{ $region->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('region_id')
                                                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                                                            {{ __('छेत्र फिल्ड खाली छ |') }}
                                                                        </p>

                                                                    @enderror
                                                                </div>
                                                                <!-- /input-group -->
                                                            </div>
                                                            <div class="col-2 mt-3">
                                                                <button type="submit" class="btn btn-primary" style="margin-left:-23px;">पेश
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
                                    {{-- end of modal for adding area status --}}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding area status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('छेत्रफल थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('area.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('छेत्रफल') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control  @error('name') is-invalid @enderror">
                                    @error('name')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('छेत्रफलको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('छेत्र') }}
                                            <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select name="region_id"
                                        class="custom-select select2 @error('region_id') is-invalid @enderror">
                                        <option value="">
                                            {{ __('-- छेत्र छान्नुहोस् --') }}
                                        </option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                        <p class="invalid-feedback" style="font-size: 0.9rem">
                                            {{ __('छेत्र फिल्ड खाली छ |') }}
                                        </p>

                                    @enderror
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-4 my-3">
                                <button type="submit" class="btn btn-primary">पेश
                                    गर्नुहोस्</button>
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
    {{-- end of modal for adding area status --}}
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
