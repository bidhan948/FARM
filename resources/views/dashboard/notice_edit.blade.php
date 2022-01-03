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
                    <p class="">{{ __('सूचना सच्याउनुहोस्') }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('notice.update', $notice) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4 my-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('सूचना') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <textarea name="notice" class="form-control form-control-sm">{{ $notice->notice }}</textarea>
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
                                    {{ __('सूचनाको जारी मिति') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input name="start_date"
                                class="form-control @error('start_date') is-invalid @enderror form-control-sm"
                                id="nepali_datepicker" placeholder="{{ $notice->start_date }}" readonly>
                            @error('start_date')
                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                    {{ __('सूचनाको जारी मितिको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="start_dateAd" value="{{ $notice->end_dateAd }}" id="start_dateAd">
                    <div class="col-4 my-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('सूचनाको जारी मिति') }} <span class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input name="end_date"
                                class="form-control @error('end_date') is-invalid @enderror form-control-sm"
                                id="nepali_datepicker1" placeholder="{{ $notice->end_date }}" readonly>
                            @error('end_date')
                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                    {{ __('सूचनाको जारी मितिको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 my-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('सूचनाको फाइल') }} <span
                                        class="text-danger px-1 font-weight-bold">*</span>
                                </span>
                            </div>
                            <input type="file" name="notice_document[]"
                                class="form-control @error('notice_document') is-invalid @enderror form-control-sm"
                                multiple>
                            @error('notice_document')
                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                    {{ __('सूचनाको फाइलको फिल्ड खाली छ ') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="end_dateAd" value="{{ $notice->end_dateAd }}" id="end_dateAd">
                    @foreach ($notice->noticeDocument as $document)
                        <input type="hidden" name="document[]" value="{{ $document->document }}">
                    @endforeach
                    <div class="col-12">
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
        window.onload = function() {
            var mainInput = document.getElementById("nepali_datepicker");
            var mainInput1 = document.getElementById("nepali_datepicker1");
            mainInput.nepaliDatePicker({
                ndpYear: 200,
                ndpMonth: true,
                ndpYearCount: 10,
                disableDaysBefore: 0,
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
                disableDaysBefore: 0,
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
