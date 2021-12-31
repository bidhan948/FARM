@extends('layouts.main')
@section('title', 'हाम्रो बारेमा')
@section('main_content')
    <div class="card text-sm p-3 text-center">
        <div class="row">
            <div class="col-12">
                <div class="card text-sm ">
                    <div class="card-header my-2">
                        <div class="row my-1">
                            <div class="col-md-6" style="margin-bottom:-5px;">
                                <p class="font-weight-bold">{{ __('सूचना') }}</p>
                            </div>
                            <div class="
                                col-md-6 text-right">
                                <p class="text-center font-weight-bold">सूचना : {{ Nepali($notices->count()) }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            </thead>
                            <tbody>
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td class="text-center">
                                            <a href="" class="font-weight-bold text-danger">{{ $notice->notice }}</a>
                                        </td>
                                        <td class="text-center">
                                            जारी म्याद : {{ Nepali($notice->start_date) }} <br>
                                            अन्तिम म्याद : {{ Nepali($notice->end_date) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
