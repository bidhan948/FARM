@extends('layouts.main')
@section('title', 'STOCK LOG')
@section('is_active_stock', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('STOCK log') }}</p>
                </div>
                <div class="
                col-md-6 text-right">
                <span class="text-danger mx-2"><strong><i class="fas fa-arrow-up"></i> : OUT</strong></span>
                <span class="text-success"><strong><i class="fas fa-arrow-down"></i> : in</strong></span>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.स.') }}</th>
                        <th class="text-center">{{ __('STOCK type') }}</th>
                        <th class="text-center">{{ __('मल / बिरुवा') }}</th>
                        <th class="text-center">{{ __('मात्रा') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockLogs as $key => $stockLog)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $stockLog->stock_type == 'fertilizer' ? 'मल' : 'बिरुवा' }}</td>
                            <td class="text-center">
                                {{ $stockLog->Crop == null ? $stockLog->Fertilizer->name : $stockLog->Crop->name }}</td>
                            <td class="text-center">{{ Nepali($stockLog->quantity) . ' ' . $stockLog->Unit->name }}
                            </td>
                            <td class="text-center">
                                @if ($stockLog->is_out)
                                    <span class="text-danger"><strong><i class="fas fa-arrow-up"></i></strong></span>
                                @else
                                    <span class="text-success"><strong><i class="fas fa-arrow-down"></i></strong></span>
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
