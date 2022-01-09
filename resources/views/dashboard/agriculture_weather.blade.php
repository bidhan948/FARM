@extends('layouts.main')
@section('title', 'कृषि - मौसम सल्लाह बुलेटिन')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_about_us', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('कृषि - मौसम सल्लाह बुलेटिनको सुचिहरु') }}</p>
                </div>
                <div class="
                    col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('कृषि - मौसम सल्लाह बुलेटिन थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('कृषि - मौसम सल्लाह बुलेटिन') }}</th>
                        <th class="text-center">{{ __('लागु ?') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding about_us status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold">{{ __('कृषि - मौसम सल्लाह बुलेटिन थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('agriculture-weather.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('शिर्षक') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('title') }}" name="title"
                                        class="form-control  @error('title') is-invalid @enderror">
                                    @error('title')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('शिर्षकको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('वर्ष') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="number" value="{{ old('year') }}" name="year"
                                        class="form-control  @error('year') is-invalid @enderror">
                                    @error('year')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('वर्षको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('देखि') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" name="dateFromBs"
                                        class="form-control  @error('dateFromBs') is-invalid @enderror" readonly
                                        id="nepali_datepicker">
                                    @error('dateFromBs')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('देखिको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('सम्म') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" name="dateToBs"
                                        class="form-control  @error('dateToBs') is-invalid @enderror" readonly
                                        id="nepali_datepicker1">
                                    @error('dateToBs')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('सम्मको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('विवरण') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <textarea name="long_desc" id="editor" class="form-control"></textarea>
                                    @error('long_desc')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('विवरणको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="date_desc" id="date_desc">
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">पेश
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
    {{-- end of modal for adding about_us status --}}
@endsection

@section('scripts')
    <script src="{{ asset('js/agriculture_weather.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
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
