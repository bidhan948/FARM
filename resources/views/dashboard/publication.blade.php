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
                    <p class="">{{ __('प्रकाशनको सुचिहरु') }}</p>
                </div>
                <div class="
                    col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('प्रकाशन थप्नुहोस') }}</a>
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
                    @foreach ($publications as $key => $publication)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center text-sm">{{ $publication->title }}
                            </td>
                            <td class="text-center text-sm">{{ $publication->sub_title }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.publication.download', $publication->publicationDocument[0]->document) }}">
                                    <i class="fas fa-download text-primary fa-2x"></i>
                                </a>
                            </td>
                            <td class="text-center"><a class="btn-sm btn-success text-white"
                                    href="{{ route('Publication.edit', $publication) }}" style="cursor: pointer;"><i
                                        class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding publication status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('प्रकाशन थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('Publication.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('शिर्षक') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input name="title" class="form-control form-control-sm @error('title') is-invalid @enderror">
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
                                    <input name="sub_title" class="form-control form-control-sm  @error('sub_title') is-invalid @enderror">
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
                                    <input name="document[]" type="file" class="form-control form-control-sm  @error('document') is-invalid @enderror" multiple>
                                    @error('document')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('फाइलको फिल्ड खाली छ ') }}
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
    {{-- end of modal for adding publication status --}}
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
