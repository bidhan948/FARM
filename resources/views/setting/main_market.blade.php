@extends('layouts.main')
@section('title', 'मुख्य बजार')
@section('menu_open', 'menu-open')
@section('s_child', 'block')
@section('setting_main_market', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('मुख्य बजारको सुचिहरु') }}</p>
                </div>
                <div class="
                        col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('मुख्य बजार थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('मुख्य बजार') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($main_markets as $key => $main_market)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center">{{ $main_market->name }}
                            </td>
                            <td class="text-center"><a class="btn-sm btn-success text-white" data-toggle="modal"
                                    data-target="#modal-lg{{$key+1}}" style="cursor: pointer;"><i class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>

                                {{-- modal for adding main_market status --}}
                                <div class="modal fade text-sm" id="modal-lg{{$key+1}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="">{{ __('मुख्य बजार सच्याउनुहोस् ') }}</h5>
                                                <button type=" button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('main-market.update',$main_market) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('मुख्य बजार') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <input type="text" value="{{ $main_market->name }}" name="name"
                                                                    class="form-control  @error('name') is-invalid @enderror">
                                                                @error('name')
                                                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                        {{ __('मुख्य बजारको फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
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
                                {{-- end of modal for adding main_market status --}}
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding main_market status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('मुख्य बजार थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('main-market.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('मुख्य बजार') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control  @error('name') is-invalid @enderror">
                                    @error('name')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('मुख्य बजारको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
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
    {{-- end of modal for adding main_market status --}}
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
