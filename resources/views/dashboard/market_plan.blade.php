@extends('layouts.main')
@section('title', 'ब्यबसायिक योजना बनाउन जान्नु पर्ने आधारभूत जानकारी')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_market_plan_detail', 'active')
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
                        {{ __('ब्यबसायिक योजना थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('शीर्षक') }}</th>
                        <th class="text-center">{{ __('संक्षिप्त विवरण') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($market_plan_details as $key => $market_plan_detail)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $market_plan_detail->title }}</td>
                            <td class="text-center">{!! $market_plan_detail->description !!}</td>
                            <td class="text-center">
                                <a class="btn-sm btn-success text-white" data-toggle="modal"
                                    data-target="#modal-lg{{ $key + 1 }}" style="cursor: pointer;"><i
                                        class="fas fa-edit px-1"></i></a>

                                {{-- modal for adding market_plan_detail status --}}
                                <div class="modal fade text-sm" id="modal-lg{{ $key + 1 }}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="">
                                                    {{ __('ब्यबसायिक योजनाको प्रकार सच्याउनुहोस् ') }}</h5>
                                                <button type=" button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post"
                                                    action="{{ route('market-plan.update', $market_plan_detail) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 my-2">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        {{ __('ब्यबसायिक योजना') }} <span
                                                                            class="text-danger px-1 font-weight-bold">*</span>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="title"
                                                                    class="form-control form-control-sm"
                                                                    value="{{ $market_plan_detail->title }}">
                                                                @error('title')
                                                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                        {{ __('ब्यबसायिक योजनाको फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2">
                                                            <div class="input-group input-group-sm">
                                                                <textarea name="description" id="editor1"
                                                                    class="form-control @error('description') is-invalid @enderror">{!! $market_plan_detail->description !!}</textarea>
                                                                @error('description')
                                                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                        {{ __('ब्यबसायिक योजनाको फिल्ड खाली छ ') }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <button type="submit"
                                                                onclick="return confirm('के तपाई निश्चित हुनुहुन्छ ?');"
                                                                class="btn btn-primary">पेश
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
                                    </div>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding market_plan_detail status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('ब्यबसायिक योजना') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('market-plan.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('ब्यबसायिक योजना') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input type="text" name="title" class="form-control form-control-sm">
                                    @error('title')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('ब्यबसायिक योजनाको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="input-group input-group-sm">
                                    <textarea name="description" id="editor"
                                        class="form-control @error('description') is-invalid @enderror"></textarea>
                                    @error('description')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('ब्यबसायिक योजनाको फिल्ड खाली छ ') }}
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
    {{-- end of modal for adding market_plan_detail status --}}
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor1');
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
