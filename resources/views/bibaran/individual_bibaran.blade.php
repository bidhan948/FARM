@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को विवरण')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-12 text-center">
                    <p class="">{{ $land_owner->name_nepali . 'को विवरण' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="app">
            <div class="row">
                <div class="col-lg-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg-info ">
                        <div class="inner text-center">
                            <p><i class="fas fa-map px-2"></i> {{ __('जग्गा धनीको विवरण हेर्नुहोस्') }}</p>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer">{{ __('हेर्नुहोस्') }} <i class="px-1 fas fa-eye"></i></a>
                    </div>
                </div>
                @if ($land_owner->landDetail->count() == 0)
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-plus px-2"></i> {{ __('जग्गा विवरण भर्नुहोस्') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('land_detail_add', $land_owner_detail) }}" class="small-box-footer">{{ __('भर्नुहोस्') }} <i
                                    class="px-1 fas fa-plus"></i></a>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-map px-2"></i> {{ __('जग्गा विवरण हेर्नुहोस्') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="#" class="small-box-footer">{{ __('हेर्नुहोस्') }} <i
                                    class="px-1 fas fa-eye"></i></a>
                        </div>
                    </div>

                @endif

                @if ($land_owner->agricultureDetail->count() == 0)
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-plus px-2"></i> {{ __('कृषि विवरण भर्नुहोस्') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('agriculture_detail', $land_owner) }}"
                                class="small-box-footer">{{ __('हेर्नुहोस्') }} <i class="px-1 fas fa-plus"></i></a>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-eye px-2"></i> {{ __('कृषि विवरण हेर्नुहोस') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('agriculture_detail_show', $land_owner) }}"
                                class="small-box-footer">{{ __('हेर्नुहोस्') }} <i class="px-1 fas fa-eye"></i></a>
                        </div>
                    </div>
                @endif

                @if ($land_owner->animalDetail->count() == 0)
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-plus px-2"></i> {{ __('पशु विवरण भर्नुहोस्') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('animal_detail_add', $land_owner) }}"
                                class="small-box-footer">{{ __('भर्नुहोस्') }} <i class="px-1 fas fa-plus"></i></a>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-eye px-2"></i> {{ __('पशु विवरण हेर्नुहोस') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('animal_detail_show', $land_owner) }}"
                                class="small-box-footer">{{ __('हेर्नुहोस्') }} <i class="px-1 fas fa-eye"></i></a>
                        </div>
                    </div>
                @endif

                @if ($land_owner->Enterperneurship->count() == 0)
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-plus px-2"></i> {{ __('उधम्शिलता विवरण भर्नुहोस्') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('enterperneurship_detail_add', $land_owner) }}"
                                class="small-box-footer">{{ __('भर्नुहोस्') }} <i class="px-1 fas fa-plus"></i></a>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <p><i class="fas fa-eye px-2"></i> {{ __('उधम्शिलता विवरण हेर्नुहोस') }}</p>
                            </div>
                            <div class="icon">
                            </div>
                            <a href="{{ route('animal_detail_show', $land_owner) }}"
                                class="small-box-footer">{{ __('हेर्नुहोस्') }} <i class="px-1 fas fa-eye"></i></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection