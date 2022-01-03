@extends('layouts.main')
@section('title', 'प्रकाशन')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_publication', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('प्रकाशन सच्याउनुहोस्') }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('Publication.update', $publication) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4 my-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('शिर्षक') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input name="title" class="form-control form-control-sm @error('title') is-invalid @enderror"
                                value="{{ $publication->title }}">
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
                                    {{ __('उपशिर्षक') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input name="sub_title"
                                class="form-control form-control-sm  @error('sub_title') is-invalid @enderror"
                                value="{{ $publication->sub_title }}">
                            @error('sub_title')
                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                    {{ __('उपशिर्षकको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 my-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('फाइल') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input name="publication_document[]" type="file"
                                class="form-control form-control-sm  
                            @error('publication_document') is-invalid @enderror"
                                multiple>
                            @error('publication_document')
                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                    {{ __('फाइलको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    @foreach ($publication->publicationDocument as $document)
                        <input type="hidden" name="document[]" value="{{ $document->document }}">
                    @endforeach
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary">पेश
                            गर्नुहोस्</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
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
