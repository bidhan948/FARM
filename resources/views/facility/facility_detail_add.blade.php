@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को सरकारी तथा गैरसरकारी विवरण विवरण हेर्नुहोस्')
<style>
    .select2-selection__choice {
        color: red !important;
    }

</style>
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="text-danger text-center">{{ __('कृपया  * चिन्न भएको ठाउँ खाली नछोड्नु होला |') }}</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="app">
                <form action="{{ route('facility_detail_store', $land_owner) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="text-center">
                                        <strong>{{ __('सरकारी तथा गैरसरकारी विवरण विवरण') }}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('क्र.सं') }}</th>
                                            <th class="text-center">{{ __('विवरण') }}</th>
                                            <th class="text-center">{{ __('छ/छैन') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gov_non_gov_facilities as $key => $gov_non_gov_facility)
                                            <tr id="{{ $gov_non_gov_facility->id }}">
                                                <td class="text-center">{{ Nepali($key + 1) }}</td>
                                                <td class="text-center">{{ $gov_non_gov_facility->name }}
                                                </td>
                                                <td class="text-center">
                                                    <select id="is_facility{{ $gov_non_gov_facility->id }}"
                                                        name="is_facility[{{ $gov_non_gov_facility->id }}][]"
                                                        class="form-control form-control-sm">
                                                        @if ($gov_non_gov_facility->id == 5)
                                                            <option value="">{{ __('---छान्नुहोस्---') }}</option>
                                                        @endif
                                                        <option value="1">{{ __('छ') }}</option>
                                                        <option value="0">{{ __('छैन') }}</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3 col-12" id="anudan_bibaran" style="display: none;">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                {{ __('अनुदान (विवरण उल्लेख गर्नुहोस्)') }}<span
                                                    class="text-danger px-1 font-weight-bold">*</span>
                                            </span>
                                        </div>
                                        <textarea name="anudan_bibaran"
                                            class="form-control  @error('anudan_bibaran') is-invalid @enderror"></textarea>
                                        @error('anudan_bibaran')
                                            <p class="invalid-feedback" style="font-size: 0.9rem">
                                                {{ __('अनुदान (विवरण उल्लेख गर्नुहोस्)को फिल्ड खाली छ ') }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                {{ __('सहयोगी संस्थाको नाम') }}
                                                <span class="text-danger px-1 font-weight-bold">*</span>
                                            </span>
                                        </div>
                                        <select id="helping_organization_id[]" name="helping_organization_id"
                                            class="custom-select select2 @error('helping_organization_id') is-invalid @enderror"
                                            multiple="multiple" data-placeholder="----छान्नुहोस् ----">
                                            @foreach ($helping_organizations as $helping_organization)
                                                <option value="{{ $helping_organization->id }}">
                                                    {{ $helping_organization->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('helping_organization_id')
                                            <p class="invalid-feedback" style="font-size: 0.9rem">
                                                {{ __('सहयोगी संस्थाको नाम फिल्ड खाली छ |') }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2" style="width: 100%">
                        <div class="col-12">
                            <button class="btn btn-sm btn-primary mt-3"
                                onclick="return confirm('कृपया संचालन सुनिस्चित गर्नुहोस्');"
                                type="submit">{{ __('सम्पादन गर्नुहोस्') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    @endsection
    @section('scripts')
        <script>
            $("#is_facility5").on("change", function() {
                if ($("#is_facility5").val() == 1) {
                    $("#anudan_bibaran").css("display", "block");
                } else {
                    $("#anudan_bibaran").css("display", "none");
                }
            });
            $(function() {
                $('.select2').select2()
            });
        </script>
    @endsection
