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
                        <th class="text-center">{{ __('प्रश्नको प्रकार') }}</th>
                        <th class="text-center">{{ __('उत्तर') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $key => $question)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $question->question }}</td>
                            <td class="text-center">{{ $question->is_insurance ? 'बिमा' : 'बारम्बार सोधिने प्रश्न' }}
                            </td>
                            <td class="text-center">{!! $question->answer !!}</td>
                            <td class="text-center">
                                @if ($question->deleted_at == null)
                                    <a class="text-danger" style="cursor: pointer;" onclick="destroy({{ $key + 1 }})
                                                            "><i class="fas fa-trash-alt pb-0 fa-2x"></i></a>
                                    <form id="logout-form{{ $key + 1 }}"
                                        action="{{ route('question.destroy', $question) }}" method="POST"
                                        class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('question.restore', $question->id) }}" class="text-success"
                                        style="cursor: pointer;"><i class="fas fa-trash-restore fa-2x"></i></a>
                                @endif
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
                    <form method="post" action="{{ route('question.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('प्रश्नको प्रकार') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select id="is_insurance" name="is_insurance"
                                        class="form-control @error('is_insurance') is-invalid @enderror form-control-sm">
                                        <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                        <option value="1">{{ 'बिमा' }}</option>
                                        <option value="0">{{ 'बारम्बार सोधिने प्रश्न' }}</option>
                                    </select>
                                    @error('is_insurance')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('प्रश्नको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            @livewire('crop-parent-child', ['crop_types' => $crop_types])

                            <div class="col-12 my-2 ">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('प्रश्न') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" name="question"
                                        class="form-control form-control-sm @error('question') is-invalid @enderror">
                                    @error('question')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('प्रश्नको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('उत्तर') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <textarea name="answer" id="editor"
                                        class="form-control @error('answer') is-invalid @enderror"></textarea>
                                    @error('answer')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('उत्तरको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" onclick="return confirm('के तपाई निश्चित हुनुहुन्छ ?');"
                                    class="btn btn-primary">पेश
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
        CKEDITOR.replace('editor');

        function destroy(params) {
            if (confirm("के तपाई निश्चित हुनुहुन्छ ?")) {
                event.preventDefault();
                document.getElementById('logout-form' + params).submit();
            }
        }
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $("#is_insurance").on("change", function() {
                if ($("#is_insurance").val() == 1) {
                    $(".no_insurance").css("display", "none");
                } else {
                    $(".no_insurance").css("display", "block");
                }
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
