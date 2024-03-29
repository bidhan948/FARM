@extends('layouts.main')
@section('title', 'भूमिका')
@section('is_active_role', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('भूमिकाको सुचिहरु') }}</p>
                </div>
                @can('ADD_ROLE')
                    <div class="
                            col-md-6 text-right">
                        <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                            {{ __('भूमिका थप्नुहोस') }}</a>
                    </div>
                @endcan
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('भूमिका') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center">{{ $role->name }}
                            </td>
                            @can('MANAGE_PERMISSION')
                                <td class="text-center"><a href="{{ route('role.permission', $role) }}"
                                        class="btn btn-sm btn-danger">{{ __('अनुमति प्रबन्ध गर्नुहोस्') }}</a></td>
                            @endcan
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @can('ADD_ROLE')
        {{-- modal for adding role status --}}
        <div class="modal fade text-sm" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="">{{ __('भूमिका थप्नुहोस') }}</h5>
                        <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('role.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                {{ __('भूमिका') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ old('name') }}" name="name"
                                            class="form-control  @error('name') is-invalid @enderror">
                                        @error('name')
                                            <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                {{ __('भूमिकाको फिल्ड खाली छ ') }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('के तपाई निश्चित हुनुहुन्छ ?')">पेश
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
        {{-- end of modal for adding role status --}}
    @endcan
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
