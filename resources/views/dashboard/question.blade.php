@extends('layouts.main')
@section('title', 'प्रश्न')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_question', 'active')
@section('main_content')

<div class="card text-sm ">
    <div class="card-header my-2">
        <div class="row my-1">
            <div class="col-md-6" style="margin-bottom:-5px;">
                <p class="">{{ __('प्रश्नको सुचिहरु') }}</p>
            </div>
            <div class="
                    col-md-6 text-right">
                <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                    {{ __('प्रश्न थप्नुहोस') }}</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">{{ __('क्र.स.') }}</th>
                    <th class="text-center">{{ __('प्रश्न') }}</th>
                    <th class="text-center">{{ __('लागु ?') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($question as $key => $question)
                    <tr>
                        <td class="text-center"><a class="btn-sm btn-success text-white" data-toggle="modal"
                                data-target="#modal-lg{{ $key + 1 }}" style="cursor: pointer;"><i
                                    class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>

                            {{-- modal for adding question status --}}
                            <div class="modal fade text-sm" id="modal-lg{{ $key + 1 }}">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="">{{ __('प्रश्न सच्याउनुहोस् ') }}</h5>
                                            <button type=" button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('about-us.update',$question) }}">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 my-2">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    {{ __('प्रश्न') }} <span
                                                                        class="text-danger px-1 font-weight-bold">*</span>
                                                                </span>
                                                            </div>
                                                            <textarea name="question" id="editor1"
                                                                class="form-control">{!! $question->question !!}</textarea>
                                                            @error('question')
                                                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                    {{ __('प्रश्नको फिल्ड खाली छ ') }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 my-2">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    {{ __('Is active') }} <span
                                                                        class="text-danger px-1 font-weight-bold">*</span>
                                                                </span>
                                                            </div>
                                                            <select name="is_active"
                                                                class="form-control form-control-sm">
                                                                <option value="0" {{$question->is_active ? "" : "selected"}}>{{ 'होइन' }}</option>
                                                                <option value="1" {{$question->is_active ? "selected" : ""}}>{{ 'हो' }}</option>
                                                            </select>
                                                            @error('is_active')
                                                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                    {{ __('Is active फिल्ड खाली छ ') }}
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
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- end of modal for adding question status --}}
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>

{{-- modal for adding question status --}}
<div class="modal fade text-sm" id="modal-lg">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">{{ __('प्रश्न थप्नुहोस') }}</h5>
                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('about-us.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 my-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('प्रश्न') }} <span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <textarea name="question" id="editor" class="form-control"></textarea>
                                @error('question')
                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                        {{ __('प्रश्नको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 my-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('Is active') }} <span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <select name="is_active" class="form-control form-control-sm">
                                    <option value="0">{{ 'होइन' }}</option>
                                    <option value="1">{{ 'हो' }}</option>
                                </select>
                                @error('question')
                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                        {{ __('प्रश्नको फिल्ड खाली छ ') }}
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
{{-- end of modal for adding question status --}}
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('editor1');
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
