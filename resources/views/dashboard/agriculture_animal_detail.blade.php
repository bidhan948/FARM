@extends('layouts.main')
@section('title', 'कृषि तथा पशुपन्छि सम्बन्धि आधारभूत जानकारी')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_agriculture_animal_detail', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('कृषि तथा पशुपन्छि सम्बन्धिको सुचिहरु') }}</p>
                </div>
                <div class="
                    col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('कृषि तथा पशुपन्छि सम्बन्धि थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('बलिको प्रकार') }}</th>
                        <th class="text-center">{{ __('शिर्षक') }}</th>
                        <th class="text-center">{{ __('फोटो') }}</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agriculture_animal_details as $key => $agriculture_animal_detail)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center">{{ $agriculture_animal_detail->cropType->name }}</td>
                            <td class="text-center">{{ $agriculture_animal_detail->title }}</td>
                            <td class="text-center"><a
                                    href="{{ asset('storage/crop/' . $agriculture_animal_detail->featured_image) }}"
                                    target="_blank"><img
                                        src="{{ asset('storage/crop/' . $agriculture_animal_detail->featured_image) }}"
                                        alt="बालि" width="50" height="50"></a>
                            </td>
                            <td class="text-center"><a
                                    href="{{ route('agriculture-animal-detail.page.create', $agriculture_animal_detail) }}"
                                    class="btn btn-sm btn-success">{{ $agriculture_animal_detail->title . ' थप्नुहोस' }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding agriculture-animal-detail status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('कृषि तथा पशुपन्छि सम्बन्धि थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('agriculture-animal-detail.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('बलिको प्रकार') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select name="crop_type_id"
                                        class="form-control @error('crop_type_id') is-invalid @enderror form-control-sm">
                                        <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                        @foreach ($crop_types as $crop_type)
                                            <option value="{{ $crop_type->id }}">{{ $crop_type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('crop_type_id')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('बलिको प्रकारको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('शिर्षक') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input name="title"
                                        class="form-control form-control-sm  @error('title') is-invalid @enderror">
                                    @error('title')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('शिर्षकको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('फोटो') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input name="featured_image" type="file"
                                        class="form-control form-control-sm  @error('featured_image') is-invalid @enderror"
                                        multiple>
                                    @error('featured_image')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('फोटोको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">पेश
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
    {{-- end of modal for adding agriculture-animal-detail status --}}
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
