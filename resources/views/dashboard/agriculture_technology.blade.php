@extends('layouts.main')
@section('title', 'कृषि प्रबिधि')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_ag_tech', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('कृषि प्रबिधिको सुचिहरु') }}</p>
                </div>
                <div class="
                    col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('कृषि प्रबिधि थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('बाली') }}</th>
                        <th class="text-center">{{ __('शिर्षक') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agriculture_technologies as $key => $agriculture_technology)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $agriculture_technology->Crop->name }}</td>
                            <td class="text-center">{{ $agriculture_technology->title }}</td>
                            <td class="text-center">
                                <a
                                    href="{{ route('dashboard.agriculture_technology_download', $agriculture_technology->document) }}">
                                    <i class="fas fa-download text-primary fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding agriculture_technology status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('कृषि प्रबिधि थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('agriculture-technique.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @livewire('crop-parent-child', ['crop_types' => $crop_types])
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('शिर्षक ') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" name="title"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror">
                                    @error('title')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('शिर्षक को फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('लेखक ') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" name="author"
                                        class="form-control form-control-sm @error('author') is-invalid @enderror">
                                    @error('author')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('लेखक को फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('फाइल ') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="file" name="document"
                                        class="form-control form-control-sm @error('document') is-invalid @enderror">
                                    @error('document')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('फाइल को फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" onclick="return confirm('के तपाई निश्चित हुनुहुन्छ ?');"
                                    class="btn btn-primary btn-sm">पेश
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
    {{-- end of modal for adding agriculture_technology status --}}
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
