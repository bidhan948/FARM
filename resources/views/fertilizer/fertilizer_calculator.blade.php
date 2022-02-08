@extends('layouts.main')
@section('title', 'रासायनिक मल मापन')
@section('is_active', 'active')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <h5 class="text-center font-weight-bold">{{ __('Fertilizer Calculator (रासायनिक मल मापन)') }}</h5>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('fertilizer-calculator')
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts')

@endsection
