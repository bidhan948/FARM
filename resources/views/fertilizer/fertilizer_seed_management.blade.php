@extends('layouts.main')
@section('title', 'मल / बिरुवा व्यबस्थापन')
@section('is_active_fertilizer_seed_management', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('मल / बिरुवा व्यबस्थापन') }}</p>
                </div>
                @can('ADD_STOCK')
                    <div class="
                        col-md-6 text-right">
                        <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                            <i class="fas fa-plus px-2"></i> {{ __('मल / बिरुवा व्यबस्थापन थप्नुहोस') }}</a>
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
                        <th class="text-center">{{ __('कृषकको नाम') }}</th>
                        <th class="text-center">{{ __('STOCK type') }}</th>
                        <th class="text-center">{{ __('मल / बिरुवा') }}</th>
                        <th class="text-center">{{ __('मात्रा') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fertilizer_seeds as $key => $fertilizerSeed)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $fertilizerSeed->landOwner->name_nepali }}</td>
                            <td class="text-center">{{ $fertilizerSeed->stock_type == 'fertilizer' ? 'मल' : 'बिरुवा' }}
                            </td>
                            <td class="text-center">
                                {{ $fertilizerSeed->Crop == null ? $fertilizerSeed->Fertilizer->name : $fertilizerSeed->Crop->name }}
                            </td>
                            <td class="text-center">{{ Nepali($fertilizerSeed->quantity) . ' ' . $fertilizerSeed->Unit->name }}</td>
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
                    <h5 class="">{{ __('मल / बिरुवा व्यबस्थापन थप्नुहोस') }}</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('fertilizer-seed-managemnet')
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
