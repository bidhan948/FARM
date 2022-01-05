@extends('layouts.main')
@section('title', $agriculture_animal_detail->title)
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_page', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ $agriculture_animal_detail->title . __('को सुचिहरु') }}</p>
                </div>
                <div class="
                    col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ $agriculture_animal_detail->title . __(' थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('शिर्षक') }}</th>
                        <th class="text-center">{{ __('उपशिर्षक') }}</th>
                        <th class="text-center">{{ __('फाइल') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $key => $page)
                        <tr>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding page status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ $agriculture_animal_detail->title . __(' थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post"
                        action="{{ route('agriculture-animal-detail.page.store', $agriculture_animal_detail) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('शिर्षक') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input name="title"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror">
                                    @error('title')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('शिर्षकको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('अन्तर्गत') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select name="page_id" class="form-control-sm select2 form-control">
                                        <option value="">{{ __('---अनतर्गत भएमा छान्नुहोस्--') }}</option>
                                        @foreach ($parentPages as $parent)
                                             <option value="{{$parent->id}}">{{$parent->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_title')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('अन्तर्गतको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('विवरण') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <textarea name="long_desc" id="editor"
                                        class="form-control @error('long_desc') is-invalid @enderror"></textarea>
                                    @error('long_desc')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('विवरणको फिल्ड खाली छ ') }}
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
    {{-- end of modal for adding page status --}}
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('editor');
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('.select2').select2();
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
