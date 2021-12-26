@extends('layouts.main')
@section('title', 'जग्गाधनीको विवरण')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('जग्गा विवरणको सुची ') }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('land-owner.create') }}"
                        class="btn btn-sm btn-primary">{{ __('जग्गा विवरण थप्नुहोस') }}
                        <i class="fas fa-plus px-1"></i></a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('ID') }}</th>
                        <th class="text-center">{{ __('नाम') }}</th>
                        <th class="text-center">{{ __('नाम (अंग्रेजी)') }}</th>
                        <th class="text-center">{{ __('सम्पर्क नं') }}</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($land_owner_details as $key => $land_owner_detail)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center alert alert-success">{{ Nepali($land_owner_detail->reg_id) }}</td>
                            <td class="text-center">{{ $land_owner_detail->name_nepali }}</td>
                            <td class="text-center">{{ $land_owner_detail->name_english }}</td>
                            <td class="text-center">{{ Nepali($land_owner_detail->contact_no) }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm text-white btn-primary"><i
                                        class="fas fa-map px-1"></i>{{ __('जग्गा धनीको विवरण हेर्नुहोस') }}</a>
                                @if ($land_owner_detail->landDetail == null)
                                    <a href="{{ route('land_detail_add', $land_owner_detail) }}"
                                        class="btn btn-primary">{{ __('जग्गा विवरण भर्नुहोस्') }}</a>
                                @else
                                    <a class="btn btn-sm text-white btn-primary"><i
                                            class="fas fa-map px-1"></i>{{ __('जग्गा विवरण हेर्नुहोस') }}</a>
                                @endif
                                @if ($land_owner_detail->agricultureDetail->count() == 0)
                                    <a href="{{ route('agriculture_detail', $land_owner_detail) }}"
                                        class="btn btn-primary"><i class="fas fa-plus-circle px-1"></i> {{ __('कृषि विवरण भर्नुहोस्') }}</a>
                                @else
                                    <a href="{{route('agriculture_detail_show',$land_owner_detail)}}" class="btn btn-sm text-white btn-primary"><i
                                            class="fas fa-eye px-1"></i>{{ __('कृषि विवरण हेर्नुहोस') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
@endsection
