@extends('layouts.main')
@section('title', 'सूचना')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_notice', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('सूचनाको सुचिहरु') }}</p>
                </div>
                <div class="
                    col-md-6 text-right">
                    <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                        {{ __('सूचना थप्नुहोस') }}</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('सूचना') }}</th>
                        <th class="text-center">{{ __('जारी मिति') }}</th>
                        <th class="text-center">{{ __('अन्तिम म्याद') }}</th>
                        <th class="text-center">{{ __('अवस्था') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notices as $key => $notice)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center text-sm">{!! $notice->notice !!}
                            </td>
                            <td class="text-center">{{Nepali($notice->start_date)}}</td>
                            <td class="text-center">{{Nepali($notice->end_date)}}</td>
                            <td class="text-center">
                                @if ($notice->end_dateAd == now())
                                    "Continuous"
                                @endif
                                @if ($notice->end_dateAd > now())
                                    "Closed"
                                @endif
                                @if ($notice->end_dateAd < now())
                                    ......
                                @endif
                            </td>
                            <td class="text-center"><a class="btn-sm btn-success text-white" data-toggle="modal"
                                    data-target="#modal-lg{{ $key + 1 }}" style="cursor: pointer;"><i
                                        class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding notice status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('सूचना थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('notice.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('सूचना') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <textarea name="notice" class="form-control form-control-sm"></textarea>
                                    @error('notice')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('सूचनाको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('सूचनाको जारी मिति') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input name="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror form-control-sm"
                                        id="nepali_datepicker" readonly>
                                    @error('start_date')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('सूचनाको जारी मितिको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="start_dateAd" id="start_dateAd">
                            <div class="col-4 my-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{ __('सूचनाको जारी मिति') }} <span
                                                class="text-danger px-1 font-weight-bold">*</span>
                                        </span>
                                    </div>
                                    <input name="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror form-control-sm"
                                        id="nepali_datepicker1" readonly>
                                    @error('end_date')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ __('सूचनाको जारी मितिको फिल्ड खाली छ ') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="end_dateAd" id="end_dateAd">
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
    {{-- end of modal for adding notice status --}}
@endsection

@section('scripts')
    <script>
        window.onload = function() {
            var mainInput = document.getElementById("nepali_datepicker");
            var mainInput1 = document.getElementById("nepali_datepicker1");
            mainInput.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 10,
                onChange: function() {
                    var dateString = mainInput.value;
                    var dateAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD(NepaliFunctions
                        .ConvertToDateObject(dateString, "YYYY-MM-DD")), "YYYY-MM-DD");
                    var issueDateAd = document.getElementById("start_dateAd");
                    issueDateAd.setAttribute('value', dateAd);
                }
            });
            mainInput1.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 200,
                onChange: function() {
                    var dateString = mainInput1.value;
                    var dateAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD(NepaliFunctions
                        .ConvertToDateObject(dateString, "YYYY-MM-DD")), "YYYY-MM-DD");
                    var birth_dateAd = document.getElementById("end_dateAd");
                    birth_dateAd.setAttribute('value', dateAd);
                }
            });
        };
    </script>
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
