@extends('layouts.main')
@section('title', 'कृषकको विवरण')
@section('main_content')
<div class="card text-sm ">
    <div class="card-header my-2">
        <div class="row my-1">
            <div class="col-md-6" style="margin-bottom:-5px;">
                <p class="">{{ __('कृषकको विवरण') }}</p>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">{{ __('क्र.स.') }}</th>
                    <th class="text-center">{{ __('ID') }}</th>
                    <th class="text-center">{{ __('नाम') }}</th>
                    <th class="text-center">{{ __('नाम (अंग्रेजी)') }}</th>
                    <th class="text-center">{{ __('नागरिकता नं') }}</th>
                    <th class="text-center">{{ __('सम्पर्क नं') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($land_owners as $key => $land_owner)
                    <tr>
                        <td class="text-center">{{$key+1}}</td>
                        <td class="text-center">{{Nepali($land_owner->reg_id)}}</td>
                        <td class="text-center">{{$land_owner->name_nepali}}</td>
                        <td class="text-center">{{$land_owner->name_english}}</td>
                        <td class="text-center">{{Nepali($land_owner->cit_no)}}</td>
                        <td class="text-center">{{Nepali($land_owner->contact_no)}}</td>
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