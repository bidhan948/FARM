@extends('layouts.main')
@section('title', $role->name . 'को अनुमति व्यवस्थापन')
@section('main_content')

    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1 text-center">
                <div class="col-md-12" style="margin-bottom:-5px;">
                    <p class="">{{ $role->name . 'को अनुमति व्यवस्थापन' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2 mb-2">
                    <a id="check" class="btn btn-sm btn-primary text-white float-right" onclick="checkAll()"
                        style="display: block;">{{ __('Check all') }} <i class="fas fa-check px-1"></i></a>
                    <a id="uncheck" class="btn btn-sm btn-danger text-white" onclick="uncheckAll()"
                        style="display: none;">{{ __('Uncheck all') }} <i class="fas fa-times px-1"></i></a>
                </div>
            </div>
            <form action="{{ route('role.update', $role) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    @foreach ($permissions as $key => $permission)
                        <div class="col-md-4 p-2 border" style="display: flex; align-items: center;">
                            <label class="px-2 font-weight-bold px-2 mt-2"
                                for="{{ $permission->name }}">{{ $permission->getName() }}</label>
                            <input type="checkbox" name="permission[]" class="px-2 check"
                                value="{{ $permission->name }}" id="{{ $permission->id }}" @if (in_array($permission->id, $permissionArr))
                            checked
                    @endif
                    >
                </div>
                @endforeach
                <div class="col-12 my-2">
                    <button class="btn btn-sm btn-primary" type="submit"
                        onclick="return confirm('के तपाई निश्चित हुनुहुन्छ ?')">{{ __('सम्पादन गर्नुहोस्') }}</button>
                </div>
        </div>
        </form>
    </div>
    <!-- /.card-body -->
    </div>
@endsection

@section('scripts')
    <script>
        function checkAll() {
            $('.check').attr("checked", "checked");
            $('#uncheck').css("display", "block");
            $("#check").css("display", "none");
        }

        function uncheckAll() {
            $('.check').attr("checked", false);
            $('#uncheck').css("display", "none");
            $("#check").css("display", "block");
        }
    </script>
@endsection
