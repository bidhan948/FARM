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
                        <th class="text-center">{{ __('MEETING ID') }}</th>
                        <th class="text-center">{{ __('मिति') }}</th>
                        <th class="text-center">{{ __('बिषय') }}</th>
                        <th class="text-center">{{ __('समिति') }}</th>
                        <th class="text-center">{{ __('अवस्था') }}</th>
                        <th class="text-center">{{ __('कार्य') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
