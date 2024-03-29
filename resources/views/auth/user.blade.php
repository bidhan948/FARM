@extends('layouts.main')
@section('title', 'प्रयोगकर्ता')
@section('is_active_user', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('प्रयोगकर्ताको सुचिहरु') }}</p>
                </div>
                @can('ADD_USER')
                    <div class="
                        col-md-6 text-right">
                        <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                            {{ __('प्रयोगकर्ता थप्नुहोस') }}</a>
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
                        <th class="text-center">{{ __('प्रयोगकर्ता') }}</th>
                        <th class="text-center">{{ __('इमेल') }}</th>
                        <th class="text-center">{{ __('वडा नं') }}</th>
                        @can('UPDATE_USER')
                            <th></th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center">{{ $user->name }}
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ Nepali($user->ward_no) }}</td>
                            @can('UPDATE_USER')
                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#modal-lg{{ $user->id }}"
                                        class="btn btn-success btn-sm text-white"><i class="fas fa-edit px-1"></i>
                                        {{ __('सच्याउने') }}</a>
                                    <a data-toggle="modal" data-target="#modal-l{{ $user->id }}"
                                        class="btn btn-danger mx-1 btn-sm text-white"><i class="fas fa-key px-1"></i>
                                        {{ __('पासवोर्ड परिवर्तन') }}</a>
                                </td>
                                <div class="modal fade text-sm" id="modal-l{{ $user->id }}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="font-weight-bold">{{ __('प्रयोगकर्ता सच्याउनुहोस्') }}</h5>
                                                <button type=" button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('user.change', $user) }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-4 my-2">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('नया पासवोर्ड') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <input type="password" name="password"
                                                                    class="form-control  @error('password') is-invalid @enderror">
                                                                @error('password')
                                                                    <p class="invalid-feedback" style="font-size: 1rem">
                                                                        {{ __('पासवोर्ड फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4 my-2">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('पुन हाल्नहोस्') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <input type="password" name="password_confirmation"
                                                                    class="form-control  @error('password_confirmation') is-invalid @enderror">
                                                                @error('password_confirmation')
                                                                    <p class="invalid-feedback" style="font-size: 1rem">
                                                                        {{ __('पासवोर्ड मिलेन') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4 my-2">
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
                                <div class="modal fade text-sm" id="modal-lg{{ $user->id }}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="font-weight-bold">{{ __('प्रयोगकर्ता सच्याउनुहोस्') }}</h5>
                                                <button type=" button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('user.update', $user) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('नाम') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <input type="text" value="{{ $user->name }}" name="name"
                                                                    class="form-control  @error('name') is-invalid @enderror">
                                                                @error('name')
                                                                    <p class="invalid-feedback" style="font-size: 1rem">
                                                                        {{ __('प्रयोगकर्ताको फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('इमेल') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <input type="email" value="{{ $user->email }}" name="email"
                                                                    class="form-control  @error('email') is-invalid @enderror">
                                                                @error('email')
                                                                    <p class="invalid-feedback" style="font-size: 1rem">
                                                                        {{ __('इमेल फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('वडा नं') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <select name="ward_no" class="form-control form-control-sm">
                                                                    <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                                                    @for ($i = 1; $i < 20; $i++)
                                                                        <option value="{{ $i }}"
                                                                            {{ $user->ward_no == $i ? 'selected' : '' }}>
                                                                            {{ Nepali($i) }}</option>
                                                                    @endfor
                                                                </select>
                                                                @error('ward_no')
                                                                    <p class="invalid-feedback" style="font-size: 1rem">
                                                                        {{ __('वडा नंको फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4 my-2">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('भूमिका') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <select name="role" class="form-control form-control-sm">
                                                                    <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->name }}"
                                                                            {{ $user->roles->count() == 0 ? '' : ($user->roles[0]->name == $role->name ? 'selected' : '') }}>
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('role')
                                                                    <p class="invalid-feedback" style="font-size: 1rem">
                                                                        {{ __('भूमिकाको फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4 my-2">
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
                            @endcan
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding user status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('प्रयोगकर्ता थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('user.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('नाम') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control  @error('name') is-invalid @enderror">
                                    @error('name')
                                        <p class="invalid-feedback" style="font-size: 1rem">
                                            {{ __('प्रयोगकर्ताको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('इमेल') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="email" value="{{ old('email') }}" name="email"
                                        class="form-control  @error('email') is-invalid @enderror">
                                    @error('email')
                                        <p class="invalid-feedback" style="font-size: 1rem">
                                            {{ __('इमेल फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('वडा नं') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select name="ward_no" class="form-control form-control-sm">
                                        <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                        @for ($i = 1; $i < 20; $i++)
                                            <option value="{{ $i }}">{{ Nepali($i) }}</option>
                                        @endfor
                                    </select>
                                    @error('ward_no')
                                        <p class="invalid-feedback" style="font-size: 1rem">
                                            {{ __('वडा नंको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('भूमिका') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <select name="role" class="form-control form-control-sm">
                                        <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <p class="invalid-feedback" style="font-size: 1rem">
                                            {{ __('भूमिकाको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('पासवोर्ड') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="password" value="{{ old('password') }}" name="password"
                                        class="form-control  @error('password') is-invalid @enderror">
                                    @error('password')
                                        <p class="invalid-feedback" style="font-size: 1rem">
                                            {{ __('पासवोर्ड फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('पुन हाल्नहोस्') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation"
                                        class="form-control  @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <p class="invalid-feedback" style="font-size: 1rem">
                                            {{ __('पासवोर्ड मिलेन') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 my-2">
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
    {{-- end of modal for adding user status --}}
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
