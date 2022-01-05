@extends('layouts.main')
@section('title',$agriculture_animal_detail->title ." " . $page->title)
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class=" col-12">
                    <h5 class="font-weight-bold">{{$agriculture_animal_detail->title ." " . $page->title }}</h5>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($pages as $children)
                <h5 class="text-center font-weight-bold my-2">{{$children->title}}</h5>
                <div class="card mt-2 p-3">
                    {!! $children->long_desc !!}
                </div>
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
@endsection
