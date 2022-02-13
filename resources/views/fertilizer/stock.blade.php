@extends('layouts.main')
@section('title', 'STOCK')
@section('is_active_stock', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('STOCK') }}</p>
                </div>
                <div class="
                        col-md-6 text-right">
                    @can('ADD_STOCK')
                        <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                            <i class="fas fa-plus px-2"></i> {{ __('STOCK थप्नुहोस') }}</a>
                    @endcan
                    @can('STOCK_LOG')
                        <a href="{{route('stock.log')}}" class="btn text-white btn-sm btn-success">
                            <i class="fas fa-eye px-2"></i> {{ __('STOCK log') }}</a>
                    @endcan
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $key => $stock)
                        <tr>
                            <td class="text-center">{{ Nepali($key + 1) }}</td>
                            <td class="text-center">{{ $stock->stock_type == 'fertilizer' ? 'मल' : 'बिरुवा' }}</td>
                            <td class="text-center">
                                {{ $stock->Crop == null ? $stock->Fertilizer->name : $stock->Crop->name }}</td>
                            <td class="text-center">{{ Nepali($stock->quantity) . ' ' . $stock->Unit->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- modal for adding category status --}}
    <div class="modal fade text-sm" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">{{ __('STOCK थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('stock-add', ['crop_types' => $crop_types,'units'=>$units])
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end of modal for adding category status --}}
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
